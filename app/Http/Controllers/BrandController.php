<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function list()
    {
        $data['getRecord'] = BrandModel::getBrands();
        $data['header_title'] = "Brand List";
        return view('admin.brand.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Brand";
        return view('admin.brand.add', $data);
    }

    public function insert(Request $request)
    {
        $brand = new BrandModel;
        $brand->name = trim($request->name);
        $brand->slug = Str::slug($request->name);
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);
        $brand->status = $request->status;
        $brand->created_by = Auth::user()->id;
        $brand->save();

        return redirect('admin/brand/list')->with('success', "Brand successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = BrandModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Brand";
            return view('admin.brand.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $brand = BrandModel::getSingle($id);
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);

        $brand->status = $request->status;
        $brand->save();

        return redirect('admin/brand/list')->with('success', "Brand successfully updated");
    }

    public function delete($id)
    {
        $brand = BrandModel::getSingle($id);
        $brand->is_delete = 1;
        $brand->save();

        return redirect()->back()->with('success', "Brand successfully deleted");
    }

    public function view($id)
    {
        $data['getRecord'] = BrandModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "View Brand";
            return view('admin.brand.view', $data);
        }
        else
        {
            abort(404);
        }
    }
}
