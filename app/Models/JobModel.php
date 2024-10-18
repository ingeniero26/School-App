<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class JobModel extends Model
{
    use HasFactory;

    protected $table = 'jobs';


    public static function getJob()
    {
        $return = JobModel::select('jobs.*', 'users.name as created_by_name')
        ->join('users', 'users.id', 'jobs.created_by');

        if (!empty(Request::get('job_title'))) {
            $return = $return->where('job_title', 'like', '%' . Request::get('job_title') . '%');
        }
        if (!empty(Request::get('min_salary'))) {
            $return = $return->where('min_salary', 'like', '%' . Request::get('min_salary') . '%');
        }
        if (!empty(Request::get('max_salary'))) {
            $return = $return->where('max_salary', 'like', '%' . Request::get('max_salary') . '%');
        }
        if (!empty(Request::get('start_date'))) {
            $return = $return->whereDate('jobs.created_at', '>=', Request::get('start_date'));
        }
        if (!empty(Request::get('end_date'))) {
            $return = $return->whereDate('jobs.created_at', '<=', Request::get('end_date'));
        }
        $return = $return->where('jobs.is_delete', '=', 0)
                    ->orderBy('id', 'desc')
                    ->paginate(20);
                    return $return;
    }

    public static function getSingle($id)
    {
        return self::find($id);
    }
}
