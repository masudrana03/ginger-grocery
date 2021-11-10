<?php

namespace App\Http\Controllers;

use App\Models\Nutrition;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nutrition.index');
    }

    public function allNutrition(Request $request)
    {
        $columns = array(
                            0 =>'id',
                            1 =>'name',
                            3=> 'created_at',
                            4=> 'id',
                        );

        $totalData = Nutrition::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $nutritions = Nutrition::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        }
        else {
            $search = $request->input('search.value');

            $nutritions =  Nutrition::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Nutrition::where('id','LIKE',"%{$search}%")
                                ->orWhere('name', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = array();
        if(!empty($nutritions))
        {
            foreach ($nutritions as $nutrition)
            {
                $edit =  route('nutrition.edit',$nutrition->id);
                $delete =  route('nutrition.destroy', $nutrition->id);
                $token = csrf_token();

                $nestedData['id'] = $nutrition->id;
                $nestedData['name'] = $nutrition->name;
                // $nestedData['body'] = substr(strip_tags($nutrition->body),0,50)."...";
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($nutrition->created_at));
                $nestedData['actions'] = "
                &emsp;
                <a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                &emsp;
                <a href='#' onclick='deleteNutrition({$nutrition->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                <form id='delete-form-{$nutrition->id}' action='{$delete}' method='POST' style='display: none;'>
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
        return view('nutrition.create');
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
            'name' => 'required|unique:nutrition,name'
        ]);

        $nutrition = new Nutrition();
        $nutrition->name = $request->name;
        $nutrition->save();

        Alert::toast('Nutrition successfully created', 'success');

        return redirect()->route('nutrition.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function show(Nutrition $nutrition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function edit(Nutrition $nutrition)
    {
        return view('nutrition.edit', compact('nutrition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nutrition $nutrition)
    {
        $this->validate($request, [
            'name' => 'required|unique:units,name,'. $nutrition->id,
        ]);

        $nutrition->name = $request->name;
        $nutrition->save();

        Alert::toast('Nutrition successfully updated', 'success');

        return redirect()->route('nutrition.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nutrition $nutrition)
    {
        if ($nutrition->products) {
            toast('Nutrition could not deleted as it already used', 'error');

            return back();
        }

        $nutrition->delete();

        toast('Nutrition successfully deleted', 'success');

        return back();
    }
}
