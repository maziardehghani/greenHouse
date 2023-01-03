<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\employment_items;
use App\Models\settings;
use Illuminate\Http\Request;

class employmentsController extends Controller
{
    public function index()
    {
        $settings = settings::find(1);
        $exam_cost = $settings->exam_cost;
        $employment_items = employment_items::where('is_active' , '=' , 1)->where('parent_id' , '=' , 0)->get();
        $attitudes = employment_items::where('is_active' , '=' , 1)->where('parent_id' , '!=' , 0)->get();
        return view('home.employments.index' ,compact('employment_items' ,'attitudes' , 'exam_cost'));
    }
}
