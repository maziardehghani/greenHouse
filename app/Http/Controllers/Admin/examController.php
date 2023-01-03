<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\employment_items;
use App\Models\exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ImageUploader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class examController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employment_items = employment_items::where('parent_id', '!=', 0)->paginate(20);
        return view('admin.exams.index', compact('employment_items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employment_item_parents = employment_items::where('parent_id', '!=', 0)->get();
        return view('admin.exams.create',compact('employment_item_parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'employment_item_id' => 'required',
            'questions.*'=>'required',
            'option1.*'=>'required',
            'option2.*'=>'required',
            'option3.*'=>'required',
            'true_option.*'=>'required',
            'image'=>'nullable',
        ]);
        try {
            DB::beginTransaction();

        foreach ($request->questions as $key=>$item)
        {

            exam::create([
                'Question' => $request->questions[$key],
                'Option1' => $request->option1[$key],
                'Option2' => $request->option2[$key],
                'Option3' => $request->option3[$key],
                'true_Option' => $request->true_option[$key],
                'employment_item_id' => $request->employment_item_id
            ]);

        }
        DB::commit();
        }catch (\Exception $ex)
        {
            $massage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">سوال آزمون شما ثبت نشد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg' , $ex);
        }
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert">سوال آزمون شما با موفقیت ثبت شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employment_item_id)
    {
        $exam = exam::where('employment_item_id', '=', $employment_item_id)->get();
        $employment_items = employment_items::find($employment_item_id);
        return view('admin.exams.show', compact('exam', 'employment_items'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($employment_item_id)
    {
        $exam = exam::where('employment_item_id', '=', $employment_item_id)->get();
        $employment_items = employment_items::find($employment_item_id);
        return view('admin.exams.edit', compact('exam', 'employment_items' ,'employment_item_id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employment_item_id)
    {
        $request->validate([
            'question.*' => 'required',
            'option1.*' =>  'required',
            'option2.*' =>  'required',
            'option3.*' =>  'required',
            'true_option.*' => 'required',
            'image' => 'nullable',
        ]);

        try {
            DB::beginTransaction();


            foreach ($request->id_questions as $key => $id_Question) {
                //uploadImage//
                $Question = exam::find($id_Question);
                $ImageFileName = null;
                if (!is_null($request->image[$key + 1])) {
                    $ImageUploader = new ImageUploader();
                    $ExamDate = $ImageUploader->getExamDate($employment_item_id);
                    $empSlug = $ImageUploader->getEmpSlug($employment_item_id);
                    $ImageFileName = $ImageUploader->store($request->image[$key + 1], env('Image_exams_path') . $empSlug . '/' . $ExamDate . '/');
                    $Question->update([
                        'image' => $ImageFileName,
                    ]);
                }
                //endOfUploadImage//

                $Question->update([
                    'Question' => $request->question[$key + 1],
                    'option1' => $request->option1[$key + 1],
                    'option2' => $request->option2[$key + 1],
                    'option3' => $request->option3[$key + 1],
                    'true_Option' => $request->optionT[$key + 1],
                    'employment_item_id' => $employment_item_id,
                ]);
            }
            DB::commit();
        }catch (\Exception $ex)
        {
            $massage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">سوال آزمون شما ویرایش نشد<i class="zmdi zmdi-info"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg' , $massage);
        }
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert">سوال آزمون شما با موفقیت ویرایش شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($exam_id)
    {
        $exam = exam::find($exam_id);
        //$path = env('Image_exams_path').$exam->employment_item_id.'/'.$exam->image;
        $exam->delete();
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert">  سوال مورد نظر با موفقیت حذف شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);
    }
}
