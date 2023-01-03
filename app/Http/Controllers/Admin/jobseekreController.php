<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\employment_items;
use App\Models\exam;
use App\Models\grade_user;
use Illuminate\Http\Request;

class jobseekreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employment_items = employment_items::where('parent_id','!=' , 0)->get();
        return view('admin.jobseekers.index' , compact('employment_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employment_id)
    {
        $jobseekers = grade_user::where('employment_item_id' , $employment_id)->paginate(20);
        return view('admin.jobseekers.show' , compact('jobseekers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($jobseeker_id)
    {
        try {
            $jobseeker_exam = grade_user::where('user_id' , $jobseeker_id)->first();
            $exam = exam::where('employment_item_id' , $jobseeker_exam->employment_item_id)->get();
            $answers = unserialize($jobseeker_exam->exam_form);

            return view('admin.jobseekers.examForm' , compact('exam' , 'answers' , 'jobseeker_id'));
        }catch (\Exception $ex)
        {
            $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="zmdi zmdi-info"></i>خطا<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg' , $message);
        }
       }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jobseeker_id)
    {
        $user = grade_user::where('user_id' , $jobseeker_id)->first();
        $user->update([
            'grade' => $request->grade,
        ]);
        return redirect()->route('admin.jobseekers.show' , $user->employment_item_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employment_item_id)
    {
        $users = grade_user::where('employment_item_id' , $employment_item_id);
        $users->delete();
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert"> متقاضیان استخدام مورد نظر از لیست حذف شدند<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);
    }
}
