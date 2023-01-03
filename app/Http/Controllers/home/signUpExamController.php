<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\employment_items;
use App\Models\grade_user;
use App\Models\settings;
use Illuminate\Http\Request;
use App\Http\Controllers\home\paymentController;
use Illuminate\Support\Facades\DB;

class signUpExamController extends Controller
{
    public function index($attitude_slug , $empItem_slug)
    {
        try {
            if (auth()->check()) {
                $settings = settings::find(1);
                $exam_cost = $settings->exam_cost;
                $empItem_exam = employment_items::where('slug', $attitude_slug)->first();
                return view('home.signUpExam.index', compact('empItem_exam' , 'exam_cost'));
            }
            $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div> شما باید ابتدا به حساب خود وارد شوید </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return redirect()->route('home.index')->with('msg' , $message);

        }catch (\Exception $ex)
        {
            return redirect()->back();
        }
        }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'address' =>  'required',
            'phone' =>  'required',
            'shomare_shenasname' =>  'required',
            'code_meli' =>  'required',
            'sodoor_place' =>  'required',
            'born_date' =>  'required',
            'born_place' =>  'required',
            'nationality' =>  'required',
            'religion' =>  'required',
            'faith' =>  'required',
            'education' =>  'required',
            'speciality' =>  'required',
            'education_place' =>  'required',
            'marriage' =>  'required',
            'child_count' =>  'nullable',
            'dismiss' =>  'nullable',
            'issar' => 'nullable',
            'code_post' => 'required',
            'awards' => 'nullable',
            'military' => 'required',
        ]);

        try {
            DB::beginTransaction();
            grade_user::create([
                'user_id' => auth()->id(),
                'nameFamily' =>   $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'shomare_shenasname' => $request->shomare_shenasname,
                'code_meli' => $request->code_meli,
                'sodoor_place' => $request->sodoor_place,
                'born_date' => $request->born_date,
                'born_place' => $request->born_place,
                'nationality' => $request->nationality,
                'religion' => $request->religion,
                'faith' => $request->faith,
                'education' => $request->education,
                'speciality' => $request->speciality,
                'education_place' => $request->education_place,
                'marriage' => $request->marriage,
                'child_count' => $request->child_count,
                'dismiss' => $request->dismiss,
                'issar' => $request->issar,
                'code_post' => $request->code_post,
                'awards' => $request->awards,
                'military' => $request->military,
                'employment_item_id' => $request->employment_item_id,
                'is_test' => 0,
            ]);
            DB::commit();
        }catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->route('home.signUp.payment');
    }


    public function payment()
    {
        try {
            $user_id = auth()->id();
            $user = grade_user::where('user_id' , $user_id)->first();
            if (!is_null($user))
            {
                return view('home.signUpExam.payment');
            }else
            {
                return redirect()->back();
            }
        }catch (\Exception $ex)
        {
            return redirect()->back();
        }


    }

}
