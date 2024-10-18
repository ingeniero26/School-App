<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class SubCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    public static function getSubCategories()
    {
        $return = SubCategoryModel::select('sub_categories.*','users.name as created_by_name',
         'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
            ->join('users', 'users.id', '=', 'sub_categories.created_by');
            if (!empty(Request::get('name'))) {
                $return = $return->where('sub_categories.name', 'like',
                    '%' . Request::get('name') . '%');
            }
            if (!empty(Request::get('category'))) {
                $return = $return->where('categories.name', 'like',
                    '%' . Request::get('category') . '%');
            }
            if (!empty(Request::get('date'))) {
                $return = $return->whereDate('sub_categories.created_at', '=',
                    Request::get('date'));
            }
            $return = $return->where('sub_categories.is_delete', '=', 0)
            ->orderBy('sub_categories.id', 'desc')
            ->paginate(20);
            return $return;
    }

    public static function getRecordSubCategory($category_id)
    {
        return self::where('category_id', '=', $category_id)
                   ->where('is_delete', '=', 0)
                   ->where('status', '=', 0)
                   ->orderBy('name', 'asc')
                   ->get();
    }


    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }



    public static function getRecordByID($id)
    {
        return self::find($id);
    }
}
