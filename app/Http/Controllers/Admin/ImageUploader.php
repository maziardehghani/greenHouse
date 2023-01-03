<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\employment_items;
use Illuminate\Http\Request;


class ImageUploader extends Controller
{
    function store($image=null , $path=null)
    {

        //generateImageFileName// 
        $imageName = $image->getClientOriginalName();
        $fileName = generateImagesFileName($imageName);
        //endOfGenerateImageFileName//
        $image->move(public_path($path), $fileName);
        return $fileName;
    }

    function getExamDate($employment_item_id)
    {

        $employment_item = employment_items::find($employment_item_id);
        $exam_date = $employment_item->exam_date;
        $exam_date = verta($exam_date);
        $exam_date = explode(' ' , $exam_date);
        $exam_date = $exam_date[0];

        return $exam_date;
    }
    function getEmpSlug($employment_item_id)
    {

        $employment_item = employment_items::find($employment_item_id);
        $employment_item_slug = $employment_item->slug;

        return $employment_item_slug;
    }
}
