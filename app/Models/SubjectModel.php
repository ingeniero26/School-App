<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use Request;

class SubjectModel extends Model
{
    use HasFactory;
    protected $table = 'subject';

    public static function getSubjectList()
    {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subject.created_by');
        if (!empty(Request::get('name'))) {
            $return = $return->where('subject.name', 'like',
                '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('type'))) {
            $return = $return->where('subject.type', '=', Request::get('type'));
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('subject.created_at', '=',
                Request::get('date'));
        }
        $return = $return->where('subject.is_delete', '=', 0)
            ->orderBy('subject.id', 'desc')
            ->paginate(10);
        return $return;
        //$return = $return->orderBy('class.id', 'desc')
        //    ->paginate(10);

    }

    // mostrar datos del admin por ID
    public static function getSubject($id)
    {
        return self::find($id);
    }

    public static function getSubjectClass() {
        $return = SubjectModel::select('subject.*')
        ->join('users', 'users.id', 'subject.created_by')
        ->where('subject.is_delete', '=', 0)
        ->where('subject.status', '=', 0)
        ->orderBy('subject.name', 'asc')
        ->get();
    return $return;
    }

    public static function getTotalSubject() {
        $return = SubjectModel::select('subject.*')
        ->join('users', 'users.id', 'subject.created_by')
        ->where('subject.is_delete', '=', 0)
        ->where('subject.status', '=', 0)
        ->count();
    return $return;
    }
   
}
