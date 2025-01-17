<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Conner\Likeable\Likeable;

class Discussion extends Model
{
    use HasFactory, SoftDeletes, Likeable;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'content_preview',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
