<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        if(!empty($request->file('image'))) {
            $path = $request->file('image');
            $originalName = $path->getClientOriginalName();
            $path->storeAs('image', $originalName);
            return true;
        }
        return false;
    }

    public function save(array $data)
    {
        Media::create($data);
    }
}
