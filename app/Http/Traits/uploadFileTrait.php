<?php

namespace App\Http\Traits;

/**
 * 
 */
trait TraitImage
{
    protected function uploadImage($request, $avatar, $folder)
    {
        $image = $request->file($avater);
        $fileName = time() . str_random('10'). '.' .$file->getClientOriginalExtension();
        $file->move(public_path('uploads/'.$folder), $fileName);
        return $fileName;
    }
}
