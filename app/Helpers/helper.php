<?php

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

/**
 * Deletes Image and Thumbnail of category
 * @param string $image
 */
function deleteCategoryImage( $image ) {
    $categoryImageDirectory = 'assets/img/categories/';
    deleteFile( $categoryImageDirectory . $image );
    deleteFile( $categoryImageDirectory . 'thumbnail/' . $image );
}

/**
 * Deletes a file if it exsist
 * @param string $location
 */
function deleteFile( $location ) {
    File::exists( $location ) && File::delete( $location );
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

/**
 * Generates a unique filename with extension
 * @param  string $extension
 * @return string unique file name
 */
function generateUniqueFileName( $extension ) {
    return now()->toDateString() . '-' . uniqid() . '.' . $extension;
}
