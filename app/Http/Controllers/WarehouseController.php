<?php

namespace App\Http\Controllers;

use App\Models\WarehouseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    public function list()
    {
        $data['getRecord'] = WarehouseModel::getRecord();
        $data['header_title'] = "Warehouse List";
        return view('admin.warehouse.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Warehouse";
        return view('admin.warehouse.add', $data);
    }

    public function insert(Request $request)
    {
        $warehouse = new WarehouseModel;
        $warehouse->name = trim($request->name);
        $warehouse->address = trim($request->address);
        $warehouse->status = $request->status;
        $warehouse->created_by = Auth::user()->id;
        $warehouse->save();

        return redirect('admin/warehouse/list')->with('success', "Warehouse successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = WarehouseModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Warehouse";
            return view('admin.warehouse.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $warehouse = WarehouseModel::getSingle($id);
        $warehouse->name = trim($request->name);
        $warehouse->address = trim($request->address);
        $warehouse->status = $request->status;
        $warehouse->save();

        return redirect('admin/warehouse/list')->with('success', "Warehouse successfully updated");
    }

    public function delete($id)
    {
        $warehouse = WarehouseModel::getSingle($id);
        $warehouse->is_delete = 1;
        $warehouse->save();

        return redirect()->back()->with('success', "Warehouse successfully deleted");
    }

    public function view($id)
    {
        $data['getRecord'] = WarehouseModel::getSingle($id);
        $data['header_title'] = "Warehouse View";
        return view('admin.warehouse.view', $data);
    }

}
