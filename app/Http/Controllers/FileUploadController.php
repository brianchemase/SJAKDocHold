<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB Facade

class FileUploadController extends Controller
{
    //

    public function index()
    {
        // Retrieve all files from the database
        $files = DB::table('file_uploads')->get();

        return view('index', compact('files'));
    }

    public function create()
    {
        // Show the upload form
        return view('upload');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
            'caption' => 'required|string|max:255',
        ]);

        // Save the file to the 'public/uploads' directory
        $filePath = $request->file('file')->store('uploads', 'public');

        // Insert data into the database using DB Facade
        DB::table('file_uploads')->insert([
            'file_path' => $filePath,
            'caption' => $request->caption,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/')->with('success', 'File uploaded successfully!');
    }

    public function approve(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'action' => 'required|string',
            'userid' => 'required|integer',
            'ref' => 'required|string',
            'comment' => 'nullable|string',
            'actiontime' => 'required|date',
        ]);

        // Use DB facade to insert the data into the database
        DB::table('actions')->insert([
            'action' => $validated['action'],
            'ref' => $validated['ref'],
            'userid' => $validated['userid'],
            'comment' => $validated['comment'],
            'actiontime' => $validated['actiontime'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Approval submitted successfully!');
    }

    // Handle Return action
    public function return(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'action' => 'required|string',
            'userid' => 'required|integer',
            'ref' => 'required|string',
            'comment' => 'nullable|string',
            'actiontime' => 'required|date',
        ]);

        // Use DB facade to insert the data into the database
        DB::table('actions')->insert([
            'action' => $validated['action'],
            'ref' => $validated['ref'],
            'userid' => $validated['userid'],
            'comment' => $validated['comment'],
            'actiontime' => $validated['actiontime'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Return submitted successfully!');
    }
}
