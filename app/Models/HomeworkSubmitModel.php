<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class HomeworkSubmitModel extends Model
{
    use HasFactory;
    protected $table = 'homework_submit';

    public static function getRecordStudent($student_id)
    {
        //$class_ids = array();
        $return = HomeworkSubmitModel::select('homework_submit.*',
            'subject.name as subject_name',
            'class.name as class_name')
            ->join('homework', 'homework.id', '=', 'homework_submit.homework_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', 'homework.class_id')
            ->where('homework_submit.student_id', '=', $student_id);

        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like',
                '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('subject_name'))) {
            $return = $return->where('subject.name', 'like',
                '%' . Request::get('subject_name') . '%');
        }
        if (!empty(Request::get('from_homework_date'))) {
            $return = $return->where('homework.homework_date', '>=',
                Request::get('from_homework_date'));
        }
        if (!empty(Request::get('to_homework_date'))) {
            $return = $return->where('homework.homework_date', '<=',
                Request::get('to_homework_date'));
        }
        if (!empty(Request::get('from_submission_date'))) {
            $return = $return->where('homework.submission_date', '>=',
                Request::get('from_submission_date'));
        }
        if (!empty(Request::get('to_submission_date'))) {
            $return = $return->where('homework.submission_date', '<=',
                Request::get('to_submission_date'));
        }

        // $return = $return->where('homework_submit.is_delete', '=', 0);
        $return = $return->orderBy('homework_submit.id', 'desc')
            ->paginate(20);
        return $return;

    }
    public static function getRecord($homework_id)
    {
        //$class_ids = array();
        $return = HomeworkSubmitModel::select('homework_submit.*',
            'users.name as first_name', 'users.last_name')
            ->join('users', 'users.id', '=', 'homework_submit.student_id')
            ->where('homework_submit.homework_id', '=', $homework_id);

        if (!empty(Request::get('from_created_date'))) {
            $return = $return->where('homework.created_at', '>=',
                Request::get('from_created_date'));
        }
        if (!empty(Request::get('to_created_date'))) {
            $return = $return->where('homework.created_at', '<=',
                Request::get('to_created_date'));
        }

        if (!empty(Request::get('first_name'))) {
            $return = $return->where('usres.name', 'like',
                '%' . Request::get('first_name') . '%');
        }
        if (!empty(Request::get('last_name'))) {
            $return = $return->where('usres.last_name', 'like',
                '%' . Request::get('last_name') . '%');
        }

        // $return = $return->where('homework_submit.is_delete', '=', 0);
        $return = $return->orderBy('homework_submit.id', 'desc')
            ->paginate(20);
        return $return;

    }

    public function getDocument()
    {
        if (!empty($this->document_file) &&
            file_exists('upload/homework/' . $this->document_file)) {
            return url('upload/homework/' . $this->document_file);
        } else {
            return "";
        }
    }

    public function getHomework()
    {
        return $this->belongsTo(HomeworkModel::class, "homework_id");
    }
    public function getStudent()
    {
        return $this->belongsTo(User::class, "student_id");
    }

    //reporte
    public static function getHomeworReport()
    {
        $return = HomeworkSubmitModel::select('homework_submit.*',
            'subject.name as subject_name', 'users.name as first_name', 'users.last_name',
            'class.name as class_name')
            ->join('users', 'users.id', '=', 'homework_submit.student_id')
            ->join('homework', 'homework.id', '=', 'homework_submit.homework_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', 'homework.class_id');

        if (!empty(Request::get('first_name'))) {
            $return = $return->where('users.name', 'like',
                '%' . Request::get('first_name') . '%');
        }
        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like',
                '%' . Request::get('last_name') . '%');
        }
        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like',
                '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('subject_name'))) {
            $return = $return->where('subject.name', 'like',
                '%' . Request::get('subject_name') . '%');
        }
        if (!empty(Request::get('from_homework_date'))) {
            $return = $return->where('homework.homework_date', '>=',
                Request::get('from_homework_date'));
        }
        if (!empty(Request::get('to_homework_date'))) {
            $return = $return->where('homework.homework_date', '<=',
                Request::get('to_homework_date'));
        }
        if (!empty(Request::get('from_submission_date'))) {
            $return = $return->where('homework.submission_date', '>=',
                Request::get('from_submission_date'));
        }
        if (!empty(Request::get('to_submission_date'))) {
            $return = $return->where('homework.submission_date', '<=',
                Request::get('to_submission_date'));
        }

        $return = $return->orderBy('homework_submit.id', 'desc')
            ->paginate(20);
        return $return;

    }

    // panel count
     public static function getRecordStudentCount($student_id)
    {
        //$class_ids = array();
        $return = HomeworkSubmitModel::select('homework_submit.id')
            ->join('homework', 'homework.id', '=', 'homework_submit.homework_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', 'homework.class_id')
            ->where('homework_submit.student_id', '=', $student_id)
        // $return = $return->where('homework_submit.is_delete', '=', 0);
       // $return = $return->orderBy('homework_submit.id', 'desc')
            ->count();
        return $return;

    }

}
