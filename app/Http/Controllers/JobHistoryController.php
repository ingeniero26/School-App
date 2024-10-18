<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobHistoryModel;

use App\Models\User;
use App\Models\JobModel;

class JobHistoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = JobHistoryModel::getRecord();
        return view('admin.job_history.list',$data);
    }
    public function add()
    {

        $jobs = JobModel::all();

        $data['getEmployee'] = User::where('user_type','=',2)->get();
        $data['getJobs'] = $jobs;
        return view('admin.job_history.add',$data);
    }


    public function insert(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:users,id',
            'job_id' => 'required|exists:jobs,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'department_id' => 'nullable|integer',
        ]);

        $jobHistory = new JobHistoryModel();
        $jobHistory->employee_id = $request->employee_id;
        $jobHistory->job_id = $request->job_id;
        $jobHistory->start_date = $request->start_date;
        $jobHistory->end_date = $request->end_date;
        $jobHistory->department_id = $request->department_id;
        $jobHistory->save();

        return redirect('admin/job_history/list')->with('success', 'Job history added successfully');
    }


}
