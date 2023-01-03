<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\aboutUs;
use App\Models\banners;
use App\Models\grade_user;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $aboutUs = aboutUs::all()->first();
        $banners = banners::where('is_active' , '=' , 1)->get();
        return view('home.index' , compact('banners' ,'aboutUs'));
    }
}
