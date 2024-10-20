<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\HeadquartersModel;
use App\Models\RegistrationModel;
use Illuminate\Http\Request;
use App\Exports\EnrollmentsExport;
use App\Models\JourneysModel;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function list(Request $request)
    {
        return view('admin.registration.list');
    }
    public function showEnrolledStudents(Request $request)
    {
        $query = RegistrationModel::with('student', 'class', 'headquarter','journeys');
           // ->where('status', 1); // 1: matriculado

        if ($request->has('class_id') && !empty($request->class_id)) {
            $query->where('class_id', $request->class_id);
        }

        if ($request->has('headquarter_id') && !empty($request->headquarter_id)) {
            $query->where('headquater_id', $request->headquarter_id);
        }

        $enrollments = $query->get();
        $classes = ClassModel::all();
        $headquarters = HeadquartersModel::all();
        $journeys = JourneysModel::all();

        return view('admin.registration.enrrolled', compact('enrollments', 'classes', 'headquarters','journeys'));
    }

    public function export()
    {
        return Excel::download(new EnrollmentsExport, 'enrolled_students.xlsx');
    }

    public function changeStatus(Request $request)
    {
        $enrollment = RegistrationModel::find($request->order_id);
        if ($enrollment) {
            $enrollment->status = $request->status_id;
            $enrollment->save();
            return response()->json(['success' => 'Estado cambiado']);
        } else {
            return response()->json(['error' => 'Matrícula no encontrada'], 404);
        }
    }
}
