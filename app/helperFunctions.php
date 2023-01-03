<?php
use Carbon\Carbon;
function generateExamDate($exam_date)
{

    $pattern = '/[-\s]/';
    $shamsiDateSplit = preg_split($pattern , $exam_date);
    $miladi_date_array = Verta()->getGregorian($shamsiDateSplit[0] , $shamsiDateSplit[1] , $shamsiDateSplit[2] );
    $miladi_exam_date = implode('-' , $miladi_date_array).' '.$shamsiDateSplit[3];
    return $miladi_exam_date;

}

function generateImagesFileName($image)
{

    $year = Carbon::now()->year;
    $month = Carbon::now()->month;
    $day =Carbon::now()->day;
    $hour =Carbon::now()->hour;
    $minute =Carbon::now()->minute;
    $second =Carbon::now()->second;
    $miliSecond =Carbon::now()->millisecond;
    $ImagefileName = $year.'-'.$month.'-'.$day.'-'.$hour.'-'.$minute.'-'.$second.'-'.$miliSecond.'-'.$image;

    return $ImagefileName;

}
