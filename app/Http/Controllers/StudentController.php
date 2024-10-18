<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\HeadquartersModel;
use App\Models\JourneysModel;
use App\Models\RegistrationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    //
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Estudiantes';
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['getRecord'] = ClassModel::getClassSubject();
        $data['getJourney'] = JourneysModel::getJourneySelect();
        $data['getHeadquater'] = HeadquartersModel::getHeadquaterSelect();
        $data['header_title'] = 'Add Estudiante';
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {

        //valida si el correo ya esta en el sistema
        request()->validate([
            'email' => 'required|email|unique:users',
            'name' => 'max:250',

        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->document_type = trim($request->document_type);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->headquarter_id = trim($request->headquarter_id);
        $student->journey_id = trim($request->journey_id);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->social_stratum = trim($request->social_stratum);
        $student->mobile_number = trim($request->mobile_number);
        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }

        if (!empty($request->file('profile_pic'))) {

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }

        $student->blood_group = trim($request->blood_group);
        $student->eps = trim($request->eps);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);

        $student->user_type = 3;

        $student->save();



    // Crear registro en la tabla registration
    $registration = new RegistrationModel;
    $registration->student_id = $student->id;
    $registration->headquater_id = $student->headquarter_id;
    $registration->class_id = $student->class_id;
    $registration->status = 1; // 1: matriculado
    $registration->date_of_entry = now();
    $registration->save ();



        return redirect('admin/student/list')->with('success', 'Estudiante agregado al sistema');
    }

    public function edit($id)
    {
        $data['getStudent'] = User::getSingle($id);
        if (!empty($data['getStudent'])) {

            $data['getRecord'] = ClassModel::getClassSubject();
            $data['getJourney'] = JourneysModel::getJourneySelect();
            $data['getHeadquater'] = HeadquartersModel::getHeadquaterSelect();
            $data['header_title'] = 'Editar Estudiante';
            return view('admin.student.edit', $data);
        } else {
            abort(404);
        }

    }

    public function update($id, Request $request)
    {
        //valida si el correo ya esta en el sistema
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'max:250',

        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->document_type = trim($request->document_type);

        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->headquarter_id = trim($request->headquarter_id);
        $student->journey_id = trim($request->journey_id);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->social_stratum = trim($request->social_stratum);
        $student->mobile_number = trim($request->mobile_number);
        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }

        if (!empty($request->file('profile_pic'))) {
            if (!empty($student->getProfile())) {
                unlink('upload/profile/' . $student->profile_pic);
            }

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }

        $student->blood_group = trim($request->blood_group);
        $student->eps = trim($request->eps);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);

        if (!empty($request->password)) {
            $student->password = Hash::make($request->password);
        }
        $student->save();

        return redirect('admin/student/list')->with('success', 'Estudiante editado con exito');
    }

    // eliminar admin
    public function delete($id)
    {
        $student = User::getSingle($id);
        $student->is_delete = 1;
        $student->save();
        return redirect('admin/student/list')->with('success', 'Estudiante eliminado con exito');

    }

// mostrar estudiantes asignados o matriculados al docente
    public function MyStudent()
    {
        $data['getRecord'] = User::getTeacherStudent(Auth::user()->id);
        $data['header_title'] = 'Estudiantes';
        return view('teacher.my_student', $data);

    }

    public function coordinatorStudentList()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Lista de Estudiantes';
        return view('coordinator.student.list', $data);
    }
    public function coordinatorStudentAdd()
    {
        $data['getRecord'] = ClassModel::getClassSubject();
        $data['getJourney'] = JourneysModel::getJourneySelect();
        $data['getHeadquater'] = HeadquartersModel::getHeadquaterSelect();
        $data['header_title'] = 'Agregar Estudiante';
        return view('coordinator.student.add', $data);
    }

    public function coordinatorStudentInsert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|max:250',
        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->document_type = trim($request->document_type);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->headquarter_id = trim($request->headquarter_id);
        $student->journey_id = trim($request->journey_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = !empty($request->date_of_birth) ? trim($request->date_of_birth) : null;
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->social_stratum = trim($request->social_stratum);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = !empty($request->admission_date) ? trim($request->admission_date) : null;
        $student->blood_group = trim($request->blood_group);
        $student->eps = trim($request->eps);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->user_type = 3;

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $ext = $file->getClientOriginalExtension();
            $filename = date('Ymdhis') . Str::random(20) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }

        $student->save();

        return redirect('coordinator/student/list')->with('success', 'Estudiante agregado con éxito');
    }
    public function coordinatorStudentEdit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!$data['getRecord']) {
            return redirect('coordinator/student/list')->with('error', 'Estudiante no encontrado');
        }

        $data['getClass'] = ClassModel::getClassSubject();
        $data['getJourney'] = JourneysModel::getJourneySelect();
        $data['getHeadquater'] = HeadquartersModel::getHeadquaterSelect();
        $data['header_title'] = 'Editar Estudiante';
        return view('coordinator.student.edit', $data);
    }

    public function coordinatorStudentUpdate($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'name' => 'required|max:250',
        ]);

        $student = User::getSingle($id);
        if (!$student) {
            return redirect('coordinator/student/list')->with('error', 'Estudiante no encontrado');
        }

        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->document_type = trim($request->document_type);
        $student->email = trim($request->email);
        if (!empty($request->password)) {
            $student->password = Hash::make($request->password);
        }
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->headquarter_id = trim($request->headquarter_id);
        $student->journey_id = trim($request->journey_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = !empty($request->date_of_birth) ? trim($request->date_of_birth) : null;
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->social_stratum = trim($request->social_stratum);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = !empty($request->admission_date) ? trim($request->admission_date) : null;
        $student->blood_group = trim($request->blood_group);
        $student->eps = trim($request->eps);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $ext = $file->getClientOriginalExtension();
            $filename = date('Ymdhis') . Str::random(20) . '.' . $ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }

        $student->save();

        return redirect('coordinator/student/list')->with('success', 'Estudiante actualizado con éxito');
    }
    public function coordinatorStudentDelete($id)
    {
        $student = User::getSingle($id);
        if (!$student) {
            return redirect('coordinator/student/list')->with('error', 'Estudiante no encontrado');
        }

        // Delete the student's profile picture if it exists
        if ($student->profile_pic && file_exists(public_path('upload/profile/' . $student->profile_pic))) {
            unlink(public_path('upload/profile/' . $student->profile_pic));
        }

        $student->is_delete = 1;
        $student->save();

        return redirect('coordinator/student/list')->with('success', 'Estudiante eliminado con éxito');
    }
    public function view($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['header_title'] = 'Ver Estudiante';
        return view('admin.student.view', $data);
    }
    public function getClassHeadquarter(Request $request)
    {
        $headquater_id = $request->headquater_id;
        $get_class_headquarter = ClassModel::getClassHeadquarter($headquater_id);
       $html = '';
       $html .= '<option value="">Selecciona una clase</option>';
       foreach ($get_class_headquarter as $class) {
        $html .= '<option value="' . $class->id . '">' . $class->name . '</option>';
       }
       return response()->json($html);

    }


}
