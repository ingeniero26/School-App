<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeasuresModel;
use Auth;

class MeasuresController extends Controller
{
    public function list()
    {
        $data['getRecord'] = MeasuresModel::getRecord();
        $data['header_title'] = "Lista de Medidas";
        return view('admin.measures.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Agregar Nueva Medida";
        return view('admin.measures.add', $data);
    }

    public function insert(Request $request)
    {
        $measure = new MeasuresModel;
        $measure->name = trim($request->name);
        $measure->abbreviation = trim($request->abbreviation);
        $measure->status = $request->status;
        $measure->created_by = auth()->id();
        $measure->save();

        return redirect('admin/measures/list')->with('success', "Medida agregada exitosamente");
    }

    public function edit($id)
    {
        $data['getRecord'] = MeasuresModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Editar Medida";
            return view('admin.measures.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $measure = MeasuresModel::getSingle($id);
        $measure->name = trim($request->name);
        $measure->abbreviation = trim($request->abbreviation);
        $measure->status = $request->status;
        $measure->save();

        return redirect('admin/measures/list')->with('success', "Medida actualizada exitosamente");
    }

    public function delete($id)
    {
        $measure = MeasuresModel::getSingle($id);
        $measure->is_delete = 1;
        $measure->save();

        return redirect()->back()->with('success', "Medida eliminada exitosamente");
    }

    public function view($id)
    {
        $data['getRecord'] = MeasuresModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Ver Detalles de la Medida";
            return view('admin.measures.view', $data);
        } else {
            abort(404);
        }
    }
}
