<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailUserMail;
use App\Models\NoticeBoardMessageModel;
use App\Models\NoticeBoardModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class CommunicateController extends Controller
{
    //SendEmail
    public function SendEmail()
    {

        $data['header_title'] = 'Enviar Correo';
        return view('admin.communicate.send_email', $data);
    }

    public function SearchUser(Request $request)
    {
        $json = array();
        if (!empty($request->search)) {
            $getUser = User::SearchUser($request->search);
            foreach ($getUser as $value) {
                $type = '';
                if ($value->user_type == 1) {
                    $type = 'Admin';

                } else if ($value->user_type == 2) {
                    $type = 'Docente';

                } else if ($value->user_type == 3) {
                    $type = 'Estudiante';

                } else if ($value->user_type == 4) {
                    $type = 'Padre';

                }

                $name = $value->name . ' ' . $value->last_name . ' - ' . $type;
                $json[] = ['id' => $value->id, 'text' => $name];
            }
        }
        echo json_encode($json);
    }

    public function SendEmailUser(Request $request)
    {
        if (!empty($request->user_id)) {
            $user = User::getSingle($request->user_id);
            $user->send_message = $request->message;
            $user->send_subject = $request->subject;
            Mail::to($user->email)->send(new SendEmailUserMail($user));

        }

        if (!empty($request->message_to)) {
            foreach ($request->message_to as $user_type) {
                $getUser = User::getUser($user_type);
                foreach ($getUser as $user) {
                    $user->send_message = $request->message;
                    $user->send_subject = $request->subject;
                    // $user->save();
                    Mail::to($user->email)->send(new SendEmailUserMail($user));

                }
            }
        }

        return redirect()->back()->with('success', 'Mensaje enviado con exito');

    }

    public function NoticeBoard()
    {
        $data['getRecord'] = NoticeBoardModel::getRecord();
        $data['header_title'] = 'Noticias';
        return view('admin.communicate.noticebaord.list', $data);
    }

    public function NoticeBoardAdd()
    {

        $data['header_title'] = 'Add Noticia';
        return view('admin.communicate.noticebaord.add', $data);
    }

    public function NoticeBoardInsert(Request $request)
    {
        $save = new NoticeBoardModel;
        $save->title = $request->title;
        $save->notice_date = $request->notice_date;
        $save->publish_date = $request->publish_date;
        $save->message = $request->message;
        $save->created_by = Auth::user()->id;

        $save->save();

        if (!empty($request->message_to)) {
            foreach ($request->message_to as $message_to) {
                $message = new NoticeBoardMessageModel;
                $message->notice_board_id = $save->id;
                $message->message_to = $message_to;
                $message->save();
            }
        }

        return redirect('admin/communicate/notice_board')->with('success', 'Noticia agregado al sistema');
    }

    public function NoticeBoardEdit($id)
    {
        $data['getRecord'] = NoticeBoardModel::getSingle($id);

        $data['header_title'] = 'Editar Noticia';
        return view('admin.communicate.noticebaord.edit', $data);
    }

    public function NoticeBoardUpdate($id, Request $request)
    {
        $save = NoticeBoardModel::getSingle($id);
        $save->title = $request->title;
        $save->notice_date = $request->notice_date;
        $save->publish_date = $request->publish_date;
        $save->message = $request->message;

        $save->save();

        NoticeBoardMessageModel::DeletedRecord($id);

        if (!empty($request->message_to)) {
            foreach ($request->message_to as $message_to) {
                $message = new NoticeBoardMessageModel;
                $message->notice_board_id = $save->id;
                $message->message_to = $message_to;
                $message->save();
            }
        }

        return redirect('admin/communicate/notice_board')->with('success', 'Noticia editada');
    }

    public function NoticeBoardDelete($id)
    {
        $save = NoticeBoardModel::getSingle($id);
        $save->delete();
        NoticeBoardMessageModel::DeletedRecord($id);
        return redirect('admin/communicate/notice_board')->with('success', 'Noticia eliminado con exito');

    }

    //estudiantes modulo noticias
    public function myNoticeBoardStudent()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $data['header_title'] = 'Mis Noticias';
        return view('student.my_notice_baord', $data);

    }
    //estudiantes modulo noticias
    public function myNoticeBoardTeacher()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $data['header_title'] = 'Mis Noticias';
        return view('teacher.my_notice_baord', $data);

    }
    //parent modulo noticias
    public function myNoticeBoardParent()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $data['header_title'] = 'Mis Noticias';
        return view('parent.my_notice_baord', $data);

    }
    public function myNoticeBoardStudentParent()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(3);
        $data['header_title'] = 'Mis Noticias';
        return view('parent.my_student_notice_baord', $data);

    }
}