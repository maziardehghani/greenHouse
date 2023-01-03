<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\employment_conditions;
use App\Models\employment_items;
use Illuminate\Http\Request;

class ConditionsController extends Controller
{
    public function index($attitude , $empItem)
    {
        $employment_item = employment_items::where('slug' , '=' , $attitude)->first();
        $conditions = employment_conditions::where('employment_item_id' , '=' , $employment_item->id)->get();

        return view('home.conditions.index' , compact('conditions' ,'employment_item'));
    }
}
