<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StudentAddFeesModel;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\AssignClassTeacherModel;
use App\Models\NoticeBoardModel;
use App\Models\ClassSubjectModel;
use App\Models\HomeworkModel;
use App\Models\HomeworkSubmitModel;
use App\Models\StudentAttendanceModel;







class DashboardController extends Controller
{

    public function dashboard()

    {
        $data['header_title'] = 'Dashboard';
        //validaciones
        if (Auth::user()->user_type == 1) {

            $data['getTotalTodayFees'] = StudentAddFeesModel::getTotalTodayFees();

            $data['getTotalfees'] = StudentAddFeesModel::getTotalfees();

            $data['getTotalExam'] = ExamModel::getTotalExam();
            $data['getTotalClass'] = ClassModel::getTotalClass();

            $data['getTotalSubject'] = SubjectModel::getTotalSubject();

            $data['TotalAdmin'] = User::getTotalUser(1);
            $data['TotalTeacher'] = User::getTotalUser(2);
            $data['TotalStudent'] = User::getTotalUser(3);
            $data['TotalParent'] = User::getTotalUser(4);
            return view('admin.dashboard', $data);
        } else
    if (Auth::user()->user_type == 2) {

            // return redirect('teacher/dashboard');


            $data['getTotalClass'] = AssignClassTeacherModel::getMyClassSubjectGroupCount(Auth::user()->id);

            $data['TotalStudent'] = User::getTeacherStudentCount(Auth::user()->id);

            $data['getTotalSubject'] = AssignClassTeacherModel::getMyClassSubjectCount(Auth::user()->id);

            $data['getTotalNotice'] = NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);



            return view('teacher.dashboard', $data);
        } else
        if (Auth::user()->user_type == 3) {

            $data['getTotalPaidAmount'] = StudentAddFeesModel::getTotalPaidAmountStudent(Auth::user()->id);

            $data['getTotalSubject'] = ClassSubjectModel::MySubjectTotal(Auth::user()->class_id);
            $data['getTotalNotice'] = NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
            $data['getTotalHommework'] = HomeworkModel::getRecordStudentCount(Auth::user()->class_id, Auth::user()->id);

            $data['getSubmitedHommework'] = HomeworkSubmitModel::getRecordStudentCount(Auth::user()->id);
            $data['getAttendance'] = StudentAttendanceModel::getRecordStudentAttendanceCount(Auth::user()->id);


            //$data['getTotalSubject'] = SubjectModel::MySubjectTotal();

            return view('student.dashboard', $data);
        } else
    if (Auth::user()->user_type == 4) {

            return view('parent.dashboard', $data);
        } else if (Auth::user()->user_type == 5) {
            // Coordinator dashboard
            $data['TotalTeachers'] = User::getTotalUser(2);
            $data['TotalStudents'] = User::getTotalUser(3);
            $data['TotalClasses'] = ClassModel::getTotalClass();
            $data['TotalSubjects'] = SubjectModel::getTotalSubject();

            return view('coordinator.dashboard', $data);
        } else {
            // Default dashboard for other user types
            return view('schooll.dashboard', $data);
        }
    }
}
