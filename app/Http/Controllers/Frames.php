<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Frames extends Controller
{
    public function getFramesWithUrl()
    {
        $images = Storage::disk('frames')->files();
        $images_with_url = collect($images)->map(function ($image) {
            return Storage::disk('frames')->url('frames/'.$image);
        });
        return $images_with_url;
    }
}
