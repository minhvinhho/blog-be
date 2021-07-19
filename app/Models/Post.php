<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content', 'category_id', 'user_id', 'keyword_id', 'views'];
}
