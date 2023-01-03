<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ImageUploader;
use App\Http\Controllers\Controller;
use App\Models\employment_conditions;
use App\Models\employment_items;
use App\Models\exam;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Support\Facades\DB;


class employmentItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $employment_items = employment_items::latest()->paginate(10);
            return view('admin.employments.index' , compact('employment_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employment_item_parents = employment_items::where('parent_id' , '==' , 0)->get();
        return view('admin.employments.create' , compact('employment_item_parents'));
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
            'title'=>'required',
            'parent'=>'required',
            'exam_date'=>'nullable',
            'exam_time'=>'nullable|integer',
            'explain'=>'nullable',
            'image'=>'nullable|mimes:jpg,png',
            'is_active'=>'required',

        ]);

        try {
            DB::beginTransaction();


        //generateExamDate//
        $exam_date=null;
        if (!is_null($request->exam_date)) {
            $exam_date = generateExamDate($request->exam_date);
        }
        //endOfGenerateExamDate//


        //uploadImage//
        $ImageFileName=null;
        if (!is_null($request->image)) {
            $ImageUploader = new ImageUploader();
            $ImageFileName = $ImageUploader->store($request->image , env('Image_employment_items_path'));
        }
        //endOfUploadImage//


        employment_items::create([
            'title' => $request->title,
            'explain' => $request->explain,
            'parent_id' => $request->parent,
            'exam_date' => $exam_date,
            'exam_time' => $request->exam_time,
            'image' => $ImageFileName,
            'is_active' => $request->is_active,
        ]);

        DB::commit();
        }catch (\Exception $ex)
        {
            DB::rollBack();
            $massage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">آیتم استخدام شما ثبت نشد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg' , $massage);

        }
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert">آیتم استخدام شما با موفقیت ثبت شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->route('admin.employments.index')->with('msg' , $massage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(employment_items $employment_items)
    {
        return view('admin.employments.show' , compact('employment_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(employment_items $employment_items)
    {
        $employment_item_parents = employment_items::where('parent_id' , '==' , 0)->get();

        return view('admin.employments.edit' , compact('employment_items' , 'employment_item_parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , employment_items $employment_items)
    {
        $request->validate([
            'title'=>'required',
            'parent'=>'required',
            'exam_date'=>'nullable',
            'exam_time'=>'nullable|integer',
            'explain'=>'nullable',
            'image'=>'nullable|mimes:jpg,png',
            'is_active'=>'required',
        ]);


        try {
            DB::beginTransaction();
            //generateExamDate//
            $exam_date=null;
            if (!is_null($request->exam_date)) {
                $exam_date = generateExamDate($request->exam_date);
            }
            //endOfGenerateExamDate//




            //uploadImage//
            $ImageFileName=null;
            if (!is_null($request->image)) {
                $ImageUploader = new ImageUploader();
                $ImageFileName = $ImageUploader->store($request->image , env('Image_employment_items_path'));
                $employment_items->update([
                    'image' => $ImageFileName,
                ]);
            }
            //endOfUploadImage//




            $employment_items->update([
                'title' => $request->title,
                'explain' => $request->explain,
                'parent_id' => $request->parent,
                'exam_date' => $exam_date,
                'exam_time' => $request->exam_time,
                'is_active'=>$request->is_active,
            ]);

            DB::commit();
        }catch (\Exception $ex)
        {
            DB::rollBack();
            $massage = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="zmdi zmdi-info"></i>آیتم استخدام شما ویرایش نشد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg' , $massage);

        }

        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert">آیتم استخدام شما با موفقیت ویرایش شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employment_id)
    {

        $employment_item = employment_items::find($employment_id);
        $childs = employment_items::where('parent_id' , '=' , $employment_id);

        $childs->delete();
        $employment_item->delete();

        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert">  استخدام مورد نظر با موفقیت حذف شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);
    }

}
