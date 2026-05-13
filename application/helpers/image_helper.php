<?php

if (!function_exists('auto_webp_after_upload')) {
    function auto_webp_after_upload()
    {
        return function ($uploader_response, $field_info, $files_to_upload) {
            $file_path = $field_info->upload_path . '/' . $uploader_response[0]->name;
            $new_path  = $field_info->upload_path . '/' . pathinfo($uploader_response[0]->name, PATHINFO_FILENAME) . '.webp';

            compress_and_convert_to_webp($file_path, $new_path);

            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $uploader_response[0]->name = basename($new_path);
            return $uploader_response;
        };
    }
}



if (!function_exists('compress_and_convert_to_webp')) {
    function compress_and_convert_to_webp($source_path, $destination_path, $quality = 75)
    {
        // Get image type
        $info = getimagesize($source_path);
        $mime = $info['mime'];

        // Create image resource
        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source_path);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source_path);
                // Remove alpha for PNG transparency
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source_path);
                break;
            case 'image/webp':
                $image = imagecreatefromwebp($source_path);
                break;
            case 'image/avif':
                // AVIF not natively supported by GD — skip for now
                return;
            default:
                return; // unsupported type
        }

        // Optional resize (max width = 1200px)
        $width = imagesx($image);
        $height = imagesy($image);
        $max_width = 1200;
        if ($width > $max_width) {
            $new_height = ($max_width / $width) * $height;
            $resized = imagescale($image, $max_width, $new_height);
            imagedestroy($image);
            $image = $resized;
        }

        // Save as webp with desired quality
        imagewebp($image, $destination_path, $quality);
        imagedestroy($image);
    }
}
