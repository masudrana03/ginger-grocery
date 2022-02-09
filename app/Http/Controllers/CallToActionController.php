<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\CallToAction;
use App\Http\Requests\StoreCallToActionRequest;
use App\Http\Requests\UpdateCallToActionRequest;

class CallToActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $callToActions = CallToAction::all();
        $stores  = Store::all();

        return view('backend.call_to_actions.index', compact('callToActions','stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCallToActionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCallToActionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CallToAction  $callToAction
     * @return \Illuminate\Http\Response
     */
    public function show(CallToAction $callToAction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CallToAction  $callToAction
     * @return \Illuminate\Http\Response
     */
    public function edit(CallToAction $callToAction)
    {
        // $callToActions = CallToAction::all();
        $stores  = Store::all();
        return view('backend.call_to_actions.edit', compact('stores','callToAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCallToActionRequest  $request
     * @param  \App\Models\CallToAction  $callToAction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCallToActionRequest $request, CallToAction $callToAction)
    {
        
        

        $filename = '';

        if ( $request->hasFile( 'image' ) ) {
            $imageDirectory = 'assets/img/uploads/actions/';

            deleteImage( $callToAction->image, $imageDirectory );
            $image             = $request->file( 'image' );
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path( 'assets/img/uploads/actions/' . $filename );
            $thumbnailLocation = public_path( 'assets/img/uploads/actions/thumbnail/' . $filename );

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }


        $request = $request->all();

        if ($filename != '') {
            $request['image'] = $filename;
        }

        $callToAction->update($request);

        toast( 'Call to Action successfully updated', 'success' );

        return redirect()->route('admin.call_to_actions.index' );
    }

    /**
     * Update banner status
     *
     * @param CallToAction $callToAction
     * @return void
     */
    public function updateStatus(CallToAction $callToAction)
    {
        $callToAction->update([
            'status' => $callToAction->status == 'Active' ? 'Inactive' : 'Active'
        ]);

        toast( 'Status successfully updated', 'success' );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CallToAction  $callToAction
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallToAction $callToAction)
    {
        //
    }
}
