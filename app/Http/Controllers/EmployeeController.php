<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getEmployee();
        $data['header_title'] = "Employee List";
        return view('admin.employee.list', $data);
    }

    public function add()
    {
        $data['getRecord'] = JobModel::getJob();
        $data['header_title'] = "Add New Employee";
        return view('admin.employee.add', $data);
    }

    public function insert(Request $request)
    {
        $user = new User;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->number_document = trim($request->number_document);
        $user->document_type = trim($request->document_type);

        $user->address = trim($request->address);
        $user->mobile_number = trim($request->mobile_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->deparment_id = trim($request->deparment_id);


        $user->gender = trim($request->gender);

        $user->status = trim($request->status);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 2;
        $user->save();

        return redirect('admin/employee/list')->with('success', "Employee successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getJob'] = JobModel::getJob();
            $data['header_title'] = "Edit Employee";
            return view('admin.employee.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->number_document = trim($request->number_document);
        $user->document_type = trim($request->document_type);

        $user->address = trim($request->address);
        $user->mobile_number = trim($request->mobile_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->deparment_id = trim($request->deparment_id);


        $user->gender = trim($request->gender);
        $user->email = trim($request->email);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('admin/employee/list')->with('success', "Employee successfully updated");
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/employee/list')->with('success', "Employee successfully deleted");
    }

    public function detail($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Employee Details";
            return view('admin.employee.detail', $data);
        } else {
            abort(404);
        }
    }

}
