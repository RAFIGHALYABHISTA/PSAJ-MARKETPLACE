<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function image($path)
    {
        $fullPath = 'public/' . $path;

        if (!Storage::exists($fullPath)) {
            abort(404);
        }

        $file = Storage::get($fullPath);
        $mimeType = Storage::mimeType($fullPath);

        return response($file, 200)->header('Content-Type', $mimeType);
    }
}
