<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\BlogTagsModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function list(Request $reques)
    {
        $data['getRecord'] = BlogModel::getRecord();
        $data['header_title'] = "Listado";
        return view('admin.blog.list', $data);
    }
    public function add(Request $request)
    {
        $data['getRecord'] = CategoryModel::getCategory();
        $data['header_title'] = "Add Blog";
        return view('admin.blog.add', $data);
    }

    public function insert(Request $request)
    {


        $blog = new BlogModel();
        $blog->title = trim($request->title);
        $blog->category_id = trim($request->category_id);
        $blog->description = trim($request->description);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);
        $blog->created_by = Auth::user()->id;
        $blog->is_publish = trim($request->is_publish);
        $blog->status = trim($request->status);
        $blog->save();

        $slug = Str::slug($request->title);
        $checkSlug = BlogModel::where('slug', '=', $slug)->first();
        if (!empty($checkSlug)) {
            $dbslug = $slug.'-'.$blog->id;
        }
        else
        {
            $dbslug= $slug;
        }
        $blog->slug = $dbslug;

        if(!empty($request->file('image_file')))
        {

            $ext=$request->file('image_file')->getClientOriginalExtension();
            $file =$request->file('image_file');
           // $randomStr=date('Ymdhis').Str::random(20);
            $filename = $dbslug.'.'.$ext;
            $file->move('upload/blog/',$filename);
            $blog->image_file=$filename;
        }
        $blog->save();
        BlogTagsModel::InsertDeletTag($blog->id,$request->tags);
        return redirect('admin/blog/list')->with('success','Blog agregado al sistema');
    }
    public function edit(Request $request, $id)
    {
        $blog = BlogModel::find($id);
        if (!$blog) {
            abort(404);
        }
        $data['getRecord'] = CategoryModel::getCategory();
        $data['header_title'] = "Edit Blog";
        $data['blog'] = $blog;
        return view('admin.blog.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $blog = BlogModel::getSingle($id);
        if (!$blog) {
            abort(404);
        }
        $blog->title = trim($request->title);
        $blog->category_id = trim($request->category_id);
        $blog->description = trim($request->description);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);
        $blog->is_publish = trim($request->is_publish);
        $blog->status = trim($request->status);
        $blog->save();

        $slug = Str::slug($request->title);
        $checkSlug = BlogModel::where('slug', '=', $slug)->first();
        if (!empty($checkSlug) && $checkSlug->id != $blog->id) {
            $dbslug = $slug.'-'.$blog->id;
        }
        else
        {
            $dbslug= $slug;
        }
        $blog->slug = $dbslug;

        if(!empty($request->file('image_file')))
        {

            $ext=$request->file('image_file')->getClientOriginalExtension();
            $file =$request->file('image_file');
            $filename = $dbslug.'.'.$ext;
            $file->move('upload/blog/',$filename);
            $blog->image_file=$filename;
        }
        $blog->save();
        BlogTagsModel::InsertDeletTag($blog->id,$request->tags);

        return redirect('admin/blog/list')->with('success','Blog actualizado con éxito');
    }
    public function delete($id)
    {
        $blog = BlogModel::getSingle($id);
        $blog->is_delete = 1;
        $blog->save();

        return redirect('admin/blog/list')->with('success', 'Blog Eliminada con exito');
    }
public function view($id)
{
    $data['blog'] = BlogModel::getSingle($id);
    if (!$data['blog']) {
        abort(404);
    }
    $data['header_title'] = "View Blog";
    return view('admin.blog.view', $data);
}

}
