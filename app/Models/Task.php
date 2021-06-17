<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
    
        // 保存時user_idをログインユーザーに設定
        self::saving(function($post) {
            $post->user_id = \Auth::id();
        });
    }

    protected $fillable = [
        'title',
        'content',
        'person_in_charge',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
