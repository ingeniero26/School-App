<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AssignClassTeacherModel extends Model
{
    use HasFactory;
    protected $table = 'assign_class_teacher';

    public static function getAlreadyFirst($class_id, $teacher_id)
    {
        return self::where('class_id', '=', $class_id)

            ->where('teacher_id', '=', $teacher_id)->first();
    }

    //LISTADO DE DOCENTE-MODULOS-PROGRAMAS
    public static function getRecord()
    {
        $return = self::select('assign_class_teacher.*',
            'class.name as class_name',
            'teacher.name as teacher_name', 'teacher.last_name as last_name',
            'users.name as created_by_name')
            ->join('users as teacher', 'teacher.id', 'assign_class_teacher.teacher_id')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
        // ->join('headquarters', 'headquarters.id', '=', 'users.headquarter_id', 'left')

        //  ->join('headquarters', 'headquarters.id', '=', 'assign_class_teacher.headquarter_id')
            ->join('users', 'users.id', 'assign_class_teacher.created_by');
        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like',
                '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('teacher_name'))) {
            $return = $return->where('teacher.name', 'like',
                '%' . Request::get('teacher_name') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('assign_class_teacher.created_at', '=',
                Request::get('date'));
        }
        if (!empty(Request::get('status'))) {
            $status = (Request::get('status') == 100) ? 0 : 1;
            $return = $return->where('assign_class_teacher.status', '=', $status);
        }
        $return = $return->where('assign_class_teacher.is_delete', '=', 0);
        $return = $return->orderBy('assign_class_teacher.id', 'desc')
            ->paginate(20);
        return $return;
    }

    public static function getAssignClassTeacher($id)
    {
        return self::find($id);
    }

    public static function getAssignTeacherID($teacher_id)
    {
        return self::where('teacher_id', '=', $teacher_id)
            ->where('is_delete', '=', 0)
            ->get();
    }

    public static function deleteAssignTeacher($class_id)
    {
        return self::where('class_id', '=', $class_id)
            ->delete();
    }

    public static function getMyClassSubject($teacher_id)
    {
        return AssignClassTeacherModel::select('assign_class_teacher.*',
            'class.name as class_name',
            'headquarters.name as headquarter_name',
            'subject.name as subject_name',
            'subject.type as subject_type',
            'exam.name as exam_name',
            'class.id as class_id',
            'subject.id as subject_id')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
            ->join('exam', 'class_subject.exam_id', '=', 'exam.id')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            ->join('headquarters', 'headquarters.id', '=', 'class_subject.headquarter_id')
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->where('assign_class_teacher.status', '=', 0)
            ->where('subject.status', '=', 0)
            ->where('subject.is_delete', '=', 0)
            ->where('class_subject.status', '=', 0)
            ->where('class_subject.is_delete', '=', 0)
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->get();
    }
    // panel
       public static function getMyClassSubjectCount($teacher_id)
    {
        return AssignClassTeacherModel::select('assign_class_teacher.id')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
            ->join('exam', 'class_subject.exam_id', '=', 'exam.id')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            ->join('headquarters', 'headquarters.id', '=', 'class_subject.headquarter_id')
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->where('assign_class_teacher.status', '=', 0)
            ->where('subject.status', '=', 0)
            ->where('subject.is_delete', '=', 0)
            ->where('class_subject.status', '=', 0)
            ->where('class_subject.is_delete', '=', 0)
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->count();
    }

       public static function getMyClassSubjectGroupCount($teacher_id)
    {
        return AssignClassTeacherModel::select('assign_class_teacher.id')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->where('assign_class_teacher.status', '=', 0)
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
         //   ->groupBy('assign_class_teacher.class_id')
            ->count();
    }


    public static function getCalendarTeacher($teacher_id)
    {
        return AssignClassTeacherModel::select('class_subject_timetable.*',
            'class.name as class_name', 'subject.name as subject_name',
            'week.name as week_name', 'week.fullcalendar_day')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
            ->join('class_subject_timetable', 'class_subject_timetable.subject_id', '=', 'class_subject.subject_id')
            ->join('subject', 'subject.id', '=', 'class_subject_timetable.subject_id')
            ->join('week', 'week.id', '=', 'class_subject_timetable.week_id')

            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->where('assign_class_teacher.status', '=', 0)
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->get();

    }

//docente-horario
    public static function getMyClassSubjectGroup($teacher_id)
    {
        return AssignClassTeacherModel::select('assign_class_teacher.*',
            'class.name as class_name',

            'class.id as class_id')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->where('assign_class_teacher.status', '=', 0)
        // ->where('subject.status', '=', 0)
        //  ->where('subject.is_delete', '=', 0)
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->groupBy('assign_class_teacher.class_id')
            ->get();
    }

    public static function getMyTimeTable($class_id, $subject_id)
    {
        return date('l');
        // $getWeek = WeekModel::getWeekUsingName(date('l'));
        // return ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $getWeek->id);
    }

}
