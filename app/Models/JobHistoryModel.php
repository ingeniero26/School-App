<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistoryModel extends Model
{
    use HasFactory;

    protected $table = 'job_histories';

    protected $fillable = [
        'employee_id',
        'job_id',
        'start_date',
        'end_date',
    ];

    public static function getRecord()
    {
        $return = self::select('job_histories.*', 'users.name as employee_name', 'jobs.job_title')
                      ->join('users', 'users.id', '=', 'job_histories.employee_id')
                      ->join('jobs', 'jobs.id', '=', 'job_histories.job_id')
                      ->orderBy('job_histories.id', 'desc')
                      ->paginate(20);

        return $return;
    }

    public function employee()
    {
        return $this->belongsTo(User::class, "employee_id");
    }

    public function job()
    {
        return $this->belongsTo(JobModel::class, "job_id");
    }
}
