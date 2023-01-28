<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    protected static function booted()
    {
        static::saving(function ($obj) {
            $obj->slug = str()->slug($obj->name);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function parent()
    {
        return Task::where('parent_id', 0)
            ->orderBy('id', 'desc');
    }

    public function child()
    {
        return Task::whereNotIn('parent_id', [0])
            ->orderBy('id', 'desc');
    }

    public function getName()
    {
        return $this->name;
    }
}
