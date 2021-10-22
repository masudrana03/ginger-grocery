<?php

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

/**
 * Deletes Image and Thumbnail of category
 * @param string $image
 */
function deleteCategoryImage( $image ) {
    File::exists( 'assets/img/categories/' . $image ) && File::delete( 'assets/img/categories/' . $image );
    File::exists( 'assets/img/categories/thumbnail/' . $image ) && File::delete( 'assets/img/categories/thumbnail/' . $image );
}

/**
 * Saves a image with thumbnail
 * @param File   $image
 * @param string $location
 * @param string $thumbnailLocation | optional
 */
function saveImageWithThumbnail( $image, $location, $thumbnailLocation = false ) {
    Image::make( $image )->save( $location );
    $thumbnailLocation && Image::make( $image )->resize( 200, 200 )->save( $thumbnailLocation );
}
