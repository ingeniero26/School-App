<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductImageModel;
use App\Models\ColorModel;
use App\Models\MeasuresModel;
use App\Models\SubCategoryModel;
use App\Models\ProductColorModel;
use App\Models\ProductSizeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ProductModel::getProducts();
        $data['header_title'] = "Lista de Productos";
        return view('admin.product.list', $data);
    }

    public function add()
    {
        $data['getBrands'] = BrandModel::where('is_delete', '=', 0)->get();
        $data['getCategories'] = CategoryModel::where('is_delete', '=', 0)->get();
        $data['getSubCategories'] = SubCategoryModel::where('is_delete', '=', 0)->get();
        $data['header_title'] = "Agregar Producto";
        return view('admin.product.add', $data);
    }

    public function insert(Request $request)
    {

        $title = trim($request->title);
        $product = new ProductModel;
        $product->title = $title;
        $product->sku = trim($request->sku);


        $product->created_by = Auth::user()->id;
        $product->save();

        $slug = Str::slug($title, '-');
        $checkSlug = ProductModel::checkSlug($slug);

        if (empty($checkSlug)) {
            $product->slug = $slug;
            $product->save();
        } else {
            $new_slug = $slug . '-' . $product->id;
            $product->slug = $new_slug;
            $product->save();
        }


        return redirect('admin/product/edit/' . $product->id);
    }

    public function edit($id)
    {
        $data['getRecord'] = ProductModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['getBrands'] = BrandModel::where('is_delete', '=', 0)->get();
            $data['getColors'] = ColorModel::where('is_delete', '=', 0)->get();
            $data['getMeasures'] = MeasuresModel::where('is_delete', '=', 0)->get();
            $data['getCategories'] = CategoryModel::where('is_delete', '=', 0)->get();
            $get_sub_category = SubCategoryModel::where('category_id', '=', $data['getRecord']->category_id)->get();
            $data['getSubCategories'] = $get_sub_category;

            $data['header_title'] = "Editar Producto";
            return view('admin.product.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        //dd($request->all());

        $product = ProductModel::getSingle($id);

        if (!empty($product)) {

            $product->title = trim($request->title);
            $product->sku = trim($request->sku);
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;
            $product->measure_id = $request->measure_id;
            $product->old_price = $request->old_price;
            $product->price = $request->price;
            $product->short_description = $request->short_description;
            $product->description = trim($request->description);
            $product->additional_information = $request->additional_information;
            $product->shipping_returns = $request->shipping_returns;
            $product->status = $request->status;
            $product->save();

            ProductColorModel::DeleteRecord($product->id);
            if (!empty($request->color_id)) {
                foreach ($request->color_id as $color_id) {
                    $productColor = new ProductColorModel;
                    $productColor->product_id = $product->id;
                    $productColor->color_id = $color_id;
                    $productColor->save();
                }
            }

            ProductSizeModel::DeleteRecordSize($product->id);
            if (!empty($request->size)) {
                foreach ($request->size as $size) {

                    if (!empty($size['name'])) {
                        $productSize = new ProductSizeModel;
                        $productSize->product_id = $product->id;
                        $productSize->name = $size['name'];
                        $productSize->price = !empty($size['price']) ? $size['price'] : 0;
                        $productSize->save();
                    }
                }
            }
            if (!empty($request->file('image'))) {
                foreach ($request->file('image') as $value) {
                    if ($value->isValid()) {
                        $ext = $value->getClientOriginalExtension();
                        $randomName = date('Ymdhis') . Str::random(20);
                        $fileName = strtolower($randomName) . '.' . $ext;
                        $value->move('upload/product/', $fileName);

                        $productImage = new ProductImageModel;
                        $productImage->product_id = $product->id;
                        $productImage->image_name = $fileName;
                        $productImage->image_extension = $ext;
                       // $productImage->order_by = 0;
                        $productImage->save();
                    }
                }
            }
            return redirect()->back()->with('success', "Producto actualizado exitosamente");
        } else {
            return abort(404);
        }
    }

    public function delete($id)
    {
        $product = ProductModel::getSingle($id);
        $product->is_delete = 1;
        $product->save();

        return redirect()->back()->with('success', "Producto eliminado exitosamente");
    }

    public function view($id)
    {
        $data['getRecord'] = ProductModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Ver Producto";
            return view('admin.product.view', $data);
        } else {
            abort(404);
        }
    }

    public function delete_image($id)
    {
        $productImage = ProductImageModel::getSingle($id);
        if (!empty($productImage->getImagenLogo())) {
            unlink('upload/product/' . $productImage->image_name);
        }
        $productImage->delete();
        return redirect()->back()->with('success', "Imagen eliminada exitosamente");
    }

    public function update_photo_order(Request $request)
    {
        if (!empty($request->photo_id)) {
           $i = 1;
            foreach ($request->photo_id as $photo_id) {
                $productImage = ProductImageModel::getSingle($photo_id);
                $productImage->order_by = $i;
                $productImage->save();
                $i++;
            }
        }
        $json['success'] = true;
        echo json_encode($json);

    }
}
