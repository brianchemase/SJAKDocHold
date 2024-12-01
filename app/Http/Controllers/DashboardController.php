<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB Facade

class DashboardController extends Controller
{
    //

    public function dashboard()
    {

        $contributions="";
        $approvedCount = DB::table('submittions')->where('status', 'approved')->count();
        $pendingCount = DB::table('submittions')->where('status', 'pending')->count();
        $onReviewCount = DB::table('submittions')->where('status', 'on review')->count();
        $totalUploads = DB::table('submittions')->count();

        $data=[
            'contributions' => $contributions,
            'approvedCount' => $approvedCount,
            'pendingCount' => $pendingCount,
            'onReviewCount' => $onReviewCount,
            'totalUploads' => $totalUploads,
            

        ];

        return view('dashboard.home')->with($data);

    }

    public function blank()
    {

        $contributions="";

        $data=[
            'contributions' => $contributions,
            

        ];

        return view('dashboard.blank')->with($data);

    }

    public function table()
    {

        $contributions="";

        $data=[
            'contributions' => $contributions,
            

        ];

        return view('dashboard.table')->with($data);

    }


    public function form()
    {

        $contributions="";

        $data=[
            'contributions' => $contributions,
            

        ];

        return view('dashboard.form')->with($data);

    }

    public function uploaddoc()
    {

        $contributions="";

        $data=[
            'contributions' => $contributions,
            

        ];

        return view('dashboard.uploaddocform')->with($data);

    }
}
