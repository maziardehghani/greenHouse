<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\employment_items;
use App\Models\exam;
use App\Models\grade_user;
use App\Models\User;
use Illuminate\Http\Request;

class userPanelController extends Controller
{
    public function index()
    {
        if (auth()->check())
        {
            $employment_item = null;
            $user_signUp = null;
            $user = User::find(auth()->id());
            $user_signUp = grade_user::where('user_id' , $user->id)->first();

            if (!is_null($user_signUp))
            {
                $employment_item = employment_items::find($user_signUp->employment_item_id);
                $exam = exam::where('employment_item_id' , $employment_item->id)->get();
                $exam_count = count($exam);
                return view('home.userPanel.index' , compact('user' ,'user_signUp', 'employment_item', 'exam' ,'exam_count'));

            }

            return view('home.userPanel.index' , compact('user' , 'employment_item' , 'user_signUp'));
        }
        return redirect()->route('home.index');

    }

    public function update(Request $request )
    {

      $fieldName = $request->fieldName;
      $Putval = $request->$fieldName;
      $user_id = auth()->id();
      $user = grade_user::where('user_id' , $user_id);
      $user->update([
          $fieldName => $Putval
      ]);
      return redirect()->back();

    }
}
