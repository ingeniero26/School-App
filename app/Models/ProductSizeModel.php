<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeModel extends Model
{
    use HasFactory;

    protected $table = 'product_sizes';

    public static function DeleteRecordSize($product_id)
    {
        return self::where('product_id', $product_id)->delete();
    }


    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    public static function getProductSizes($product_id)
    {
        return self::where('product_id', $product_id)->get();
    }

    public static function deleteProductSizes($product_id)
    {
        return self::where('product_id', $product_id)->delete();
    }
}
