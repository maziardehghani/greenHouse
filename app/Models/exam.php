<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class exam extends Model
{
    use HasFactory;
    protected $table = 'exam';
    protected $guarded = array();

    public function parent()
    {
        return $this->belongsTo(employment_items::class , 'employment_item_id');
    }
}
