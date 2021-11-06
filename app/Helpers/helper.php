<?php

use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

/**
 * Deletes Image and Thumbnail
 * @param string $image
 * @param string $imageDirectory
 */
function deleteImage($image, $imageDirectory)
{
    deleteFile($imageDirectory . $image);
    deleteFile($imageDirectory . 'thumbnail/' . $image);
}

/**
 * Deletes a file if it exsist
 * @param string $location
 */
function deleteFile($location)
{
    File::exists($location) && File::delete($location);
}

/**
 * Saves a image with thumbnail
 * @param File   $image
 * @param string $location
 * @param string $thumbnailLocation | optional
 */
function saveImageWithThumbnail($image, $location, $thumbnailLocation = false)
{
    Image::make($image)->save($location);
    $thumbnailLocation && Image::make($image)->resize(200, 200)->save($thumbnailLocation);
}

/**
 * Generates a unique filename with extension
 * @param  string $extension
 * @return string unique file name
 */
function generateUniqueFileName($extension)
{
    return now()->toDateString() . '-' . uniqid() . '.' . $extension;
}

/**
 * Validate with validator Make
 * @param array $rules
 */
function validateData($rules)
{
    return Validator::make(request()->all(), $rules);
}

/**
 * @param $key
 * @return mixed
 */
function settings($key)
{
    static $settings;

    if (is_null($settings)) {
        $settings = \Illuminate\Support\Facades\Cache::remember('settings', 24 * 60, function () {
            return \App\Models\Setting::pluck('value', 'key')->toArray();
        });
    }

    return (is_array($key)) ? \Illuminate\Support\Arr::only($settings, $key) : $settings[$key];
}

function sendGeneralEmail($email, $subject, $message)
{
    if (settings('mail_driver') == 'smtp') {
        sendSmtpMail($email, $subject, $message);
    }
}

function sendSmtpMail($email, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host     = settings('mail_host');
        $mail->SMTPAuth = true;
        $mail->Username = settings('mail_user_name');
        $mail->Password = settings('mail_password');
        
        if (settings('encryption') == 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }

        $mail->Port     = settings('mail_port');
        $mail->CharSet  = 'UTF-8';
        $mail->setFrom(settings('mail_from'), settings('mail_from_name'));
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject  = $subject;
        $mail->Body     = $message;
        $mail->send();
    } catch (Throwable $th) {
        throw new Exception($th);
    }
}
