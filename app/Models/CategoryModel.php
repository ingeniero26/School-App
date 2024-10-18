<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';
    static public function getCategory()
    {
        $return = CategoryModel::select('categories.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'categories.created_by');
            if (!empty(Request::get('name'))) {
                $return = $return->where('categories.name', 'like',
                    '%' . Request::get('name') . '%');
            }
            if (!empty(Request::get('date'))) {
                $return = $return->whereDate('categories.created_at', '=',
                    Request::get('date'));
            }
            $return = $return->where('categories.is_delete', '=', 0)
            ->orderBy('categories.id', 'desc')
            ->paginate(20);
            return $return;
    }
    static public function getCategoryRecord()
    {
        return  self::select('categories.*', )

            ->where('categories.status', '=', 0)
            ->where('categories.is_delete', '=', 0)
            ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    protected $fillable = [
        'name',
        'slug',
        'status',
        'created_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function totalBlog()
    {
        return $this->hasMany(BlogModel::class, 'category_id')->where('is_publish', 1)->where('status', 0)->count();
    }

static public function getCategoryMenu()
{
    return self::select('categories.*')
        ->where('categories.status', '=', 0)
        ->where('categories.is_menu', '=', 1)
        ->where('categories.is_delete', '=', 0)
        ->orderBy('categories.name', 'asc')
        ->get();
}
static public function getSlug($slug)
{
    return self::select('categories.*')
         ->where('slug', $slug)
        ->where('status', 0)
        ->where('is_delete', 0)
        ->first();
}

}
