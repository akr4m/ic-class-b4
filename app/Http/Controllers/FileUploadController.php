<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index()
    {
        Log::info('This is from the file upload controller');
        if (Storage::disk('local')->exists('abc.png')) {
            Storage::disk('local')->delete('abc.png');

            return 'File deleted successfully';
        }

        return view('upload');
    }

    public function store(Request $request)
    {
        // 1. validate the file: size, type, etc
        $request->validate([
            'file' => 'required|file|max:8000|mimes:jpg,png,pdf,docx',
        ]);

        $file = $request->file('file');

        dd($file->dimensions());

        $name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $fileName = 'image_'.time().'.'.$extension;

        // 2. store the file in the storage folder
        // $request->file('file')->store('ic', 'public');
        $request->file('file')->storeAs(
            '/',
            $fileName,
            'public'
        );
        // Storage::disk('public')->putFileAs(
        //     '/',
        //     $file,
        //     $fileName
        // );

        $fileUrl = Storage::disk('public')->url($fileName);

        // 3. return success message
        return back()->with('success', $fileUrl);
    }

    public function download($file)
    {
        return Storage::disk('local')->download($file);
    }
}
