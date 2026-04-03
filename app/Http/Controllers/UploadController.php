<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Handle image upload from TinyMCE editor.
     * Returns JSON with the public URL for the uploaded image.
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $path = $request->file('file')->store('lessons', 'public');

        return response()->json([
            'location' => Storage::url($path),
        ]);
    }
}
