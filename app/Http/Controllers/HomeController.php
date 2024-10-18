<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\BlogCommentModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['getRecentPosts'] = BlogModel::getRecentPost();
        // $data['getCategories'] = CategoryModel::getCategory(); // Assuming you want to fetch categories as well
        $data['meta_title'] = 'Blog';
        return view('home.index', $data);
    }
    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function course()
    {
        $data['meta_title'] = 'Programas';
        return view('home.course', $data);
    }
    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $data['meta_title'] = 'Nosotros';
        return view('home.about',$data);
    }
    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        $data['meta_title'] = 'Contacto';
        return view('home.contact',$data);
    }

    /**
     * Display the teacher page.
     *
     * @return \Illuminate\View\View
     */
    public function teacher()
    {
        $data['meta_title'] = 'Blog-Docentes';
        return view('home.teacher',$data);
    }

    /**
     * Display the blog page.
     *
     * @return \Illuminate\View\View
     */
    public function blog()
    {
        $data['getRecordFront'] = BlogModel::getRecordFront();
        return view('home.blog', $data);
    }

    /**
     * Display a single blog post.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function single($slug)
    {
        $getCategory = CategoryModel::getSlug($slug);

        if (!empty($getCategory)) {
            $data['meta_title']=$getCategory->meta_title;
            $data['meta_description']=$getCategory->meta_description;
            $data['meta_keywords']=$getCategory->meta_keywords;
            $data['header_title']=$getCategory->title;
            $data['getRecordFront'] = BlogModel::getRecordFrontCategory($getCategory->id);
            return view('home.blog', $data);
        } else {
            $getRecord = BlogModel::getRecordSlug($slug);
            if (!empty($getRecord)) {
                $data['getCategory'] = CategoryModel::getCategoryRecord();
                $data['getRecentPosts'] = BlogModel::getRecentPost();

                $data['getRecord'] = $getRecord;
                $data['meta_title']=$getRecord->title;
                $data['meta_description']=$getRecord->meta_description;
                $data['meta_keywords']=$getRecord->meta_keywords;
                return view('home.single', $data);
            } else {
                abort(404);
            }
        }
    }

    public function PostComment(Request $request)
    {
        $comment = new BlogCommentModel;
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;


        $comment->save();
        return redirect()->back()->with('success', 'Comentario creado');
    }
}
