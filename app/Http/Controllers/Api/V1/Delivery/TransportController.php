<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Models\TransportImage;
use Illuminate\Http\Request;

class TransportController extends Controller
{

    public function getRegistationDoc(Request $request){
        $request->validate( [
            'images'        => 'required',
        ] );

        $transport = $request->except('_token');

        $transport['user_id'] = auth()->id();

        $transport = Transport::create($transport);

        if ($request->hasFile('images')) {
            return $this->uploadTransportImage($transport, $request->file('images'));
        }

       return ok( 'Transport registation document save successfully', $transport);

    }


    public function store(Request $request)
    {
        $filename = '';
        $request->validate( [
            'vehicle_brand'        => 'required',
            'vehicle_model'        => 'required',
            'vehicle_number_plate' => 'required',
            'image'                => 'required',
        ] );



        // $transport                        = new Transport();
        // $transport->vehicle_brand         = $request->vehicle_brand;
        // $transport->vehicle_model         = $request->vehicle_model;
        // $transport->vehicle_number_plate  = $request->vehicle_number_plate;
        // $transport->image = $filename;
        // $transport->save();

        $transport = $request->except('_token');

        $transport['user_id'] = auth()->id();

        // return  $request;

        if ( $request->hasFile( 'image' ) ) {

            $image             = $request->file( 'image' );
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path( 'assets/img/uploads/transports/' . $filename );
            $thumbnailLocation = public_path( 'assets/img/uploads/transports/thumbnail/' . $filename );

            // return $thumbnailLocation;
            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        $transport          = $request->all();
        $transport['image'] = $filename;

        $transport = Transport::create($transport);

        return ok( 'Transport save successfully', $transport);
    }



    public function uploadTransportImage($transport, $images)
    {
        foreach ($transport->images as $image) {
            $imageDirectory = 'assets/img/uploads/transports/';

            deleteImage($image->image, $imageDirectory);
        }

        $filenames = [];

        foreach ($images as $image) {
            die($image);
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/transports/' . $filename);
            $thumbnailLocation = public_path('assets/img/uploads/transports/thumbnail/' . $filename);

            $filenames['image'] = $filename;
            saveImageWithThumbnail($image, $location, $thumbnailLocation);

            $transport->images()->create($filenames);
        }
    }
}
