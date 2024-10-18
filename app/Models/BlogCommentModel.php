<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class BlogCommentModel extends Model
{
    use HasFactory;

    protected $table = 'blog_comment';
}
