<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaxRequest;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taxes.index');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function alltaxes(Request $request)
    {

        $columns =[
            0 => 'id',
            1 => 'title',
            2 => 'percentage',
            3 => 'status',
            4 => 'created_at',
            5 => 'id',
        ];

        $totalData = Tax::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $taxes = Tax::offset($start)
                       ->limit($limit)
                       ->orderBy($order,$dir)
                       ->get();
        } else {
            $search = $request->input('search.value');

            $taxes =  Tax::where('id','LIKE',"%{$search}%")
                        ->orWhere('title', 'LIKE',"%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();

            $totalFiltered = Tax::where('id','LIKE',"%{$search}%")
                                ->orWhere('title', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = [];

        if (!empty($taxes)) {
            foreach ($taxes as $tax) {
                $updateStatus = route('taxes.update_status', $tax->id );
                $edit         = route('taxes.edit', $tax->id);
                $delete       = route('taxes.destroy', $tax->id);
                $token        = csrf_token();
                $class        = $tax->status == 'Active' ? 'status_btn' : 'status_btn_danger';

                $nestedData['id']         = $tax->id;
                $nestedData['title']      = $tax->title;
                $nestedData['percentage'] = $tax->percentage.'%';
                $nestedData['status']     = "<a href='javascript:void(0)' data-href='{$updateStatus}' data-toggle='tooltip' title='Change status' class='{$class}' onclick='ChangeBannerStatus({$tax->id})' id='bannerStatus-{$tax->id}'>$tax->status</a>";
                $nestedData['created_at'] = $tax->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteBrand({$tax->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$tax->id}' action='{$delete}' method='POST' style='display: none;'>
                    <input type='hidden' name='_token' value='{$token}'>
                    <input type='hidden' name='_method' value='DELETE'>
                    </form>
                    ";
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval( $request->input( 'draw' ) ),
            "recordsTotal"    => intval( $totalData ),
            "recordsFiltered" => intval( $totalFiltered ),
            "data"            => $data,
        ];

        echo json_encode( $json_data );

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TaxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxRequest $request)
    {
        $request = $request->all();
        Tax::create($request);

        toast( 'Tax successfully created', 'success' );

        return redirect()->route( 'taxes.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        return view('taxes.edit', compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TaxRequest  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(TaxRequest $request, Tax $tax)
    {
        $request = $request->all();
        $tax->update($request);

        toast( 'Tax successfully updated', 'success' );

        return redirect()->route( 'taxes.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        $tax->delete();

        toast( 'Tax successfully deleted', 'success' );

        return redirect()->back();
    }

    /**
     * Update Tax status
     *
     * @param Tax $tax
     * @return void
     */
    public function updateStatus(Tax $tax)
    {
        $tax->update([
            'status' => $tax->status == 'Active' ? 'Inactive' : 'Active'
        ]);

        if ($tax->status == 'Active') {
            $taxes = Tax::all();

            // $filteredTaxes = $taxes->filter(function ($value, $key) use ($tax) {
            //     return $value['id']!= $tax->id;
            // });

            foreach ($taxes as $item) {

                if ($item->id == $tax->id) {
                    continue;

                    $item->update([
                        'status' => 'Inactive'
                    ]);
                }
            }

        }

        toast( 'Status successfully updated', 'success' );

        return redirect()->back();
    }
}
