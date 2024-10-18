<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CoordinatorController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getCoordinator();
        $data['header_title'] = 'Coordinadores';
        return view('admin.coordinator.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Agregar Coordinador';
        return view('admin.coordinator.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|max:250',
            'last_name' => 'required|max:250',
        ]);

        $coordinator = new User;
        $coordinator->name = trim($request->name);
        $coordinator->last_name = trim($request->last_name);
        $coordinator->document_type = trim($request->document_type);
        $coordinator->roll_number = trim($request->roll_number);
        $coordinator->gender = trim($request->gender);

        if(!empty($request->file('profile_pic')))
           {


               $ext=$request->file('profile_pic')->getClientOriginalExtension();
               $file =$request->file('profile_pic');
               $randomStr=date('Ymdhis').Str::random(20);
               $filename = strtolower($randomStr).'.'.$ext;
               $file->move('upload/profile/',$filename);
               $coordinator->profile_pic=$filename;
           }
       $coordinator->address = trim($request->address);
       $coordinator->mobile_number = trim($request->mobile_number);
       $coordinator->occupation = trim($request->occupation);
       $coordinator->eps = trim($request->eps);
       $coordinator->blood_group = trim($request->blood_group);
       $coordinator->status = trim($request->status);
        $coordinator->email = trim($request->email);
        $coordinator->password = Hash::make($request->password);
        $coordinator->user_type = 5; // Assuming 4 is the user_type for coordinators
        $coordinator->save();

        return redirect('admin/coordinator/list')->with('success', 'Coordinador agregado exitosamente');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = 'Editar Coordinador';
            return view('admin.coordinator.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'name' => 'required|max:250',
            'last_name' => 'required|max:250',
        ]);

        $coordinator = User::getSingle($id);
        $coordinator->name = trim($request->name);
        $coordinator->last_name = trim($request->last_name);
        $coordinator->email = trim($request->email);
        if(!empty($request->password))
        {
            $coordinator->password = Hash::make($request->password);
        }
        $coordinator->save();

        return redirect('admin/coordinator/list')->with('success', 'Coordinador actualizado exitosamente');
    }

    public function delete($id)
    {
        $coordinator = User::getSingle($id);
        $coordinator->is_delete = 1;
        $coordinator->save();
        return redirect('admin/coordinator/list')->with('success', 'Coordinador eliminado exitosamente');
    }
    public function view($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = 'Detalle del Coordinador';
            return view('admin.coordinator.view', $data);
        }
        else
        {
            abort(404);
        }
    }
}
