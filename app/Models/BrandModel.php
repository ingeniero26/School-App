<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class BrandModel extends Model
{
    use HasFactory;

    protected $table = 'brands';

    public static function getBrands()
    {
        $query = self::select('brands.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'brands.created_by')
            ->where('brands.is_delete', '=', 0);

        if (!empty(Request::get('name'))) {
            $query->where('brands.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('date'))) {
            $query->whereDate('brands.created_at', '=', Request::get('date'));
        }

        return $query->orderBy('brands.id', 'desc')
            ->paginate(20);
    }

    public static function getSingle($id)
    {
        return self::find($id);
    }
}
