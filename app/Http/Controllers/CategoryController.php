<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = CategoryModel::getCategory();
        $data['header_title'] = "Category List";
        return view('admin.category.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Category";
        return view('admin.category.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'status' => 'required'
        ]);

        $category = new CategoryModel;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->title = $request->title;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->is_menu = $request->is_menu;
        $category->status = $request->status;
        $category->created_by = auth()->user()->id;
        $category->save();

        return redirect('admin/category/list')->with('success', 'Categoria creada con exito');
    }

    public function edit($id)
    {
        $data['getRecord'] = CategoryModel::getSingle($id);
        if (!$data['getRecord']) {
            abort(404);
        }
        $data['header_title'] = "Edit Category";
        return view('admin.category.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
            'status' => 'required'
        ]);

        $category = CategoryModel::getSingle($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->title = $request->title;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->status = $request->status;
        $category->is_menu = $request->is_menu;
        $category->save();

        return redirect('admin/category/list')->with('success', 'Categoria editado con exito');
    }

    public function delete($id)
    {
        $category = CategoryModel::getSingle($id);
        $category->is_delete = 1;
        $category->save();

        return redirect('admin/category/list')->with('success', 'Categoria Eliminada con exito');
    }
}
