<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('units.index');
    }

    public function allUnits(Request $request)
    {
        $columns = array( 
                            0 =>'id', 
                            1 =>'name',
                            3=> 'created_at',
                            4=> 'id',
                        );
    
        $totalData = Unit::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $units = Unit::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $units =  Unit::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Unit::where('id','LIKE',"%{$search}%")
                                ->orWhere('name', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = array();
        if(!empty($units))
        {
            foreach ($units as $unit)
            {
                $edit =  route('units.edit',$unit->id);
                $delete =  route('units.destroy', $unit->id);
                $token = csrf_token();

                $nestedData['id'] = $unit->id;
                $nestedData['name'] = $unit->name;
                // $nestedData['body'] = substr(strip_tags($unit->body),0,50)."...";
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($unit->created_at));
                $nestedData['actions'] = "
                &emsp;
                <a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                &emsp;
                <a href='#' onclick='deleteUnit({$unit->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                <form id='delete-form-{$unit->id}' action='{$delete}' method='POST' style='display: none;'>
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
        return view('units.create');
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
            'name' => 'required'
        ]);

        $unit = new Unit();
        $unit->name = $request->name;
        $unit->save();

        Alert::toast('Unit successfully created', 'success');
        
        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $unit->name = $request->name;
        $unit->save();

        Alert::toast('Unit successfully updated', 'success');
        
        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        Alert::toast('Unit successfully deleted', 'success');

        return redirect()->back();
    }
}
