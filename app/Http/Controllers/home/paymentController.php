<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\grade_user;

use Illuminate\Http\Request;
use Mockery\Exception;

class paymentController extends Controller
{

    public function payment()
    {
        try {
            $settings = settings::find(1);
            $exam_cost = $settings->exam_cost;
            $api = 'test';
            $amount = $exam_cost;
            $redirect = route('home.paymentVerify');
            $result = $this->send($api, $amount, $redirect);
            $result = json_decode($result);

            if($result->status) {
                $this->permission();
                return redirect()->to("https://pay.ir/pg/$result->token");
            } else {
                echo $result->errorMessage;
            }
        }catch (\Exception $ex)
        {
            $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div>پرداخت شما موفقیت آمیز نبود </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return redirect()->back()->with('msg' , $message);


        }

    }

    public function paymentVerify(Request $request)
    {
        $api = 'test';
        $token = $request->token;
        $result = json_decode($this->verify($api,$token));
        if(isset($result->status)){
            if($result->status == 1){

                return redirect()->route('home.examInformation');
            } else {
                $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div>پرداخت شما موفقیت آمیز نبود </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return redirect()->route('home.index')->with('msg' , $message);
            }
        } else {
            if($_GET['status'] == 0){
                $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div>پرداخت شما موفقیت آمیز نبود </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return redirect()->back()->with('msg' , $message);

            }
        }

    }

    public function send($api, $amount, $redirect, $mobile = null, $factorNumber = null, $description = null) {

        return $this->curl_post('https://pay.ir/pg/send', [
            'api'          => $api,
            'amount'       => $amount,
            'redirect'     => $redirect,
            'mobile'       => $mobile,
            'factorNumber' => $factorNumber,
            'description'  => $description,
        ]);
    }

    public function verify($api, $token) {
        return $this->curl_post('https://pay.ir/pg/verify', [
            'api' 	=> $api,
            'token' => $token,
        ]);
    }

    public function curl_post($url, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

    public function permission()
    {

        try {
            DB::beginTransaction();
            $user_id = auth()->id();
            $user = grade_user::where('user_id' , $user_id)->first();
            $user->update([
                'is_pay' => 1,
            ]);
            DB::commit();
        }catch (Exception $ex)
        {
            DB::rollBack();
        }

    }



}
