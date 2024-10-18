<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ColorModel;


class ColorController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ColorModel::getRecord();
        $data['header_title'] = "Color List";
        return view('admin.color.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Color";
        return view('admin.color.add', $data);
    }

    public function insert(Request $request)
    {
        $color = new ColorModel;
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->created_by = Auth::user()->id;
        $color->save();

        return redirect('admin/color/list')->with('success', "Color successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = ColorModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Color";
            return view('admin.color.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $color = ColorModel::getSingle($id);
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->save();

        return redirect('admin/color/list')->with('success', "Color successfully updated");
    }

    public function delete($id)
    {
        $color = ColorModel::getSingle($id);
        $color->is_delete = 1;
        $color->save();

        return redirect()->back()->with('success', "Color successfully deleted");
    }

    public function view($id)
    {
        $data['getRecord'] = ColorModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "View Color";
            return view('admin.color.view', $data);
        }
        else
        {
            abort(404);
        }
    }
}
