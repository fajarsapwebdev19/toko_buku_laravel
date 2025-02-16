<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('landing.home');
    }

    public function search()
    {
        return view('landing.search');
    }

    public function category()
    {
        return view('landing.category');
    }

}
