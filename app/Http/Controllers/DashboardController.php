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
