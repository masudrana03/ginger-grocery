<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Store;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\StoreUpdateRequest;

class StoreController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('backend.stores.index');
    }

    /**
     * @param Request $request
     */
    public function allStores( Request $request ) {

        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'type',
            3 => 'image',
            4 => 'zone',
            5 => 'created_at',
            6 => 'id',
        ];

        $store = Store::query();
        if ( !isAdmin() ) {
            $store = $store->where( 'id', auth()->user()->store_id );
        }

        $totalData = $store->count();

        $totalFiltered = $totalData;

        $limit = $request->input( 'length' );
        $start = $request->input( 'start' );
        $order = $columns[$request->input( 'order.0.column' )];
        $dir   = $request->input( 'order.0.dir' );

        if ( empty( $request->input( 'search.value' ) ) ) {
            $stores = $store->offset( $start )
                            ->limit( $limit )
                            ->orderBy( $order, $dir )
                            ->get();
        } else {
            $search = $request->input( 'search.value' );

            $stores = $store->where( 'id', 'LIKE', "%{$search}%" )
                            ->orWhere( 'name', 'LIKE', "%{$search}%" )
                            ->offset( $start )
                            ->limit( $limit )
                            ->orderBy( $order, $dir )
                            ->get();

            $totalFiltered = $store->where( 'id', 'LIKE', "%{$search}%" )
                                   ->orWhere( 'name', 'LIKE', "%{$search}%" )
                                   ->count();
        }

        $data = [];

        if ( !empty( $stores ) ) {
            foreach ( $stores as $store ) {
                $edit   = route('admin.stores.edit', $store->id );
                $show   = route('admin.stores.show', $store->id);
                $delete = route('admin.stores.destroy', $store->id );
                $token  = csrf_token();
                $img    = asset( 'assets/img/uploads/stores/thumbnail/' . $store->image );

                $nestedData['id']         = $store->id;
                $nestedData['name']       = $store->name;
                $nestedData['type']       = $store->type;
                $nestedData['image']      = "<img src='{$img}' width='60'>";
                $nestedData['zone']       = $store->zone ? $store->zone->name : '';
                $nestedData['created_at'] = $store->created_at->format( 'd-m-Y' );
                $nestedData['actions']    = "
                    &emsp;<a href='{$show}' title='DETAILS' ><span class='far fa-eye'></span></a>
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteStore({$store->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$store->id}' action='{$delete}' method='POST' style='display: none;'>
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
    public function create() {
        if ( !isAdmin() ) {
            return abort( 403 );
        }

        $zones = Zone::all();
        $countries = Country::all();

        return view('backend.stores.create', compact('zones', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreRequest $request )
    {
        // return $request;
        if ( !isAdmin() ) {
            return abort( 403 );
        }

        if ( $request->hasFile( 'image' ) ) {
            $image             = $request->file( 'image' );
            $filename          = generateUniqueFileName( $image->getClientOriginalExtension() );
            $location          = public_path( 'assets/img/uploads/stores/' . $filename );
            $thumbnailLocation = public_path( 'assets/img/uploads/stores/thumbnail/' . $filename );

            saveImageWithThumbnail( $image, $location, $thumbnailLocation );
        }

        $request          = $request->all();
        $request['image'] = $filename;

        Store::create( $request );

        toast( 'Store successfully created', 'success' );

        return redirect()->route('admin.stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store           $store
     * @return \Illuminate\Http\Response
     */
    public function show( Store $store )
    {

        if ( !isShopManager( $store->id ) && !isAdmin() ) {
            return abort( 403 );
        }

        return view('backend.stores.view', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store           $store
     * @return \Illuminate\Http\Response
     */
    public function edit( Store $store ) {
        if ( !isShopManager( $store->id ) && !isAdmin() ) {
            return abort( 403 );
        }

        $zones = Zone::all();

        return view('backend.stores.edit', compact( 'store','zones' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request              $request
     * @param  \App\Http\Requests\StoreUpdateRequest $store
     * @return \Illuminate\Http\Response
     */
    public function update( StoreUpdateRequest $request, Store $store ) {

        if ( !isShopManager( $store->id ) && !isAdmin() ) {
            return abort( 403 );
        }

        $filename = '';

        if ( $request->hasFile( 'image' ) ) {
            $image             = $request->file( 'image' );
            $filename          = generateUniqueFileName( $image->getClientOriginalExtension() );
            $location          = public_path( 'assets/img/uploads/stores/' . $filename );
            $thumbnailLocation = public_path( 'assets/img/uploads/stores/thumbnail/' . $filename );

            saveImageWithThumbnail( $image, $location, $thumbnailLocation );
        }

        $request = $request->all();

        if ( $filename != '' ) {
            $request['image'] = $filename;
        }

        $store->update( $request );

        toast( 'Store successfully updated', 'success' );

        return redirect()->route('admin.stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store           $store
     * @return \Illuminate\Http\Response
     */
    public function destroy( Store $store ) {

        if ( !isAdmin() ) {
            return abort( 403 );
        }

        $imageDirectory = 'assets/img/uploads/stores/';

        deleteImage( $store->image, $imageDirectory );

        $store->delete();

        toast( 'Store successfully deleted', 'success' );

        return redirect()->back();
    }



    public function getCoordinates($id){
        $zone= Zone::selectRaw("*,ST_AsText(ST_Centroid(`coordinates`)) as center")->findOrFail($id);
        $data = format_coordiantes($zone->coordinates[0]);
        $center = (object)['lat'=>(float)trim(explode(' ',$zone->center)[1], 'POINT()'), 'lng'=>(float)trim(explode(' ',$zone->center)[0], 'POINT()')];
        return response()->json(['coordinates'=>$data, 'center'=>$center]);
    }

}
