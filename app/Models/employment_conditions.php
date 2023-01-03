<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class employment_conditions extends Model
{
    use HasFactory;
    protected $table = 'employment_conditions';
    protected $guarded = array();

    public function parent()
    {
        return $this->belongsTo(employment_items::class , 'employment_item_id');
    }

    public function getPartConditionAttribute($part_condition)
    {
        if ($part_condition==1)
        {
            return 'شرایط کلی';
        }else
        {
            return 'شرایط مورد نیاز';
        }

    }
}
