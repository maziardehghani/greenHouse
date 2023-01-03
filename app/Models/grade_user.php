<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade_user extends Model
{
    use HasFactory;
    protected $table = 'grade_user';
    protected $guarded = array();

    public function getGenderAttribute($gender)
    {
        return $gender ? 'زن' : 'مرد' ;
    }
    public function getMilitaryAttribute($military)
    {
        switch ($military) {
            case 1 :
                return 'معاف' ;
                break;
            case 2 :
                return 'مشمول' ;
                break;

        }
    }
    public function getMarriageAttribute($Marriage)
    {
        switch ($Marriage) {
            case 1 :
                return 'مجرد' ;
                break;
            case 2 :
                return 'متاهل' ;
                break;
            case 3 :
                return 'متارکه' ;
                break;
            case 4 :
                return 'فوت همسر' ;
                break;

        }
    }
    public function getEducationAttribute($education)
    {
        switch ($education) {
            case 1 :
                return 'زیر دیپلم' ;
                break;
            case 2 :
                return 'متوسطه' ;
                break;
            case 3 :
                return 'دیپلم' ;
                break;
            case 4 :
                return 'پیش دانشگاهی' ;
                break;
            case 5 :
                return 'فوق دیپلم' ;
                break;
            case 6 :
                return 'لیسانس' ;
                break;
            case 7 :
                return 'فوق لیسانس' ;
                break;
            case 8 :
                return 'دکتری' ;
                break;
            case 9 :
                return 'دکتری تخصصی /فوق دکتری' ;
                break;
        }
    }
    public function getIssarAttribute($issar)
    {
        switch ($issar) {
            case 0 :
                return 'هیچکدام' ;
                break;
            case 1 :
                return 'جانباز' ;
                break;
            case 2 :
                return 'آزاده' ;
                break;
            case 3 :
                return 'خانواده ایثار' ;
                break;

        }
    }



}
