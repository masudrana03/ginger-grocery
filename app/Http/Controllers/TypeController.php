<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('types.index');
    }

    public function allTypes(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            3 => 'created_at',
            4 => 'id',
        ];

        $totalData = Type::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $types = Type::offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();
        } else {
            $search = $request->input('search.value');

            $types =  Type::where('id', 'LIKE', "%{$search}%")
                            ->orWhere('name', 'LIKE', "%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();

            $totalFiltered = Type::where('id', 'LIKE', "%{$search}%")
                                ->orWhere('name', 'LIKE', "%{$search}%")
                                ->count();
        }

        $data = [];

        if (!empty($types)) {
            foreach ($types as $type) {
                $edit   =  route('types.edit', $type->id);
                $delete =  route('types.destroy', $type->id);
                $token  = csrf_token();

                $nestedData['id']         = $type->id;
                $nestedData['name']       = $type->name;
                $nestedData['created_at'] = date('j M Y h:i a', strtotime($type->created_at));
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteType({$type->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$type->id}' action='{$delete}' method='POST' style='display: none;'>
                    <input type='hidden' name='_token' value='{$token}'>
                    <input type='hidden' name='_method' value='DELETE'>
                    </form>
                    ";
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ];

        echo json_encode($json_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
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
            'name' => 'required|unique:types,name'
        ]);

        $type = new Type();
        $type->name = $request->name;
        $type->save();

        Alert::toast('Type successfully created', 'success');

        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validate($request, [
            'name' => 'required|unique:units,name,'. $type->id,
        ]);

        $type->name = $request->name;
        $type->save();

        Alert::toast('Type successfully updated', 'success');

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if ($type->products) {
            toast('Type could not deleted as it already used', 'error');

            return back();
        }

        $type->delete();

        toast('Type successfully deleted', 'success');

        return back();
    }
}
