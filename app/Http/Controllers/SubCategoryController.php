<?php

namespace App\Http\Controllers;


use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class SubCategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubCategoryModel::getSubCategories();
        $data['header_title'] = "Sub Category List";
        return view('admin.sub_category.list', $data);
    }

    public function add()
    {
        $data['getCategories'] = CategoryModel::getRecord();
        $data['header_title'] = "Add New Sub Category";
        return view('admin.sub_category.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories',
            'category_id' => 'required',
            'status' => 'required'
        ]);

        $subCategory = new SubCategoryModel;
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->meta_title = trim($request->meta_title);
        $subCategory->meta_description = trim($request->meta_description);
        $subCategory->meta_keywords = trim($request->meta_keywords);
        $subCategory->created_by = Auth::user()->id;
        $subCategory->status = $request->status;
        $subCategory->save();

        return redirect('admin/sub_category/list')->with('success', "Sub Category successfully added");
    }

    public function edit($id)
    {
        $data['getRecord'] = SubCategoryModel::getRecordByID($id);
        if(!$data['getRecord']){
            abort(404);
        }
        $data['getCategories'] = CategoryModel::getRecord();
        $data['header_title'] = "Edit Sub Category";
        return view('admin.sub_category.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories,name,'.$id,
            'category_id' => 'required',
            'status' => 'required'
        ]);

        $subCategory = SubCategoryModel::getRecordByID($id);
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->meta_title = trim($request->meta_title);
        $subCategory->meta_description = trim($request->meta_description);
        $subCategory->meta_keywords = trim($request->meta_keywords);
        $subCategory->status = $request->status;
        $subCategory->save();

        return redirect('admin/sub_category/list')->with('success', "Sub Category successfully updated");
    }

    public function delete($id)
    {
        $subCategory = SubCategoryModel::getRecordByID($id);
        $subCategory->delete();

        return redirect('admin/sub_category/list')->with('success', "Sub Category successfully deleted");
    }

    public function get_sub_category(Request $request)
    {
       $category_id = $request->id;
       $get_sub_category = SubCategoryModel::getRecordSubCategory($category_id);
       $html='';
       $html.='<option value="">Select Sub Category</option>';
       foreach($get_sub_category as $sub_category){
        $html.='<option value="'.$sub_category->id.'">'.$sub_category->name.'</option>';
       }
       return response()->json($html);

    }

}
