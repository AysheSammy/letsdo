<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::saving(function ($obj){
            $obj->slug = str()->slug($obj->name_tm) . str(10);
        });
    }

    public function getName()
    {
        if (app()->getLocale() == 'en')
        {
            return $this->name_en ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }
}
