<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\CommunicateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\FeesCollectionController;
use App\Http\Controllers\HeadquartersController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\JourneysController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegistrationController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });
//rutas para login
 // rutas blog
// Home Blog routes
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/course', [HomeController::class, 'course'])->name('home.course');
Route::get('/teacher', [HomeController::class, 'teacher'])->name('home.teacher');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');

Route::post('post-comment', [HomeController::class, 'PostComment'])->name('home.PostComment');


//Route::get('/about', [HomeBlogController::class, 'about'])->name('home.about');
//Route::get('/class', [HomeBlogController::class, 'class'])->name('home.class');
//Route::get('/team', [HomeBlogController::class, 'team'])->name('home.team');
//Route::get('/gallery', [HomeBlogController::class, 'gallery'])->name('home.gallery');
//Route::get('/contact', [HomeBlogController::class, 'contact'])->name('home.contact');
//Route::get('/blog', [HomeBlogController::class, 'blog'])->name('home.blog');

Route::get('{slug}', [HomeController::class, 'single'])->name('home.single');


Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
//cessar sesion
Route::get('logout', [AuthController::class, 'logout']);
//ruta para recuperar clave
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);

// Route::get('admin/admin/list', function () {
//     return view('admin.admin.list');
// });

Route::group(['middleware' => 'common'], function () {
    Route::get('chat', [ChatController::class, 'chat']);
    Route::post('submit_message', [ChatController::class, 'submit_message']);
    Route::post('get_chat_windows', [ChatController::class, 'get_chat_windows']);
    Route::post('get_chat_search_user', [ChatController::class, 'get_chat_search_user']);
});

//rutas para el administrador
Route::group(['middleware' => 'admin'], function () {
    // Route::get('admin/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    //perfil
    Route::get('admin/account', [UserController::class, 'MyAccount']);
    Route::post('admin/account', [UserController::class, 'UpdateMyAccountAdmin']);

// rutas para el estudiante

    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);
    Route::get('admin/student/view/{id}', [StudentController::class, 'view']);

// Coordinator routes
Route::get('admin/coordinator/list', [CoordinatorController::class, 'list']);
Route::get('admin/coordinator/add', [CoordinatorController::class, 'add']);
Route::post('admin/coordinator/add', [CoordinatorController::class, 'insert']);
Route::get('admin/coordinator/edit/{id}', [CoordinatorController::class, 'edit']);
Route::post('admin/coordinator/edit/{id}', [CoordinatorController::class, 'update']);
Route::get('admin/coordinator/delete/{id}', [CoordinatorController::class, 'delete']);
Route::get('admin/coordinator/view/{id}', [CoordinatorController::class, 'view']);

// rutas para el docente

    Route::get('admin/teacher/list', [TeacherController::class, 'list']);
    Route::get('admin/teacher/add', [TeacherController::class, 'add']);
    Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
    Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);

// rutas para el padre de familia

    Route::get('admin/parent/list', [ParentController::class, 'list']);
    Route::get('admin/parent/add', [ParentController::class, 'add']);
    Route::post('admin/parent/add', [ParentController::class, 'insert']);
    Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']);
    Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);

    Route::get('admin/parent/my-student/{id}', [ParentController::class, 'myStudent']);
//ruta para asignara el estdiante al padre de familia
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'AssignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'AssignStudentParentDelete']);

//ruta para las clases
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

    Route::post('admin/student/getClassHeadquarter', [StudentController::class, 'getClassHeadquarter']);

    ;

//jornadas
    Route::get('admin/journeys/list', [JourneysController::class, 'list']);
    Route::get('admin/journeys/add', [JourneysController::class, 'add']);
    Route::post('admin/journeys/add', [JourneysController::class, 'insert']);
    Route::get('admin/journeys/edit/{id}', [JourneysController::class, 'edit']);
    Route::post('admin/journeys/edit/{id}', [JourneysController::class, 'update']);
    Route::get('admin/journeys/delete/{id}', [JourneysController::class, 'delete']);

//asignaturas
    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);

    //asignar clases a las materias
    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);

    //editar un solor registro
    Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);
    Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);

    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);

    //asignaturas
    Route::get('admin/headquarter/list', [HeadquartersController::class, 'list']);
    Route::get('admin/headquarter/add', [HeadquartersController::class, 'add']);
    Route::post('admin/headquarter/add', [HeadquartersController::class, 'insert']);
    Route::get('admin/headquarter/edit/{id}', [HeadquartersController::class, 'edit']);
    Route::post('admin/headquarter/edit/{id}', [HeadquartersController::class, 'update']);
    Route::get('admin/headquarter/delete/{id}', [HeadquartersController::class, 'delete']);

    // asignar asignaturas / materias programas al docente

    Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
    Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
    Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);

    //editar un solor registro
    Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']);
    Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']);

// horario de clases
    Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'list']);
    Route::get('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject']);
    Route::post('admin/class_timetable/add', [ClassTimetableController::class, 'insert_update']);

    //ruta examenes
    Route::get('admin/examinations/exam/list', [ExaminationsController::class, 'exam_list']);
    Route::get('admin/examinations/exam/add', [ExaminationsController::class, 'exam_add']);
    Route::post('admin/examinations/exam/add', [ExaminationsController::class, 'exam_insert']);
    Route::get('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_edit']);
    Route::post('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_update']);
    Route::get('admin/examinations/exam/delete/{id}', [ExaminationsController::class, 'exam_delete']);
    //ruta examenes
    Route::get('admin/examinations/exam_schedule', [ExaminationsController::class, 'exam_schedule']);
    Route::post('admin/examinations/exam_schedule_insert', [ExaminationsController::class, 'exam_schedule_insert']);

    Route::post('admin/examinations/exam_schedule/add', [ExaminationsController::class, 'exam_insert']);
    Route::get('admin/examinations/exam_schedule/edit/{id}', [ExaminationsController::class, 'exam_edit']);
    Route::post('admin/examinations/exam_schedule/edit/{id}', [ExaminationsController::class, 'exam_update']);
    Route::get('admin/examinations/exam_schedule/delete/{id}', [ExaminationsController::class, 'exam_delete']);

//registro examenes

    Route::get('admin/examinations/marks_register', [ExaminationsController::class, 'marks_register']);
    Route::post('admin/examinations/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('admin/examinations/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);

//grados academicos

    Route::get('admin/examinations/marks_grade', [ExaminationsController::class, 'marks_grade']);
    Route::get('admin/examinations/marks_grade/add', [ExaminationsController::class, 'marks_grade_add']);
    Route::post('admin/examinations/marks_grade/add', [ExaminationsController::class, 'marks_grade_insert']);
    Route::get('admin/examinations/marks_grade/edit/{id}', [ExaminationsController::class, 'marks_grade_edit']);
    Route::post('admin/examinations/marks_grade/edit/{id}', [ExaminationsController::class, 'marks_grade_update']);
    Route::get('admin/examinations/marks_grade/delete/{id}', [ExaminationsController::class, 'marks_grade_delete']);
    Route::get('admin/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);

//modulo control de asistencia
    Route::get('admin/attendance/student', [AttendanceController::class, 'AttendanceStudent']);
    Route::post('admin/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);

    Route::get('admin/attendance/report', [AttendanceController::class, 'AttendanceReport']);

    //modulo cumunicaciones  y envio correo

    Route::get('admin/communicate/notice_board', [CommunicateController::class, 'NoticeBoard']);
    Route::get('admin/communicate/notice_board/add', [CommunicateController::class, 'NoticeBoardAdd']);
    Route::post('admin/communicate/notice_board/add', [CommunicateController::class, 'NoticeBoardInsert']);
    Route::get('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'NoticeBoardEdit']);
    Route::post('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'NoticeBoardUpdate']);
    Route::get('admin/communicate/notice_board/delete/{id}', [CommunicateController::class, 'NoticeBoardDelete']);

    //send email

    Route::get('admin/communicate/send_email', [CommunicateController::class, 'SendEmail']);
    Route::post('admin/communicate/send_email', [CommunicateController::class, 'SendEmailUser']);
    Route::get('admin/communicate/search_user', [CommunicateController::class, 'SearchUser']);

//tareas
    Route::get('admin/homework/homework', [HomeworkController::class, 'homework']);
    Route::get('admin/homework/homework/add', [HomeworkController::class, 'HomeworkAdd']);
    Route::get('admin/homework/homework/edit/{id}', [HomeworkController::class, 'HomeworkEdit']);
    Route::post('admin/homework/homework/edit/{id}', [HomeworkController::class, 'HomeworkUpdate']);
    Route::get('admin/homework/homework/delete/{id}', [HomeworkController::class, 'HomeworkDelete']);

    Route::get('admin/homework/homework/submitted/{id}', [HomeworkController::class, 'submitted']);
    Route::post('admin/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject']);
    Route::post('admin/homework/homework/add', [HomeworkController::class, 'HomeworkInsert']);
    Route::get('admin/homework/report_homework', [HomeworkController::class, 'HomeworkReport']);
    //PAGOS ABONOS

    Route::get('admin/fees_collection/collect_fees', [FeesCollectionController::class, 'CollectionFees']);
    Route::get('admin/fees_collection/collect_fees_report', [FeesCollectionController::class, 'ReportCollectionFees']);
    Route::get('admin/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'CollectionFeesAdd']);
    Route::post('admin/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'CollectionFeesInsert']);

    //Setting

    Route::get('admin/setting', [UserController::class, 'Setting']);
    Route::post('admin/setting', [UserController::class, 'UpdateSetting']);


    // Blog routes for admin
    Route::get('admin/category/list', [CategoryController::class, 'list']);
    Route::get('admin/category/add', [CategoryController::class, 'add']);
    Route::post('admin/category/add', [CategoryController::class, 'insert']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

   //blog
    Route::get('admin/blog/list', [BlogController::class, 'list']);
    Route::get('admin/blog/add', [BlogController::class, 'add']);
    Route::post('admin/blog/add', [BlogController::class, 'insert']);
    Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit']);
    Route::post('admin/blog/edit/{id}', [BlogController::class, 'update']);
    Route::get('admin/blog/delete/{id}', [BlogController::class, 'delete']);
    Route::get('admin/blog/view/{id}', [BlogController::class, 'view']);


    //matriculas

     Route::get('admin/registration/list', [RegistrationController::class, 'list']);
     Route::get('admin/registration/enrolled-students', [RegistrationController::class, 'showEnrolledStudents'])->name('registrations.enrolled');
     Route::get('/enrolled-students/export', [RegistrationController::class, 'export'])->name('registrations.export');
    Route::get('admin/registration/changeStatus', [RegistrationController::class, 'changeStatus']);

    //end matriculas

});


//docente
Route::group(['middleware' => 'teacher'], function () {
    // Route::get('teacher/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
    //perfil
    Route::get('teacher/account', [UserController::class, 'MyAccount']);
    Route::post('teacher/account', [UserController::class, 'UpdateMyAccount']);
    Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']);
    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}', [ClassTimetableController::class, 'MyTimetableTeacher']);
    //listado de estudiantes
    Route::get('teacher/my_student', [StudentController::class, 'MyStudent']);
    Route::get('teacher/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetableTeacher']);
    Route::get('teacher/my_calendar', [CalendarController::class, 'MyCalendarTeacher']);
    //registro notas modulo docente
    Route::get('teacher/marks_register', [ExaminationsController::class, 'marks_register_teacher']);
    Route::get('teacher/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);
    Route::post('teacher/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('teacher/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);

//modulo control de asistencia
    Route::get('teacher/attendance/student', [AttendanceController::class, 'AttendanceStudentTeacher']);
    Route::post('teacher/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);

    Route::get('teacher/attendance/report', [AttendanceController::class, 'AttendanceReportTeacher']);

    Route::get('teacher/my_notice_board', [CommunicateController::class, 'myNoticeBoardTeacher']);

    //tareas
    Route::get('teacher/homework/homework', [HomeworkController::class, 'HomeworkTeacher']);
    Route::get('teacher/homework/homework/add', [HomeworkController::class, 'HomeworkAddTeacher']);
    Route::get('teacher/homework/homework/edit/{id}', [HomeworkController::class, 'HomeworkEditTeacher']);
    Route::post('teacher/homework/homework/edit/{id}', [HomeworkController::class, 'HomeworkUpdateTeacher']);
    Route::get('teacher/homework/homework/delete/{id}', [HomeworkController::class, 'HomeworkDeleteTeacher']);

    Route::post('teacher/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject']);

    Route::post('teacher/homework/homework/add', [HomeworkController::class, 'HomeworkInsertTeacher']);

    Route::get('teacher/homework/homework/submitted/{id}', [HomeworkController::class, 'SubmittedTeacher']);

    Route::get('teacher/homework/report_homework', [HomeworkController::class, 'HomeworkReport']);

});

//alumnos
Route::group(['middleware' => 'student'], function () {
    // Route::get('student/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);

//asignaturas
    Route::get('student/my_subject', [SubjectController::class, 'MySubject']);
    //perfil estudiante
    Route::get('student/account', [UserController::class, 'MyAccount']);
    Route::post('student/account', [UserController::class, 'UpdateMyAccountStudent']);
    //horario
    Route::get('student/my_timetable', [ClassTimetableController::class, 'MyTimetable']);
    // examenes
    Route::get('student/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetable']);
    //calendario academico
    Route::get('student/my_calendar', [CalendarController::class, 'MyCalendar']);
    Route::get('student/my_exam_result', [ExaminationsController::class, 'myExamResult']);
    Route::get('student/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);

    Route::get('student/my_attendance', [AttendanceController::class, 'myAttendanceStudent']);
    // noticias
    Route::get('student/my_notice_board', [CommunicateController::class, 'myNoticeBoardStudent']);
    //actividades
    Route::get('student/my_homework', [HomeworkController::class, 'MyHomeworkStudent']);
    Route::get('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomework']);
    Route::post('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomeworkInsert']);

    Route::get('student/my_submitted_homework', [HomeworkController::class, 'MyHomeworkSubmitedStudent']);
// pagos
    Route::get('student/my_fees_collection', [FeesCollectionController::class, 'MyCollectionFeesStudent']);

    Route::post('student/my_fees_collection', [FeesCollectionController::class, 'MyCollectionFeesStudentPayment']);
    Route::get('student/paypal/payment-error', [FeesCollectionController::class, 'PaymentError']);
    Route::get(' student/paypal/payment-success', [FeesCollectionController::class, 'PaymentSucces']);

});

// Coordinator routes
Route::group(['middleware' => 'coordinator'], function () {
    Route::get('coordinator/dashboard', [DashboardController::class, 'dashboard']);

    // Student management for coordinators
    Route::get('coordinator/student/list', [StudentController::class, 'coordinatorStudentList']);
    Route::get('coordinator/student/add', [StudentController::class, 'coordinatorStudentAdd']);
    Route::post('coordinator/student/add', [StudentController::class, 'coordinatorStudentInsert']);
    Route::get('coordinator/student/edit/{id}', [StudentController::class, 'coordinatorStudentEdit']);
    Route::post('coordinator/student/edit/{id}', [StudentController::class, 'coordinatorStudentUpdate']);
    Route::get('coordinator/student/delete/{id}', [StudentController::class, 'coordinatorStudentDelete']);

    // Fees collection for coordinators
    Route::get('coordinator/fees_collection/collect_fees', [FeesCollectionController::class, 'coordinatorCollectFees']);
    Route::post('coordinator/fees_collection/collect_fees', [FeesCollectionController::class, 'coordinatorCollectFeesSubmit']);

    Route::get('coordinator/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'CollectionFeesAdd']);
    Route::post('coordinator/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'CollectionFeesInsert']);
    // Fees collection report for coordinators
    Route::get('coordinator/fees_collection/collect_fees_report', [FeesCollectionController::class, 'ReportCollectionFees']);


    Route::get('coordinator/change_password', [UserController::class, 'change_password']);
    Route::post('coordinator/change_password', [UserController::class, 'update_change_password']);

    Route::get('coordinator/account', [UserController::class, 'MyAccount']);
    Route::post('coordinator/account', [UserController::class, 'UpdateMyAccountCoordinator']);

    Route::get('coordinator/teachers', [TeacherController::class, 'index']);
    Route::get('coordinator/students', [StudentController::class, 'index']);

    Route::get('coordinator/classes', [ClassController::class, 'index']);
    Route::get('coordinator/subjects', [SubjectController::class, 'index']);

    Route::get('coordinator/timetable', [ClassTimetableController::class, 'index']);
    Route::get('coordinator/exams', [ExaminationsController::class, 'index']);

    Route::get('coordinator/attendance', [AttendanceController::class, 'index']);
    Route::get('coordinator/homework', [HomeworkController::class, 'index']);

    Route::get('coordinator/notice_board', [CommunicateController::class, 'index']);
    Route::post('coordinator/notice_board', [CommunicateController::class, 'createNotice']);
});


//padre de familia
Route::group(['middleware' => 'parent'], function () {
    // Route::get('parent/dashboard', function () {
    //     return view('admin.dashboard');
    // });

    //Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);

    //perfil
    Route::get('parent/account', [UserController::class, 'MyAccount']);
    Route::post('parent/account', [UserController::class, 'UpdateMyAccountParent']);

    //Route::get('parent/my_student', [ParentController::class, 'myStudentParent']);

    // el padre puede ver las asignaturas de su hijo
   // Route::get('parent/my_student/subject/{student_id}', [SubjectController::class, 'ParentStudentSubject']);
    // horario de examenes
   // Route::get('parent/my_student/exam_timetable/{student_id}', [ExaminationsController::class, 'ParentMyExamTimetable']);

    //horario asignado al hijo
    //Route::get('parent/my_student/calendar/{student_id}', [CalendarController::class, 'MyCalendarParent']);
    //resultado examenes
   // Route::get('parent/my_student/exam_result/{student_id}', [ExaminationsController::class, 'ParentMyExamResult']);
    //
   // Route::get('parent/my_student/attendance/{student_id}', [AttendanceController::class, 'ParentMyAttendanceStudent']);

    //Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}', [ClassTimetableController::class, 'MyTimetableParent']);
    Route::get('parent/fees_collection/collect_fees', [FeesCollectionController::class, 'CollectionFees']);
    Route::get('parent/fees_collection/collect_fees_report', [FeesCollectionController::class, 'ReportCollectionFees']);
    Route::get('parent/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'CollectionFeesAdd']);
    Route::post('parent/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'CollectionFeesInsert']);

    Route::get('parent/my_notice_board', [CommunicateController::class, 'myNoticeBoardParent']);

   // Route::get('parent/my_student_notice_board', [CommunicateController::class, 'myNoticeBoardStudentParent']);

   // Route::get('parent/my_student/homework/{id}', [HomeworkController::class, 'HomeworkStudentParent']);

   // Route::get('parent/my_student/submitted_homework/{id}', [HomeworkController::class, 'SubmittedHomeworkStudentParent']);

});

//usuario general
Route::group(['middleware' => 'schooll'], function () {
    // Route::get('schooll/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('schooll/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);

});
