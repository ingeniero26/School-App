<?php

namespace App\Http\Controllers;

use App\Models\AssignClassTeacherModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\HomeworkModel;
use App\Models\HomeworkSubmitModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeworkController extends Controller
{
    public function homework()
    {
        $data['getRecord'] = HomeworkModel::getRecord();
        $data['header_title'] = 'Tareas';
        return view('admin.homework.list', $data);
    }

    public function HomeworkAdd()
    {
        $data['getClass'] = ClassModel::getClassSubject();
        $data['header_title'] = 'Agregar Tarea';
        return view('admin.homework.add', $data);
    }

    public function ajax_get_subject(Request $request)
    {
        $class_id = $request->class_id;
        $getSubject = ClassSubjectModel::MySubject($class_id);
        $html = '';

        $html .= '<option value="">Selecccione </option>';
        foreach ($getSubject as $value) {
            $html .= '<option value="' . $value->subject_id . '">' . $value->subject_name . ' </option>';

        }
        $json['success'] = $html;
        echo json_encode($json);

    }

    public function HomeworkInsert(Request $request)
    {
        $homework = new HomeworkModel;
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);

        if (!empty($request->file('document_file'))) {

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework/', $filename);
            $homework->document_file = $filename;
        }

        $homework->description = trim($request->description);
        $homework->created_by = Auth::user()->id;

        $homework->save();

        return redirect('admin/homework/homework')->with('success', 'Tarea agregado al sistema');

    }

    // eliminar admin
    public function HomeworkDelete($id)
    {
        $homework = HomeworkModel::getHomework($id);
        $homework->is_delete = 1;
        $homework->save();
        return redirect('admin/homework/homework')->with('success', 'Actividad eliminado con exito');

    }

    public function HomeworkEdit($id)
    {
        $getRecord = HomeworkModel::getHomework($id);
        $data['getRecord'] = $getRecord;
        $data['getSubject'] = ClassSubjectModel::MySubject($getRecord->class_id);
        $data['getClass'] = ClassModel::getClassSubject();
        $data['header_title'] = 'Editar Tarea';
        return view('admin.homework.edit', $data);

    }

    public function HomeworkUpdate($id, Request $request)
    {
        //valida si el correo ya esta en el sistema

        $homework = HomeworkModel::getHomework($id);
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);

        if (!empty($request->file('document_file'))) {
            if (!empty($homework->getDocument())) {
                unlink('upload/homework/' . $homework->document_file);
            }

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework/', $filename);
            $homework->document_file = $filename;
        }

        $homework->save();

        return redirect('admin/homework/homework')->with('success', 'Tarea editado con exito');
    }

    //Tareas docente
    public function HomeworkTeacher()
    {
        $class_ids = array();
        $getClass = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        foreach ($getClass as $class) {
            $class_ids[] = $class->class_id;
        }
        $data['getRecord'] = HomeworkModel::getRecordTeacher($class_ids);
        $data['header_title'] = 'Tareas';
        return view('teacher.homework.list', $data);

    }

    public function HomeworkAddTeacher()
    {
        //$data['getClass'] = ClassModel::getClassSubject();
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        $data['header_title'] = 'Agregar Tarea';
        return view('teacher.homework.add', $data);
    }

    public function HomeworkInsertTeacher(Request $request)
    {
        $homework = new HomeworkModel;
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);

        if (!empty($request->file('document_file'))) {

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework/', $filename);
            $homework->document_file = $filename;
        }

        $homework->description = trim($request->description);
        $homework->created_by = Auth::user()->id;

        $homework->save();

        return redirect('teacher/homework/homework')->with('success', 'Tarea agregado al sistema');

    }

    public function HomeworkDeleteTeacher($id)
    {
        $homework = HomeworkModel::getHomework($id);
        $homework->is_delete = 1;
        $homework->save();
        return redirect('teacher/homework/homework')->with('success', 'Actividad eliminado con exito');

    }

    public function HomeworkEditTeacher($id)
    {
        $getRecord = HomeworkModel::getHomework($id);
        $data['getRecord'] = $getRecord;
        $data['getSubject'] = ClassSubjectModel::MySubject($getRecord->class_id);
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);

        $data['header_title'] = 'Editar Tarea';
        return view('teacher.homework.edit', $data);

    }

    public function HomeworkUpdateTeacher($id, Request $request)
    {
        //valida si el correo ya esta en el sistema

        $homework = HomeworkModel::getHomework($id);
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);

        if (!empty($request->file('document_file'))) {
            if (!empty($homework->getDocument())) {
                unlink('upload/homework/' . $homework->document_file);
            }

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework/', $filename);
            $homework->document_file = $filename;
        }

        $homework->save();

        return redirect('teacher/homework/homework')->with('success', 'Tarea editado con exito');
    }

    // actividades estudiante
    public function MyHomeworkStudent()
    {
        $data['getRecord'] = HomeworkModel::getRecordStudent(Auth::user()->class_id, Auth::user()->id);

        $data['header_title'] = 'Tareas';
        return view('student.homework.list', $data);
    }

    //ENVIAR TAREASDEL ESTUDIANTE
    public function SubmitHomework($homework_id)
    {
        $data['getRecord'] = HomeworkModel::getHomework($homework_id);
        $data['header_title'] = 'Enviar Tarea';
        return view('student.homework.submit_homework', $data);
    }

    public function SubmitHomeworkInsert($homework_id, Request $request)
    {
        $homework_submit = new HomeworkSubmitModel;
        $homework_submit->homework_id = $homework_id;
        $homework_submit->student_id = Auth::user()->id;

        if (!empty($request->file('document_file'))) {

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework/', $filename);
            $homework_submit->document_file = $filename;
        }

        $homework_submit->description = trim($request->description);
        $homework_submit->save();

        return redirect('student/my_homework')->with('success', 'Tarea enviada con exito');
    }

    public function MyHomeworkSubmitedStudent(Request $request)
    {
        $data['getRecord'] = HomeworkSubmitModel::getRecordStudent(Auth::user()->id);
        $data['header_title'] = 'Tareas Enviadas';
        return view('student.homework.my_submitted_homework', $data);
    }

    //LISTADO TAREAS RECIBIDAS
    public function submitted($homework_id)
    {
        $homework = HomeworkModel::getHomework($homework_id);

        if (!empty($homework)) {

            $data['homework_id'] = $homework_id;

            $data['getRecord'] = HomeworkSubmitModel::getRecord($homework_id);
            $data['header_title'] = 'Tareas';
            return view('admin.homework.submitted', $data);

        } else {
            abort(404);
        }
    }
    //LISTADO TAREAS RECIBIDAS MODULO DOCENTE
    public function SubmittedTeacher($homework_id)
    {
        $homework = HomeworkModel::getHomework($homework_id);

        if (!empty($homework)) {

            $data['homework_id'] = $homework_id;

            $data['getRecord'] = HomeworkSubmitModel::getRecord($homework_id);
            $data['header_title'] = 'Tareas';
            return view('teacher.homework.submitted', $data);

        } else {
            abort(404);
        }
    }

    public function HomeworkStudentParent($student_id)
    {
        $getStudent = User::getSingle($student_id);
        $data['getRecord'] = HomeworkModel::getRecordStudent($getStudent->class_id, $getStudent->id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = 'Estudiante Tareas';
        return view('parent.homework.list', $data);
    }

    public function SubmittedHomeworkStudentParent($student_id)
    {
        $getStudent = User::getSingle($student_id);

        $data['getRecord'] = HomeworkSubmitModel::getRecordStudent($getStudent->id);
        $data['header_title'] = 'Tareas Enviadas -Hijo';
        $data['getStudent'] = $getStudent;

        return view('parent.homework.my_submitted_homework', $data);
    }

    //reportes
    public function HomeworkReport()
    {
        $data['getRecord'] = HomeworkSubmitModel::getHomeworReport();
        $data['header_title'] = 'Reporte Tareas';
        return view('admin.homework.report', $data);
    }

}