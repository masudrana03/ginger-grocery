<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoRequest;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.promos.index');
    }

        /**
     * @param Request $request
     * @return void
     */
    public function allPromos(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'title',
            1 => 'type',
            1 => 'code',
            1 => 'used',
            1 => 'limit',
            1 => 'status',
            3 => 'created_at',
            4 => 'id',
        ];

        $totalData = Promo::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $promos = Promo::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        } else {
            $search = $request->input('search.value');

            $promos =  Promo::where('id','LIKE',"%{$search}%")
                            ->orWhere('title', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Promo::where('id','LIKE',"%{$search}%")
                                ->orWhere('title', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = [];

        if (!empty($promos)) {
            foreach ($promos as $promo) {
                $updateStatus = route('admin.promos.update_status', $promo->id );
                $edit   =  route('admin.promos.edit',$promo->id);
                $delete =  route('admin.promos.destroy', $promo->id);
                $token  = csrf_token();
                $class        = $promo->status == 'Active' ? 'status_btn_b' : 'status_btn_danger_b';

                $nestedData['id']         = $promo->id;
                $nestedData['title']      = $promo->title;
                $nestedData['type']       = $promo->type;
                $nestedData['code']       = $promo->code;
                $nestedData['used']       = $promo->used;
                $nestedData['limit']      = $promo->limit;
                $nestedData['status']     = "<a href='javascript:void(0)' data-href='{$updateStatus}' data-toggle='tooltip' title='Change status' class='{$class}' onclick='ChangePromoStatus({$promo->id})' id='promoStatus-{$promo->id}'>$promo->status</a>";
                $nestedData['created_at'] = $promo->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deletePromo({$promo->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$promo->id}' action='{$delete}' method='POST' style='display: none;'>
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
        return view('backend.promos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\http\Requests\PromoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromoRequest $request)
    {
        Promo::create($request->all());

        toast('Promo successfully created', 'success');

        return redirect()->route('admin.promos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('backend.promos.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\http\Requests\PromoRequest  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $promo->update($request->all());

        toast('Promo successfully updated', 'success');

        return redirect()->route('admin.promos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();

        toast('Promo successfully deleted', 'success');

        return back();
    }

    /**
     * Update promo status
     *
     * @param Promo $promo
     * @return void
     */
    public function updateStatus(Promo $promo)
    {
        $promo->update([
            'status' => $promo->status == 'Active' ? 'Inactive' : 'Active'
        ]);

        toast( 'Status successfully updated', 'success' );

        return redirect()->back();
    }
}
