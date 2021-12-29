<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutsliderImage;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::first();
        // return $abouts;
        return view('backend.abouts.index', compact('abouts'));
    }

    public function sliderUpdate()
    {
        $aboutsImage = AboutsliderImage::all();
        // return $abouts;
        return view('backend.abouts.image-slider', compact('aboutsImage'));
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
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request)
    {
        // dd($request->all());
        // return $request ;

        $about = About::first();

        $filename = '';

        if ( $request->hasFile( 'main_section_image' ) ) {
            $imageDirectory = 'assets/img/uploads/abouts/';

            deleteImage( $about->image, $imageDirectory );
            $image             = $request->file( 'main_section_image' );
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path( 'assets/img/uploads/abouts/' . $filename );
            $thumbnailLocation = public_path( 'assets/img/uploads/abouts/thumbnail/' . $filename );

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }


        $request = $request->all();

        if ($filename != '') {
            $request['main_section_image'] = $filename;
        }

        $about->update($request);

        toast( 'About info successfully updated', 'success' );

        return redirect()->route('admin.abouts.index' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
