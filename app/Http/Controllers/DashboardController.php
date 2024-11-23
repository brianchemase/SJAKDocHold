<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {

        $contributions="";

        $data=[
            'contributions' => $contributions,
            

        ];

        return view('dashboard.home')->with($data);

    }

    public function loginpage()
    {

        $contributions="";

        $data=[
            'contributions' => $contributions,
            

        ];

        return view('logs.login')->with($data);

    }
}
