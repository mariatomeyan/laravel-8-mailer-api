<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Images extends Controller
{
    public function getImagesWithUrl(Request $request)
    {
        $images = Storage::disk('images')->files();

        $images_with_url = collect($images)->map(function ($image) {
            return Storage::disk('images')->url('images/'.$image);
        });
//        return response('sdfsjdhfjsfhs');
        return response()->json($images_with_url);

    }
}
