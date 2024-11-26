<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'document_file' => 'required|file|mimes:pdf|max:10240', // 10 MB max file size
            'department' => 'required|string',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Handle the file upload (PDF only)
            // $fileName = null;
            // if ($request->hasFile('document_file')) {
            //     $file = $request->file('document_file');
            //     $fileName = time() . '_' . $file->getClientOriginalName();
            //     // Store file in the public disk
            //     $file->storeAs('uploads/documents', $fileName, 'public');
            // }

             // Save the file to the 'public/uploads' directory
            $filePath = $request->file('document_file')->store('uploads', 'public');

            // Generate cert_serial
            //$refno = 'SJAK' . date('Ymd') . mt_rand(1, 500);
            $refno = 'SJAK' . date('Ymd') . str_pad(mt_rand(1, 500), 3, '0', STR_PAD_LEFT);

            // Insert the form data into the database using DB Facade
            DB::table('submittions')->insert([
                'title' => $request->title,
                'amount' => $request->amount,
                'ref' => $refno,
                'description' => $request->description,
                'upload_time' => now(), // Use current timestamp
                'uploaded_by' => "Admin",
                'status' => "pending",
                //'uploaded_by' => Auth::user()->name,
                'document_file' => $filePath, // Store the file name
                'department' => $request->department,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Document uploaded successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Redirect back with error message
            return redirect()->back()->with('error', 'An error occurred while uploading the document.');
        }
    }

    public function show($id)
    {
        // Fetch the document from the 'documents' table using DB facade
       $document = DB::table('submittions')->where('id', $id)->first();

       // Extract the 'ref' value from the document
       $ref = $document->ref;

            $actions = DB::table('actions')
            ->join('users', 'actions.userid', '=', 'users.id') // Assuming the "users" table contains user information
            ->select('actions.*', 'users.name as user_name') // Select relevant columns
            ->orderBy('actions.actiontime', 'desc') // Order by upload_time
            ->get();  // Get the result

            $actions = DB::table('actions')
            ->join('users', 'actions.userid', '=', 'users.id') // Assuming the "users" table contains user information
            ->select('actions.*', 'users.name as user_name') // Select relevant columns
            ->where('actions.ref', '=', $ref) // Filter actions by the 'ref' value
            ->orderBy('actions.actiontime', 'desc') // Order by action time
            ->get(); // Get the result

        // Prepare the data to be passed to the view
        $data = [
            'document' => $document,
            'actions' => $actions,
        ];

        // Return the view and pass the data
        return view('dashboard.showfile')->with($data);
    }

    public function viewsuploads ()
    {

        $submissions = DB::table('submittions')->get(); // Get all submissions

        $data = [
            'submissions' => $submissions,
        ];

        // Return the view and pass the data
        return view('dashboard.uploadstable')->with($data);

    }


}
