<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactUs;

class contactUsController extends Controller
{
    public function index()
    {
        return view('home.contactUs.index');
    }
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'text'=>'required',
        ]);

        try {
            if (auth()->check())
            {
                contactUs::create([
                    'subject' => 'ارسالی',
                    'nameAndFamily'=> $request->name,
                    'phone'=>$request->phone,
                    'message'=>$request->text,
                ]);
                $message = '<div class="alert alert-success alert-dismissible fade show mb-5 rounded" role="alert"><div> پیام شما ارسال شد</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return redirect()->back()->with('msg' , $message);
            }else
            {
                $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div>ابتدا وارد حساب کاربری خود شوید  </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return redirect()->back()->with('msg' , $message);
            }

        }catch (\Exception $ex)
        {
            $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div>خطا در برقراری ارطبات  </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return redirect()->back()->with('msg' , $message);
        }


    }
}
