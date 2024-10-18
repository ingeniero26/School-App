<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blog';

    static public function getRecord()
    {
        $return = BlogModel::select('blog.*', 'users.name as created_by_name', 'categories.name as category_name')
                    ->join('users', 'users.id', '=', 'blog.created_by')
                    ->join('categories', 'categories.id', '=', 'blog.category_id');

                    if (!empty(Request::get('title'))) {
                        $return = $return->where('blog.title', 'like',
                            '%' . Request::get('title') . '%');
                    }
                    if (!empty(Request::get('category'))) {
                        $return = $return->where('categories.name', 'like',
                            '%' . Request::get('category') . '%');
                    }
                    if (!empty(Request::get('username'))) {
                        $return = $return->where('users.name', 'like', '%' . Request::get('username') . '%');
                    }
                    if (!empty(Request::get('status'))) {
                        $return = $return->where('blog.status', '=', Request::get('status'));
                    }
                    if (!empty(Request::get('is_publish'))) {
                        $return = $return->where('blog.is_publish', '=', Request::get('is_publish'));
                    }
                    if (!empty(Request::get('date'))) {
                        $return = $return->whereDate('blog.created_at', '=', Request::get('date'));
                    }
                    $return = $return->where('blog.is_delete', '=', 0)
                    ->orderBy('blog.id', 'desc')
                    ->paginate(20);
                    return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
    public function getImage()
    {
        if (!empty($this->image_file) && file_exists('upload/blog/' . $this->image_file)) {
            return url('upload/blog/' . $this->image_file);
        } else
        {

            return "";
        }
    }

    public function getCategory()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function getCreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getTags()
    {
        return $this->hasMany(BlogTagsModel::class, 'blog_id');
    }
    static public function getRecordSlug($slug)
    {
        return self::select('blog.*', 'users.name as created_by_name', 'categories.name as category_name')
                    ->join('users', 'users.id', '=', 'blog.created_by')
                    ->join('categories', 'categories.id', '=', 'blog.category_id')
                    ->where('blog.slug', '=', $slug)
                    ->where('blog.is_publish', '=', 1)
                    ->where('blog.status', '=', 0)
                    ->first();
    }

    static public function getRecordFront()
    {
        $return = self::select('blog.*', 'users.name as created_by_name',
         'categories.name as category_name','categories.slug as category_slug')
                    ->join('users', 'users.id', '=', 'blog.created_by')
                    ->join('categories', 'categories.id', '=', 'blog.category_id');

                   if(!empty(Request::Get('q')))
                   {
                   $return = $return->where(function($query) {
                       $query->where('blog.title', 'LIKE', '%' . Request::get('q') . '%')
                             ->orWhere('blog.description', 'LIKE', '%' . Request::get('q') . '%')
                             ->orWhere('categories.name', 'LIKE', '%' . Request::get('q') . '%');
                   });

                   }
                   $return =$return  ->where('blog.is_publish', '=', 1)
                    ->where('blog.status', '=', 0)
                    ->orderBy('blog.id', 'desc')
                    ->paginate(5);

        return $return;
    }
    static public function getRecordFrontCategory($category_id)
    {
        $return = self::select('blog.*', 'users.name as created_by_name',
         'categories.name as category_name','categories.slug as category_slug')
                    ->join('users', 'users.id', '=', 'blog.created_by')
                    ->join('categories', 'categories.id', '=', 'blog.category_id')
                    ->where('blog.category_id', '=', $category_id)
                    ->where('blog.is_publish', '=', 1)
                    ->where('blog.status', '=', 0)
                    ->orderBy('blog.id', 'desc')
                    ->paginate(5);

        return $return;
    }


    static public function getRecentPost()
    {
        $return = self::select('blog.*', 'users.name as created_by_name',
         'categories.name as category_name','categories.slug as category_slug')
                    ->join('users', 'users.id', '=', 'blog.created_by')
                    ->join('categories', 'categories.id', '=', 'blog.category_id')
                    ->where('blog.is_publish', '=', 1)
                    ->where('blog.status', '=', 0)
                    ->orderBy('blog.id', 'desc')
                    ->limit(3)
                    ->get();

        return $return;
    }
    static public function getRelatedPost($category_id, $blog_id)
    {
        return self::select('blog.*', 'users.name as created_by_name',
         'categories.name as category_name','categories.slug as category_slug')
                    ->join('users', 'users.id', '=', 'blog.created_by')
                    ->join('categories', 'categories.id', '=', 'blog.category_id')
                    ->where('blog.category_id', '=', $category_id)
                    ->where('blog.id', '!=', $blog_id)
                    ->where('blog.is_publish', '=', 1)
                    ->where('blog.status', '=', 0)
                    ->orderBy('blog.id', 'desc')
                    ->limit(4)
                    ->get();
    }
}
