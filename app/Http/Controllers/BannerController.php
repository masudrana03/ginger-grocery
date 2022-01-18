<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerStoreRequest;
use App\Http\Requests\BannerUpdateRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.banners.index');
    }

    /**
     * @param Request $request
     */
    public function allBanners( Request $request )
    {
        $columns = [
            0 => 'id',
            1 => 'title',
            2 => 'body',
            3 => 'image',
            4 => 'status',
            5 => 'created_at',
            6 => 'id',
        ];

        $totalData = Banner::count();

        $totalFiltered = $totalData;

        $limit = $request->input( 'length' );
        $start = $request->input( 'start' );
        $order = $columns[$request->input( 'order.0.column' )];
        $dir   = $request->input( 'order.0.dir' );

        if ( empty( $request->input( 'search.value' )) ) {
            $banners = Banner::offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();
        } else {
            $search = $request->input( 'search.value' );

            $banners = Banner::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'title', 'LIKE', "%{$search}%" )
                ->offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();

            $totalFiltered = Banner::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'title', 'LIKE', "%{$search}%" )
                ->count();
        }

        $data = [];

        if ( !empty( $banners ) ) {
            foreach ( $banners as $banner ) {
                $updateStatus = route('admin.banners.update_status', $banner->id );
                $edit         = route('admin.banners.edit', $banner->id );
                $delete       = route('admin.banners.destroy', $banner->id );
                $token        = csrf_token();
                $img          = asset( 'assets/img/uploads/banners/thumbnail/' . $banner->image );
                $class        = $banner->status == 'Active' ? 'status_btn_b' : 'status_btn_danger_b';

                $nestedData['id']         = $banner->id;
                $nestedData['title']      = $banner->title;
                $nestedData['body']       = $banner->body;
                $nestedData['image']      = "<img src='{$img}' width='60'>";
                $nestedData['status']     = "<a href='javascript:void(0)' data-href='{$updateStatus}' data-toggle='tooltip' title='Change status' class='{$class}' onclick='ChangeBannerStatus({$banner->id})' id='bannerStatus-{$banner->id}'>$banner->status</a>";
                $nestedData['created_at'] = $banner->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteBanner({$banner->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$banner->id}' action='{$delete}' method='POST' style='display: none;'>
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
        return view('backend.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BannerStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerStoreRequest $request)
    {
        if ( $request->hasFile( 'image' ) ) {
            $image             = $request->file( 'image' );
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path( 'assets/img/uploads/banners/' . $filename );
            $thumbnailLocation = public_path( 'assets/img/uploads/banners/thumbnail/' . $filename );

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        $request = $request->all();
        $request['image'] = $filename;
        Banner::create($request);

        toast( 'Banner successfully created', 'success' );

        return redirect()->route('admin.banners.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BannerUpdateRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        $filename = '';

        if ( $request->hasFile( 'image' ) ) {
            $imageDirectory = 'assets/img/uploads/banners/';

            deleteImage( $banner->image, $imageDirectory );

            $image             = $request->file( 'image' );
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path( 'assets/img/uploads/banners/' . $filename );
            $thumbnailLocation = public_path( 'assets/img/uploads/banners/thumbnail/' . $filename );

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        $request = $request->all();

        if ($filename != '') {
            $request['image'] = $filename;
        }

        $banner->update($request);

        toast( 'Banner successfully updated', 'success' );

        return redirect()->route('admin.banners.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $imageDirectory = 'assets/img/uploads/banners/';

        deleteImage( $banner->image, $imageDirectory );

        $banner->delete();

        toast( 'Banner successfully deleted', 'success' );

        return redirect()->back();
    }

    /**
     * Update banner status
     *
     * @param Banner $banner
     * @return void
     */
    public function updateStatus(Banner $banner)
    {
        $banner->update([
            'status' => $banner->status == 'Active' ? 'Inactive' : 'Active'
        ]);

        toast( 'Status successfully updated', 'success' );

        return redirect()->back();
    }
}
