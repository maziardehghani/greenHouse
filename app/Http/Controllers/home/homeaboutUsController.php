<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\aboutUs;
use Illuminate\Http\Request;

class homeaboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = aboutUs::all()->first();
        return view('home.aboutUs.index' , compact('aboutUs'));
    }
}
