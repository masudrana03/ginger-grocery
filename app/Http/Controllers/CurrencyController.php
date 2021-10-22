<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('currencies.index');
    }

    public function allCurrencies(Request $request)
    {
        $columns = array( 
                            0 =>'id', 
                            1 =>'name',
                            1 =>'symbol',
                            3=> 'created_at',
                            4=> 'id',
                        );
    
        $totalData = Currency::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $currencies = Currency::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $currencies =  Currency::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Currency::where('id','LIKE',"%{$search}%")
                                ->orWhere('name', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = array();
        if(!empty($currencies))
        {
            foreach ($currencies as $currency)
            {
                $edit =  route('currencies.edit',$currency->id);
                $delete =  route('currencies.destroy', $currency->id);
                $token = csrf_token();

                $nestedData['id'] = $currency->id;
                $nestedData['name'] = $currency->name;
                $nestedData['symbol'] = $currency->symbol;
                // $nestedData['body'] = substr(strip_tags($currency->body),0,50)."...";
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($currency->created_at));
                $nestedData['actions'] = "
                &emsp;
                <a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                &emsp;
                <a href='#' onclick='deleteCurrency({$currency->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                <form id='delete-form-{$currency->id}' action='{$delete}' method='POST' style='display: none;'>
                <input type='hidden' name='_token' value='{$token}'>
                <input type='hidden' name='_method' value='DELETE'>
                </form>
                ";
                $data[] = $nestedData;

            }
        }
            
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:currencies,name',
            'symbol' => 'required|unique:currencies,symbol'
        ]);

        $currency = new Currency();
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->save();

        Alert::toast('Currency successfully created', 'success');
        
        return redirect()->route('currencies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $this->validate($request, [
            'name' => 'required|unique:currencies,name,'. $currency->id,
            'symbol' => 'required|unique:currencies,symbol,'. $currency->id
        ]);

        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->save();

        Alert::toast('Currency successfully updated', 'success');
        
        return redirect()->route('currencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        Alert::toast('Currency successfully deleted', 'success');

        return redirect()->back();
    }
}
