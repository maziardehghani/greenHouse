<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\home\examInfoGiver;
use App\Http\Controllers\Controller;
use App\Models\employment_items;
use App\Models\exam;
use App\Models\grade_user;
use App\Models\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

use Carbon\Carbon;

class homeExamController extends Controller
{
    public $finish_time;
    public $employment_id;
    public $user;


    public function checkout()
    {
        try {
            if (auth()->check()) {
                $this->user = grade_user::where('user_id', auth()->id())->first();
                if (!is_null($this->user)) {
                    $is_test = $this->user->is_test;
                    $is_pay = $this->user->is_pay;
                    if ($is_test == 0) {
                        if ($is_pay == 1) {

                            $this->employment_id = $this->user->employment_item_id;
                            $employment_item = employment_items::find($this->employment_id);
                            if (verta($employment_item->exam_date)->timestamp < verta()->timestamp && verta()->timestamp < verta($employment_item->exam_date)->timestamp + ($employment_item->exam_time * 60)) {
                                $employment_id = $this->user->employment_item_id;
                                $employment_item = employment_items::find($employment_id);
                                $finish_time_jalali = verta($employment_item->exam_date)->timestamp + ($employment_item->exam_time * 60);
                                $this->finish_time = date('Y/m/d H:i:s', $finish_time_jalali);
                                return $this->index();

                            }
                            else
                            {
                                $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div>زمان آزمون به پایان رسیده </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                return redirect()->back()->with('msg' , $message);
                            }
                        }
                        else
                        {

                            $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div> شما هزینه آزمون را پرداخت نکرده اید </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            return redirect()->back()->with('msg' , $message);
                        }


                    }else
                    {
                        $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div> شما یک بار این آزمون را داده اید </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        return redirect()->back()->with('msg' , $message);
                    }

                }else
                {
                    $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div> شما در این آزمون ثبت نام نکرده اید </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    return redirect()->back()->with('msg' , $message);
                }

            }else
            {
                $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div> شما باید ابتدا به حساب خود وارد شوید </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return redirect()->back()->with('msg' , $message);
            }
        }catch (\Exception $ex)
        {
            return redirect()->back();
        }


    }

    public function index()
    {
        try {
            $exams = exam::where('employment_item_id' , $this->employment_id)->get();

            $opt = [];
            foreach ($exams as $exam) {
                $options = [$exam->Option1 , $exam->Option2 , $exam->Option3 ,$exam->true_Option ];
                shuffle($options);
                array_push($opt , $options );
            }
            $exam = $exams->first();


            //////////findExamSlug/////////
            $class = new examInfoGiver;
            $examSlug = $class->getEmpSlug($exam->employment_item_id);
            //////////findExamSlug/////////


            //////////findExamDate/////////
            $examDate = $class->getExamDate($exam->employment_item_id);
            //////////findExamDate/////////

            $finish_time = $this->finish_time;
            $user = $this->user;


            return view('home.exam.index' , compact('exams' , 'opt' , 'examSlug','examDate' ,'user' , 'finish_time'));

        }catch (\Exception $ex)
        {
            return redirect()->back();
        }

    }

    public function sendQuestions(Request $request)
    {
        try {
            if (Verta()->timestamp < Verta($request->finish_time)->timestamp)
            {
                $user_id = $request->user_id;
                $user = grade_user::find($user_id);
                $form= $request->except('user_id' , '_token');
                $examForm = serialize($form);
                $user->update([
                    'exam_form' => $examForm,
                    'is_test' => 1,
                ]);
                return redirect()->route('success');
            }else
            {
                return redirect()->route('timeout');
            }

        }catch (\Exception $ex)
        {
            return redirect()->route('unsuccess');
        }

    }

}
