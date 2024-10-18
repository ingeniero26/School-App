<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTagsModel extends Model
{
    use HasFactory;

    protected $table = 'blog_tags';



    public function blog()
    {
        return $this->belongsTo(BlogModel::class, 'blog_id');
    }

    public static function getTagsByBlogId($blogId)
    {
        return self::where('blog_id', $blogId)->pluck('tag')->toArray();
    }

   public static function InsertDeletTag($blod_id, $tags) {
    BlogTagsModel::where('blog_id','=',$blod_id)->delete();
    if (!empty($tags)) {
        $tagArray = explode(',', $tags);
        foreach ($tagArray as $tag) {
            $tagModel = new BlogTagsModel();
            $tagModel->blog_id = $blod_id;
            $tagModel->name = trim($tag);
            $tagModel->save();
        }
    }
   }

    public static function removeTags($blogId)
    {
        self::where('blog_id', $blogId)->delete();
    }
}
