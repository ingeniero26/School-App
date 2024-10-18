<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExport;

class JobController extends Controller
{
    public function list()
    {
        $data['getRecord'] = JobModel::getJob();
        $data['header_title'] = "Job List";
        return view('admin.job.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Job";
        return view('admin.job.add', $data);
    }

    public function insert(Request $request)
    {
        $job = new JobModel();
        $job->job_title = $request->job_title;
        $job->description = $request->description;

        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;
        $job->created_by = Auth::user()->id;
        $job->status = $request->status;
        $job->save();

        return redirect('admin/job/list')->with('success', "Job successfully added");
    }

    public function edit($id)
    {
        $data['getRecord'] = JobModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Job";
            return view('admin.job.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $job = JobModel::getSingle($id);
        $job->job_title = $request->job_title;
        $job->description = $request->description;

        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;
        $job->status = $request->status;
        $job->save();

        return redirect('admin/job/list')->with('success', "Job successfully updated");
    }

    public function delete($id)
    {
        $job = JobModel::getSingle($id);
        $job->delete();

        return redirect('admin/job/list')->with('success', "Job successfully deleted");
    }
    public function view($id)
    {
        $data['getRecord'] = JobModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "View Job Details";
            return view('admin.job.view', $data);
        } else {
            abort(404);
        }
    }
    public function export(Request $request)
    {
        $jobs = JobModel::query();

        if ($request->filled('start_date')) {
            $jobs->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $jobs->whereDate('created_at', '<=', $request->end_date);
        }

        $jobs = $jobs->get();

        $filename = 'puestos_export_' . date('Y-m-d') . '.xlsx';

        return Excel::download(new JobsExport($jobs), $filename);
    }
}
