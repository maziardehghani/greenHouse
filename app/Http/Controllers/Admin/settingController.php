<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\settings;
use Illuminate\Http\Request;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $settings = settings::all();
        return view('admin.settings.index' , compact('settings'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, settings $settings)
    {
        //uploadImage//
        $ImageFileName=null;
        if (!is_null($request->image)) {
            $ImageUploader = new ImageUploader();
            $ImageFileName = $ImageUploader->store($request->image , env('logo'));
            $settings->update([
                'logo' => $ImageFileName,
            ]);
        }
        //endOfUploadImage//

        $settings->update([
            'phone' => $request->phone,
            'whatsapp_number' => $request->whatsapp_number,
            'address' => $request->address,
            'email' => $request->email,
            'trans_code' => $request->trans_code,
            'telegram_id' => $request->telegram_id,
            'instagram_id' => $request->instagram_id,
            'exam_cost' => $request->exam_cost,

        ]);
        $message = '<div class="alert alert-success alert-dismissible fade show" role="alert"> تنظیمات مورد نظر ویرایش شد <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $message);
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
