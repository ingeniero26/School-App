<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    public function getImagenLogo()
    {
        if(!empty($this->image_name) && file_exists('upload/product/'.$this->image_name)){
            return url('upload/product/'.$this->image_name);
        }else{
            return url('upload/no-image.jpg');
        }
    }


    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    public static function getProductImages($product_id)
    {
        return self::where('product_id', $product_id)
                   ->orderBy('order_by', 'asc')
                   ->get();
    }

    public static function deleteProductImages($product_id)
    {
        return self::where('product_id', $product_id)->delete();
    }

    public static function updateImageOrder($image_id, $new_order)
    {
        return self::where('id', $image_id)->update(['order_by' => $new_order]);
    }

    public static function getSingle($id)
    {
        return self::where('id', $id)->first();
    }
}
