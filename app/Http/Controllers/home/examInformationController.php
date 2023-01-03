<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\employment_items;
use App\Models\exam;
use App\Models\grade_user;
use Illuminate\Http\Request;

class examInformationController extends Controller
{
    public function index()
    {
        try {
            if (auth()->check())
            {
                $userInfo = grade_user::where('user_id' , auth()->id())->first();
                if (is_null($userInfo))
                {
                    $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div> شما هزینه آزمون را پرداخت نکرده </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    return redirect()->route('home.index')->with('msg' , $message);
                }
                if ($userInfo->is_test==0 && $userInfo->is_pay==1)
                {
                    $employment_item = employment_items::find($userInfo->employment_item_id);
                    $exam = exam::where('employment_item_id' , $employment_item->id)->get();
                    $exam_count = count($exam);
                    return view('home.examInformation.index' , compact('userInfo' , 'employment_item' , 'exam_count'));
                }else
                {
                    return redirect()->back();
                }

            }
            $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div> شما باید ابتدا وارد حساب کاربری خود شوید </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return redirect()->route('home.index')->with('msg' , $message);

        } catch (\Exception $ex)
        {
            return redirect()->back();
        }


    }
}
