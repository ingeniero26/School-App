<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class StudentAddFeesModel extends Model
{
    use HasFactory;
    protected $table = 'student_add_fees';

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public static function getFees($student_id)
    {
        return self::select('student_add_fees.*',
            'class.name as class_name', 'class.amount',
            'users.name as created_by_name')
            ->join('class', 'class.id', '=', 'student_add_fees.class_id')
            ->join('users', 'users.id', 'student_add_fees.created_by')
            ->where('student_add_fees.student_id', '=', $student_id)
            ->where('student_add_fees.is_payment', '=', 1)
            ->get();
    }

    public static function getPaidAmount($student_id, $class_id)
    {
        return self::where('student_add_fees.student_id', '=', $student_id)
            ->where('student_add_fees.class_id', '=', $class_id)
            ->where('student_add_fees.is_payment', '=', 1)
            ->sum('student_add_fees.paid_amount');
    }
    // para el  dashboard
     public static function getTotalTodayFees()
    {
        return self::where('student_add_fees.is_payment', '=', 1)
             ->whereDate('student_add_fees.created_at', '=', date('Y-m-d'))
            ->sum('student_add_fees.paid_amount');
    }

      public static function getTotalfees()
    {
        return self::where('student_add_fees.is_payment', '=', 1)
                             ->sum('student_add_fees.paid_amount');
    }

     // portede abonos
    public static function  getRecord()
    {
          $return = self::select('student_add_fees.*',
            'class.name as class_name', 'class.amount',
            'users.name as created_by_name', 'student.name as first_name','student.last_name')
            ->join('class', 'class.id', '=', 'student_add_fees.class_id')
            ->join('users as student', 'student.id', '=', 'student_add_fees.student_id')
            ->join('users', 'users.id', 'student_add_fees.created_by')
            ->where('student_add_fees.is_payment', '=', 1);

              if (!empty(Request::get('class_id'))) {
                $return = $return->where('student_add_fees.class_id', '=', Request::get('class_id'));
                }

               if (!empty(Request::get('student_id'))) {
                  $return = $return->where('student_add_fees.student_id', '=', Request::get('student_id'));
                }

               if (!empty(Request::get('first_name'))) {
                  $return = $return->where('student.name', 'like',
                '%' . Request::get('first_name') . '%');
                }
                if (!empty(Request::get('last_name'))) {
                    $return = $return->where('student.last_name', 'like',
                        '%' . Request::get('last_name') . '%');
                }
                  if (!empty(Request::get('start_created_date'))) {
                  $return = $return->whereDate('student_add_fees.created_at', '>=',
                        Request::get('start_created_date'));
                }
                if (!empty(Request::get('end_created_date'))) {
                    $return = $return->whereDate('student_add_fees.created_at', '<=',
                        Request::get('end_created_date'));
                }

                 if (!empty(Request::get('payment_type'))) {
                    $return = $return->where('student_add_fees.payment_type', '=', Request::get('payment_type'));
                }


            $return=$return->orderBy('student_add_fees.id', 'desc')
            ->paginate(50);

            return $return;
    }

       public static function getTotalPaidAmountStudent($student_id)
    {
        return self::where('student_add_fees.is_payment', '=', 1)
                         ->where('student_add_fees.student_id', '=', $student_id)
                             ->sum('student_add_fees.paid_amount');
    }
}
