<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

function uploadImage($dir, $input)
{
    $directory = public_path() . $dir;
    if (is_dir($directory) != true) {
        \File::makeDirectory($directory, $mode = 0755, true);
    }
    $fileName = uniqid() . '.' . request()->file($input)->getClientOriginalExtension();
    $image = Image::make(request()->file($input));
    $image->save($directory . '/' . $fileName, 100);

    return $fileName;
}

function removeImage($dir, $image)
{
    $f1 = public_path() . $dir . '/' . $image;
    File::delete($f1);
}
