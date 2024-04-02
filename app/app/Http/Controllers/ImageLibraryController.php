<?php

namespace App\Http\Controllers;

use Inertia\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\UploadedFile;

class ImageLibraryController extends Controller
{
    /**
     * Display the registration view.
     */
    public function show(Request $request): Response
    {

        $uploadedFiles = UploadedFile::where('user_id', $request->user()->getKey());

        return Inertia::render('Dashboard/Partials/FileLibrary', [
            'uploadedFiles' => $uploadedFiles
        ]);
    }

    /**
     * Handles an incoming request for saved images
     *
     */
    public function index(Request $request)
    {
        $uploadedFiles = UploadedFile::where('user_id', $request->user()->getKey());
        
        return  $uploadedFiles;
    }
}
