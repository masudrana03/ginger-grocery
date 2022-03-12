<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutService;
use Illuminate\Http\Request;
use App\Models\AboutsliderImage;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Http\Requests;

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

    public function aboutPerformance()
    {
        $abouts = About::first();
        return view('backend.abouts.our-performance', compact('abouts'));
    }

    public function serviceIndex()
    {
        $aboutService = AboutService::first();

        return view('backend.abouts.service-index', compact('aboutService'));
    }

    public function serviceEdit()
    {
        $aboutService = AboutService::first();

        return view('backend.abouts.service-edit', compact('aboutService'));
    }

    public function serviceUpdate(Request $request )
    {

        $aboutService = AboutService::first();

        $request = $request->all();

        $aboutService->update($request);

        toast( 'About service successfully updated', 'success' );

        return redirect()->route('admin.about.service.index');
    }

    public function sliderIndex()
    {
        $aboutsImage = AboutsliderImage::all();
        // return $abouts;
        return view('backend.abouts.image-slider', compact('aboutsImage'));
    }

    public function sliderUpdate(Request $request)
    {
        // dd($request->all());
        $about = AboutsliderImage::find($request->id);
        // return $request ;

        $filename = '';

        if ( $request->hasFile( 'image' ) ) {
            $imageDirectory = 'assets/img/uploads/abouts/';

            deleteImage( $about->image, $imageDirectory );
            $image             = $request->file( 'image' );
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path( 'assets/img/uploads/abouts/' . $filename );
            $thumbnailLocation = public_path( 'assets/img/uploads/abouts/thumbnail/' . $filename );

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }


        $request = $request->all();

        if ($filename != '') {
            $request['image'] = $filename;
        }

        $about->update($request);

        toast( 'About slider successfully updated', 'success' );

        return redirect()->route('admin.about.slider.index');

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
    public function edit( $about)
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

        // return $request->all();

        // dd($request->all());
        $about = About::first();

        $filename = '';
        $filename2 = '';

        if ($request->hasFile('main_section_image')) {

            $filename = $this->uploadImage($about->main_section_image, $request->file('main_section_image'));



        }
        if ($request->hasFile('section2_image1')) {
            $filename2 = $this->uploadImage($about->section2_image1, $request->file('section2_image1'));
        }

        if ($filename != '') {

         $request = $request->all();
         $request['main_section_image'] = $filename;
         $about->update($request);

         toast( 'About successfully updated', 'success' );

         return back();

        }

        if ($filename2 != '') {
            $request = $request->all();
            $request['section2_image1'] = $filename2;
            $about->update($request);

            toast( 'About successfully updated', 'success' );

            return back();
        }


        // $request = $request->all();
        // $request['main_section_image'] = $filename;
        // $request['section2_image1'] = $filename2;

        // $about->update($request);

        // toast( 'About successfully updated', 'success' );

        // return back();

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


    /**
     * Upload about image
     *
     * @param about $about
     * @param array $images
     * @return void
     */
    public function uploadImage($oldImage, $image)
    {

        $imageDirectory = 'assets/img/uploads/abouts/';

        deleteImage( $oldImage, $imageDirectory );
        $filename          = generateUniqueFileName($image->getClientOriginalExtension());
        $location          = public_path('assets/img/uploads/abouts/'.$filename);
        $thumbnailLocation = public_path('assets/img/uploads/abouts/thumbnail/'.$filename);

        $filenames['main_section_image'] = $filename;
        //dd($filenames);

        saveImageWithThumbnail($image, $location, $thumbnailLocation);

        return $filename;

    }
}
