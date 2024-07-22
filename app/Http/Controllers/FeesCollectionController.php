<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\StudentAddFeesModel;
use App\Models\SettingModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeesCollectionController extends Controller
{

    // pagos estudiantes
    public function MyCollectionFeesStudent()
    {
        $student_id = Auth::user()->id;

        $data['getFees'] = StudentAddFeesModel::getFees($student_id);

        $getStudent = User::getSingleClass($student_id);

        $data['getStudent'] = $getStudent;

        $data['header_title'] = 'Pagos';

        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount(Auth::user()->id,
            Auth::user()->class_id);
        return view('student.my_fees_collection', $data);
    }

    public function MyCollectionFeesStudentPayment(Request $request)
    {

        $getStudent = User::getSingleClass(Auth::user()->id);
        $paid_amount = StudentAddFeesModel::getPaidAmount(Auth::user()->id,
            Auth::user()->class_id);
        if (!empty($request->amount)) {
            $RemaningAmount = $getStudent->amount - $paid_amount;
            if ($RemaningAmount >= $request->amount) {

                $remaning_amount_user = $RemaningAmount - $request->amount;
                $payment = new StudentAddFeesModel;
                $payment->student_id = Auth::user()->id;
                $payment->class_id = Auth::user()->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $RemaningAmount;
                $payment->remaning_amount = $remaning_amount_user;
                $payment->payment_date = $request->payment_date;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                // $payment->is_payment = 1;
                $payment->created_by = Auth::user()->id;
                $payment->save();

                $getSetting = SettingModel::getSingle();

                //pasarelaas de pagos

                if ($request->payment_type == 'Paypal') {
                    $query =array();
                    $query['business']     = $getSetting->paypal_email;
                    $query['cmd']          = '_xclick';
                    $query['item_name']    = "Student Feess";
                    $query['no_shipping']  = "1";
                    $query['item_number']  = $payment->id;
                    $query['amount']     = $request->amount;
                    $query['currency_code']     = 'USD';
                    $query['cancel_return']     = url('student/paypal/payment-error');
                    $query['return']     = url('student/paypal/payment-success');

                    $query_string = http_build_query($query);
                    //header('Location: http://www.paypal.com/cgi-bin/webscr?' . $query_string);
                     header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?' . $query_string);
                     exit();

                } else if ($request->payment_type == 'Stripe') {

                }
                // return redirect()->back()->with('success', 'Pago registrado con exito');

            } else {
                return redirect()->back()->with('error', 'La cantidad ingresada es  mayor que el valor del semestre');

            }

        } else {
            return redirect()->back()->with('error', 'el saldo debe ser mayor a $1');

        }
    }

    public function CollectionFees(Request $request)
    {
        $data['getClass'] = ClassModel::getClassSubject();
        if (!empty($request->all())) {
            $data['getRecord'] = User::getCollectFeesStudent();
        }
        $data['header_title'] = 'Pagos';
        return view('admin.fees_collection.collection_fees', $data);
    }

    // reporte
    
     public function ReportCollectionFees()
    {
       $data['getRecord'] = StudentAddFeesModel::getRecord();
        $data['getClass'] = ClassModel::getClassSubject();
        $data['header_title'] = 'Reporte Pagos';
        return view('admin.fees_collection.collection_fees_report', $data);
    }

    public function CollectionFeesAdd($student_id)
    {
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = 'Pagos';
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        return view('admin.fees_collection.add_collection_fees', $data);
    }

    public function CollectionFeesInsert($student_id, Request $request)
    {
        // dd($request->all());
        $getStudent = User::getSingleClass($student_id);
        $paid_amount = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        if (!empty($request->amount)) {
            $RemaningAmount = $getStudent->amount - $paid_amount;
            if ($RemaningAmount >= $request->amount) {
                $remaning_amount_user = $RemaningAmount - $request->amount;
                $payment = new StudentAddFeesModel;
                $payment->student_id = $request->student_id;
                $payment->class_id = $getStudent->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $RemaningAmount;
                $payment->remaning_amount = $remaning_amount_user;
                $payment->payment_date = $request->payment_date;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                $payment->is_payment = 1;
                $payment->created_by = Auth::user()->id;

                $payment->save();
                return redirect()->back()->with('success', 'Pago registrado con exito');
            } else {
                return redirect()->back()->with('error', 'La cantidad ingresada es  mayor que el valor del semestre');

            }
        } else {
            return redirect()->back()->with('error', 'el saldo debe ser mayor a $1');

        }

    }


    public function PaymentError(Request $request)
    {
        return redirect('student/fees_collection')->with('error', 'error al procesar el pago');
    }

     public function PaymentSucces(Request $request)
    {
        if(!empty($request->item_number) && !empty($request->st) && $request->st =='Completed')
        {
            $fees = StudentAddFeesModel::getSingle($request->item_number);
            if(!empty($fees))
            {
                $fees->is_payment = 1;
                  $fees->payment_data = json_encode($request->all());
                $Feess->save();
                return redirect('student/fees_collection')->with('succes', 'pago exitoso');
            }
            else {
                return redirect('student/fees_collection')->with('error', 'error al procesar el pago');
            }
        } 
        else 
         
        {
             return redirect('student/fees_collection')->with('error', 'error al procesar el pago');
        }
    }

}