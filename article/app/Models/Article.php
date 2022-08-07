<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'image', 'user_id', 'category_id'
    ];

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
