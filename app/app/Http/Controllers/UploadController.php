<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\UploadedFile;
use App\Models\User;

class UploadController extends Controller
{
    // stores the upload
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming file. Refuses anything bigger than 2048 kilobytes (=2MB)
        $request->validate([
            'file' => 'required|mimes:jpg,png|max:2048',
            'fileName' => 'required|string',
        ]);

        // Store the file in storage/app/public/uploads/userId folder,

        $file = $request->file('file');

        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads/' . $request->user()->id, 'public');

        // Store file information in the database
        $uploadedFile = new UploadedFile();
        $uploadedFile->filename = $fileName;
        $uploadedFile->original_name = $file->getClientOriginalName();
        $uploadedFile->file_path = $filePath;
        $uploadedFile->location = config('env') === 'local' ? 'local' : 'S3';
        $uploadedFile->userId = $request->user()->getKey();
        $uploadedFile->save();

        // Redirect back to the index page with a success message
        return redirect()->route('dashboard')
            ->with('success', "File `{$uploadedFile->original_name}` uploaded successfully.");
    }

    // shows the create form
    public function create()
    {
        return view('uploads.create');
    }

    // shows the uploads index
    public function index(Request $request)
    {
        $uploadedFiles = UploadedFile::where('user_id', $request->user()->getKey());
        return view('uploads.index', compact('uploadedFiles'));
    }
}
