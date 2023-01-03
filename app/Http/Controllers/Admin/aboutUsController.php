<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\helpers\messages;
use App\Models\aboutUs;
use http\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ImageUploader;
use Illuminate\Support\Facades\DB;

class aboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_us = aboutUs::first();
        if (!is_null($about_us)){
            return view('admin.aboutUs.index' , compact('about_us'));
        }
        else
        {
        $message_helper = new Messages();
        $message = $message_helper->Error('صفحه ی درباره ما در دسترس نمیباشد');
           return redirect()->route('dashboard')->with('msg' , $message);
        }
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $request->validate([
//
//            'top_image' => 'required',
//            'top_image_title' => 'required',
//            'top_image_text' => 'required',
//            'middle_left_title' => 'required',
//            'middle_middle_title' => 'required',
//            'middle_right_title' => 'required',
//            'middle_left_text' => 'required',
//            'middle_middle_text' => 'required',
//            'middle_right_text' => 'required',
//            'footer_left_image' => 'required',
//            'footer_middle_image' => 'required',
//            'footer_right_image' => 'required',
//            'footer_left_title' => 'required',
//            'footer_middle_title' => 'required',
//            'footer_right_title' => 'required',
//            'footer_left_text' => 'required',
//            'footer_middle_text' => 'required',
//            'footer_right_text' => 'required',
//        ]);
        try {
            DB::beginTransaction();
        $aboutUs = aboutUs::find($id);

        //uploadImage//
        $ImageFileName=null;
        if (!is_null($request->top_image)) {
            $ImageUploader = new ImageUploader();
            $top_image = $ImageUploader->store($request->top_image , env('Image_aboutUs'));
            $aboutUs->update([
                'top_image' => $top_image,
            ]);
        }else
        {
            $top_image="-";
        }
        //endOfUploadImage//
        //uploadImage//
        $ImageFileName=null;
        if (!is_null($request->footer_left_image)) {
            $ImageUploader = new ImageUploader();
            $footer_left_image = $ImageUploader->store($request->footer_left_image , env('Image_aboutUs'));
            $aboutUs->update([
                'footer_left_image' => $footer_left_image,
            ]);
        }else
        {
            $footer_left_image = '-';
        }
        //endOfUploadImage//
        //uploadImage//
        $ImageFileName=null;
        if (!is_null($request->footer_middle_image)) {
            $ImageUploader = new ImageUploader();
            $footer_middle_image = $ImageUploader->store($request->footer_middle_image , env('Image_aboutUs'));
            $aboutUs->update([
                'footer_middle_image' => $footer_middle_image,
            ]);
        }else
        {
            $footer_middle_image ='-';
        }
        //endOfUploadImage//
        //uploadImage//
        $ImageFileName=null;
        if (!is_null($request->footer_right_image)) {
            $ImageUploader = new ImageUploader();
            $footer_right_image = $ImageUploader->store($request->footer_right_image , env('Image_aboutUs'));
            $aboutUs->update([
                'footer_right_image' => $footer_right_image,
            ]);
        }else
        {
            $footer_right_image ='-';
        }
        //endOfUploadImage//
        $aboutUs->update([
            'top_text' =>  $request->top_text,
            'top_image_title' =>  $request->top_image_title,
            'top_image_text' =>  $request->top_image_text,
            'middle_left_title' =>  $request->middle_left_title,
            'middle_middle_title' =>  $request->middle_middle_title,
            'middle_right_title' =>  $request->middle_right_title,
            'middle_left_text' =>  $request->middle_left_text,
            'middle_middle_text' =>  $request->middle_middle_text,
            'middle_right_text' =>  $request->middle_right_text,
            'footer_left_title' =>  $request->footer_left_title,
            'footer_middle_title' =>  $request->footer_middle_title,
            'footer_right_title' =>  $request->footer_right_title,
            'footer_left_text' =>  $request->footer_left_text,
            'footer_middle_text' =>  $request->footer_middle_text,
            'footer_right_text' =>  $request->footer_right_text,
        ]);

            DB::commit();
        }catch (\Exception $ex)
        {
            DB::rollBack();
            $massage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">خطا در بروزرسانی صفحه درباره ما<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg' , $massage);

        }

        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert">بروز رسانی صفحه درباره ما انجام شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
