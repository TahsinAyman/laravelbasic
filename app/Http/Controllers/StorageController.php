<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller {
    public function showFile($filename) {
        $filePath = 'public/uploads/' . $filename;
        if (Storage::exists($filePath)) {
            return Storage::response($filePath);
        }
        abort(404);
    }
    public function uploadFIle(FileUploadRequest $request) {
        $file = $request->file('file');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('uploads', $filename, 'public');
        return response()->json([
            "result" => "Success",
            "url" => url(route('storage.showFile', $filename))
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }
}
