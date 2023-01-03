<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\ImageUploader;

class bannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = banners::latest()->paginate(5);
        return view('admin.banners.index' ,compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
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
           'link' => 'required',
           'is_active' => 'required',
           'image' => 'required'
        ]);

        try {
            DB::beginTransaction();
            //uploadImage//
            $ImageFileName=null;
            if (isset($request->image)) {
                $ImageUploader = new ImageUploader();
                $ImageFileName = $ImageUploader->store($request->image , env('Image_banners'));

            }
            //endOfUploadImage//


            banners::create([
                'link' => $request->link,
                'is_active' => $request->is_active,
                'image' => $ImageFileName
            ]);
            DB::commit();
        }catch (\Exception $ex)
        {
            DB::rollBack();
            $massage = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="zmdi zmdi-info"></i> بنر مورد نظر ازوده نشد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg', $massage);
        }
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert"> بنر مورد نظر با موفقیت افزوده شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg', $massage);

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
    public function edit(banners $banner)
    {
        return view('admin.banners.edit' ,compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, banners $banner)
    {
        $request->validate([
            'link' => 'required',
            'is_active' => 'required',
            'image' => 'nullable'
        ]);

        try {
            DB::beginTransaction();
            //uploadImage//
            $ImageFileName=null;
            if (isset($request->image)) {
                $ImageUploader = new ImageUploader();
                $ImageFileName = $ImageUploader->store($request->image , env('Image_banners'));
                $banner->update([
                    'image' => $ImageFileName,
                ]);
            }
            //endOfUploadImage//


            $banner->update([
                'link' => $request->link,
                'is_active' => $request->is_active,
            ]);
            DB::commit();
        }catch (\Exception $ex)
        {
            DB::rollBack();
            $massage = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="zmdi zmdi-info"></i> بنر مورد نظر افزوده نشد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg', $massage);
        }
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert"> بنر مورد نظر با موفقیت افزوده شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg', $massage);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(banners $banner)
    {
        $banner->delete();

        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert">  بنر مورد نظر با موفقیت حذف شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);
    }
}
