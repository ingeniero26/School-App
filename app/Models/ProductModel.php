<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';

    public static function getProducts()
    {
        $query = self::select('products.*', 'users.name as created_by_name',
         'brands.name as brand_name','measures.name as measure_name',
          'categories.name as category_name',
          'sub_categories.name as sub_category_name')
            ->join('users', 'users.id', 'products.created_by')
            ->leftJoin('brands', 'brands.id', 'products.brand_id')
            ->leftJoin('measures', 'measures.id', 'products.measure_id')
            ->leftJoin('categories', 'categories.id', 'products.category_id')
            ->leftJoin('sub_categories', 'sub_categories.id', 'products.sub_category_id')
            ->where('products.is_delete', '=', 0);

        if (!empty(Request::get('name'))) {
            $query->where('products.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('sku'))) {
            $query->where('products.sku', 'like', '%' . Request::get('sku') . '%');
        }

        if (!empty(Request::get('brand_id'))) {
            $query->where('products.brand_id', '=', Request::get('brand_id'));
        }

        if (!empty(Request::get('category_id'))) {
            $query->where('products.category_id', '=', Request::get('category_id'));
        }

        if (!empty(Request::get('sub_category_id'))) {
            $query->where('products.sub_category_id', '=', Request::get('sub_category_id'));
        }

        if (!empty(Request::get('date'))) {
            $query->whereDate('products.created_at', '=', Request::get('date'));
        }

        return $query->orderBy('products.id', 'desc')
            ->paginate(20);
    }

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public function brand()
    {
        return $this->belongsTo(BrandModel::class, 'brand_id');
    }
    public function measures()
    {
        return $this->belongsTo(MeasuresModel::class, 'measure_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategoryModel::class, 'sub_category_id');
    }

    public static function checkSlug($slug)
    {
        return self::where('slug','=',$slug)->count();
    }

    public function getColor()
    {
        return $this->hasMany(ProductColorModel::class, 'product_id');
    }
    public function getSize()
    {
        return $this->hasMany(ProductSizeModel::class, 'product_id');
    }

    public function getImage()
    {
        return $this->hasMany(ProductImageModel::class, 'product_id')->orderBy('order_by','asc');
    }
}
