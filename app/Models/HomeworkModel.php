<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class HomeworkModel extends Model
{
    use HasFactory;
    protected $table = 'homework';
    public static function getRecord()
    {
        $return = HomeworkModel::select('homework.*',
            'class.name as class_name', 'subject.name as subject_name',
            'users.name as created_by_name')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('users', 'users.id', 'homework.created_by');

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

        $return = $return->where('homework.is_delete', '=', 0);
        $return = $return->orderBy('homework.id', 'desc')
            ->paginate(20);
        return $return;
    }
    //docente
    public static function getRecordStudent($class_id, $student_id)
    {
        //$class_ids = array();
        $return = HomeworkModel::select('homework.*',
            'class.name as class_name', 'subject.name as subject_name',
            'users.name as created_by_name')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('users', 'users.id', 'homework.created_by')
            ->where('homework.class_id', '=', $class_id)
            ->where('homework.is_delete', '=', 0)
            ->whereNotIn('homework.id', function ($query) use ($student_id) {
                $query->select('homework_submit.homework_id')
                    ->from('homework_submit')
                    ->where('homework_submit.student_id', '=', $student_id);
            });

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

        $return = $return->orderBy('homework.id', 'desc')
            ->paginate(20);
        return $return;
    }

     public static function getRecordStudentCount($class_id, $student_id)
    {
        //$class_ids = array();
        $return = HomeworkModel::select('homework.id')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('users', 'users.id', 'homework.created_by')
            ->where('homework.class_id', '=', $class_id)
            ->where('homework.is_delete', '=', 0)
            ->whereNotIn('homework.id', function ($query) use ($student_id) {
                $query->select('homework_submit.homework_id')
                    ->from('homework_submit')
                    ->where('homework_submit.student_id', '=', $student_id);
            });

        $return = $return->orderBy('homework.id', 'desc')
            ->count();
        return $return;
    }
    //docente
    public static function getRecordTeacher($class_ids)
    {
        //$class_ids = array();
        $return = HomeworkModel::select('homework.*',
            'class.name as class_name', 'subject.name as subject_name',
            'users.name as created_by_name')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('users', 'users.id', 'homework.created_by')
            ->whereIn('homework.class_id', $class_ids);

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

        $return = $return->where('homework.is_delete', '=', 0);
        $return = $return->orderBy('homework.id', 'desc')
            ->paginate(20);
        return $return;
    }

    public static function getHomework($id)
    {
        return HomeworkModel::find($id);
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
}