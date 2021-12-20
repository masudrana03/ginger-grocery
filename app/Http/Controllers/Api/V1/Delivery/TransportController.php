<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Models\TransportImage;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Delivery man transport registation document.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getRegistationDoc(Request $request)
    {
        $request->validate( [
            'images'        => 'required',
        ] );

        $requestInfo = $request->except('_token');

        $requestInfo['user_id'] = auth()->id();

        $transport = Transport::create($requestInfo);

        if ($request->hasFile('images')) {
          return $this->uploadTransportImage($transport, $request->file('images'));
        }

       return ok( 'Transport registation document save successfully', $transport);

    }

    /**
     * Delivery man registation document update .
     *
     * @param integer $transportId
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request , $transportId)
    {
        $request->validate( [
            'vehicle_brand'        => 'required',
            'vehicle_model'        => 'required',
            'vehicle_number_plate' => 'required',
            'vehicle_image'        => 'required',
        ] );

        $transport = Transport::find( $transportId );

        $filename = '';

        $requestInfo = $request->except('_token');

        $requestInfo['user_id'] = auth()->id();

        if ( $request->hasFile( 'vehicle_image' ) ) {

            $image             = $request->file( 'vehicle_image' );
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path( 'assets/img/uploads/transports/' . $filename );
            $thumbnailLocation = public_path( 'assets/img/uploads/transports/thumbnail/' . $filename );

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        $requestInfo['vehicle_image'] = $filename;

        $transport->update($requestInfo);

        return ok( 'Transport save successfully', $transport);
    }


    /**
     * Delivery man multiple image upload.
     *
     * @param Transport $transport
     * @param array $images
     * @return JsonResponse
     */
    public function uploadTransportImage( $transport, $images )
    {
        foreach ($transport->images as $image) {
            $imageDirectory = 'assets/img/uploads/transports/';

            deleteImage($image->image, $imageDirectory);
        }

        $filenames = [];

        foreach ($images as $image) {
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/transports/' . $filename);
            $thumbnailLocation = public_path('assets/img/uploads/transports/thumbnail/' . $filename);

            $filenames['image'] = $filename;

            saveImageWithThumbnail($image, $location, $thumbnailLocation);

            $transport->images()->create($filenames);
        }
    }
}
