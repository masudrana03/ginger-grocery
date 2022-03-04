<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.brands.index');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function allBrands(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            3 => 'created_at',
            4 => 'id',
        ];

        $brandId = Product::where('store_id', auth()->user()->store_id)->pluck('brand_id');

        $brand = Brand::query();
        if ( !isAdmin() ) {
           $p = $brand->where('id', $brandId);
        //    logger($p->get());
        }

        $totalData = $brand->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $brands = $brand->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        } else {
            $search = $request->input('search.value');

            $brands =  $brand->where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = $brand->where('id','LIKE',"%{$search}%")
                                ->orWhere('name', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = [];

        if (!empty($brands)) {
            foreach ($brands as $brand) {
                $edit   =  route('admin.brands.edit', $brand->id);
                $delete =  route('admin.brands.destroy', $brand->id);
                $token  = csrf_token();

                $nestedData['id']         = $brand->id;
                $nestedData['name']       = $brand->name;
                $nestedData['created_at'] = $brand->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteBrand({$brand->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$brand->id}' action='{$delete}' method='POST' style='display: none;'>
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
        return view('backend.brands.create');
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
            'name' => 'required|unique:brands,name'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        Alert::toast('Brand successfully created', 'success');

        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name' => 'required|unique:units,name,'. $brand->id,
        ]);

        $brand->name = $request->name;
        $brand->save();

        Alert::toast('Brand successfully updated', 'success');

        return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if ($brand->products->count()) {
            toast('Brand could not deleted as it already used', 'error');

            return back();
        }

        $brand->delete();

        toast('Brand successfully deleted', 'success');

        return back();
    }
}
