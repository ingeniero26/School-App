<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Chat Notifications -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('chat') }}">
                <i class="far fa-comments"></i>
                @php
                    $chatCount = \App\Models\ChatModel::getChatChatCount(Auth::user()->id);
                @endphp
                @if ($chatCount > 0)
                    <span class="badge badge-danger navbar-badge">{{ !empty($chatCount) ? $chatCount : '' }}</span>
                @endif
            </a>
        </li>





    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="text-align: center">
        @if (!empty($getHeaderSetting->getLogo()))
            <img src="{{ $getHeaderSetting->getLogo() }}" style="width: auto; height: 60px; border-radius: 5px">
        @else
            <span class="brand-text font-weight-light"
                style="font-weight: bold !important; font-size: 20px;">SIS-NOTAS</span>
        @endif
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->getProfileDirect() }}" class="img-circle elevation-2"
                    alt="{{ Auth::user()->name }}">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                @if (Auth::user()->user_type == 1)
                    <li class="nav-header">Configuaciòn</li>

                    <li class="nav-item @if (Request::segment(2) == 'dashboard' ||
                            Request::segment(2) == 'admin' ||
                            Request::segment(2) == 'student' ||
                            Request::segment(2) == 'teacher' ||
                            Request::segment(2) == 'parent') menu-is-opening menu-open @endif">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                General
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/dashboard') }}"
                                    class="nav-link  @if (Request::segment(2) == 'dashboard') active @endif">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Panel Principal
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/admin/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'admin') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Administraciòn
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/student/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'student') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Estudiantes
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/teacher/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'teacher') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Docentes
                                    </p>
                                </a>
                            </li>
                           <li class="nav-item">
                                <a href="{{ url('admin/coordinator/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'coordinator') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Coordinadores
                                    </p>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a href="{{ url('admin/registration/enrolled-students') }}"
                                    class="nav-link  @if (Request::segment(2) == 'registration') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Matriculas
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item @if (Request::segment(2) == 'class' ||
                            Request::segment(2) == 'subject' ||
                            Request::segment(2) == 'assign_subject' ||
                            Request::segment(2) == 'assign_class_teacher' ||
                            Request::segment(2) == 'class_timetable') menu-is-opening menu-open @endif">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Académico
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ url('admin/class/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'class') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Programas / Clases
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/journeys/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'journeys') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Jornadas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/subject/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'subject') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Materias
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/assign_subject/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'assign_subject') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Asignar Materias
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/class_timetable/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'class_timetable') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Horario de Clases
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/assign_class_teacher/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'assign_class_teacher') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Modulos -Docentes
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/headquarter/list') }}"
                                    class="nav-link  @if (Request::segment(2) == 'headquarter') active @endif"">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Sedes
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>

                    <li class="nav-item @if (Request::segment(2) == 'examinations') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'examinations') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Exámenes
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item ">
                                <a href="{{ url('admin/examinations/exam/list') }}"
                                    class="nav-link  @if (Request::segment(3) == 'exam') active @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Ciclos Académicos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('admin/examinations/exam_schedule') }}"
                                    class="nav-link  @if (Request::segment(3) == 'exam_schedule')  @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Calendario Examenes
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('admin/examinations/marks_register') }}"
                                    class="nav-link  @if (Request::segment(3) == 'marks_register')  @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Registro Exámenes
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('admin/examinations/marks_grade') }}"
                                    class="nav-link  @if (Request::segment(3) == 'marks_grade')  @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Grados Académicos
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'blog') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'blog') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                Blog
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/blog/list') }}"
                                    class="nav-link @if (Request::segment(3) == 'posts') active @endif">
                                    <i class="far fa-file-alt nav-icon"></i>
                                    <p>Blog</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/category/list') }}"
                                    class="nav-link @if (Request::segment(3) == 'categories') active @endif">
                                    <i class="fas fa-folder nav-icon"></i>
                                    <p>Categorías</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/blog/comments') }}"
                                    class="nav-link @if (Request::segment(3) == 'comments') active @endif">
                                    <i class="far fa-comments nav-icon"></i>
                                    <p>Comentarios</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Asistencia
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item ">
                                <a href="{{ url('admin/attendance/student') }}"
                                    class="nav-link  @if (Request::segment(3) == 'student') active @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Listado
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('admin/attendance/report') }}"
                                    class="nav-link  @if (Request::segment(3) == 'report')  @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Reporte Asistencia
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'communicate') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'communicate') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Comunicaciones
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item ">
                                <a href="{{ url('admin/communicate/notice_board') }}"
                                    class="nav-link  @if (Request::segment(3) == 'notice_board') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Noticias
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('admin/communicate/send_email') }}"
                                    class="nav-link  @if (Request::segment(3) == 'send_email')  @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Enviar Correo
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'fees_collection') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'fees_collection') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Pagos-Cobros
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="{{ url('admin/fees_collection/collect_fees') }}"
                                    class="nav-link  @if (Request::segment(3) == 'collect_fees') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Abonos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('admin/fees_collection/collect_fees_report') }}"
                                    class="nav-link  @if (Request::segment(3) == 'collect_fees_report') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Reporte Abonos
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'expenses') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'expenses') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Egresos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="{{ url('admin/expenses/expense') }}"
                                    class="nav-link  @if (Request::segment(3) == 'expense') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Gastos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('admin/expenses/report_expense') }}"
                                    class="nav-link  @if (Request::segment(3) == 'report_expense') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Reporte de Gastos
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Tareas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item ">
                                <a href="{{ url('admin/homework/homework') }}"
                                    class="nav-link  @if (Request::segment(3) == 'homework') active @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Actividades
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('admin/homework/report_homework') }}"
                                    class="nav-link  @if (Request::segment(3) == 'report_homework')  @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Reporte
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="{{ url('admin/account') }}"
                            class="nav-link  @if (Request::segment(2) == 'account') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mi Perfil
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/setting') }}"
                            class="nav-link  @if (Request::segment(2) == 'setting') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Configuración
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/change_password') }}"
                            class="nav-link  @if (Request::segment(2) == 'change_password') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Cambiar Clave
                            </p>
                        </a>
                    </li>
                @elseif (Auth::user()->user_type == 2)
                    <li class="nav-header">Configuaciòn</li>
                    <li class="nav-item">
                        <a href="{{ url('teacher/dashboard') }}"
                            class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Panel Docentes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('teacher/my_student') }}"
                            class="nav-link @if (Request::segment(2) == 'my_student') active @endif">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Estudiantes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('teacher/my_calendar') }}"
                            class="nav-link @if (Request::segment(2) == 'my_calendar') active @endif">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mi Calendario Academico
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('teacher/my_class_subject') }}"
                            class="nav-link @if (Request::segment(2) == 'my_class_subject') active @endif">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Programas y Modulos
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('teacher/my_exam_timetable') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_exam_timetable') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mi Horario Examenes
                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ url('teacher/marks_register') }}"
                            class="nav-link  @if (Request::segment(2) == 'marks_register')  @endif">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Registro Exámenes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Asistencia
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item ">
                                <a href="{{ url('teacher/attendance/student') }}"
                                    class="nav-link  @if (Request::segment(3) == 'student') active @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Listado
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('teacher/attendance/report') }}"
                                    class="nav-link  @if (Request::segment(3) == 'report')  @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Reporte Asistencia
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('teacher/my_notice_board') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_notice_board') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mis Noticias
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Tareas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item ">
                                <a href="{{ url('teacher/homework/homework') }}"
                                    class="nav-link  @if (Request::segment(3) == 'homework') active @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Actividades
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('teacher/homework/report_homework') }}"
                                    class="nav-link  @if (Request::segment(3) == 'report_homework')  @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Reporte
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('teacher/account') }}"
                            class="nav-link  @if (Request::segment(2) == 'account') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mi Perfil
                            </p>
                        </a>
                    </li>
                    {{--  <li class="nav-item">
                        <a href="{{ url('teacher/teacher_my_timetable') }}"
                            class="nav-link  @if (Request::segment(2) == 'teacher_my_timetable') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mi Horario
                            </p>
                        </a>
                    </li>  --}}
                @elseif (Auth::user()->user_type == 3)
                    <li class="nav-header">Configuaciòn</li>
                    <li class="nav-item">
                        <a href="{{ url('student/dashboard') }}"
                            class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Panel Estudiantes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('student/my_fees_collection') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_fees_collection') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mis Pagos
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('student/my_subject') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_subject') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mis Asignaturas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('student/my_calendar') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_calendar') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Calendario Acádemico
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('student/my_timetable') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_timetable') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mi Horario
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('student/my_exam_timetable') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_exam_timetable') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mis Examenes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('student/my_exam_result') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_exam_result') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Resultado Examenes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('student/my_attendance') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_attendance') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Asistencias
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('student/my_notice_board') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_notice_board') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mis Noticias
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Tareas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item ">
                                <a href="{{ url('student/my_homework') }}"
                                    class="nav-link  @if (Request::segment(3) == 'my_homework') active @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Actividades
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('student/my_submitted_homework') }}"
                                    class="nav-link  @if (Request::segment(3) == 'my_submitted_homework') active @endif">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Actividades Enviadas
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('student/account') }}"
                            class="nav-link  @if (Request::segment(2) == 'account') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mi Perfil
                            </p>
                        </a>
                    </li>
               < @elseif (Auth::user()->user_type == 5)
                    <li class="nav-header">Configuración</li>
                    <li class="nav-item">
                        <a href="{{ url('coordinator/dashboard') }}"
                            class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Panel Coordinadores
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('coordinator/student/list') }}"
                            class="nav-link  @if (Request::segment(2) == 'student') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Estudiantes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'fees_collection') menu-is-opening menu-open @endif">
                        <a href="#"
                            class="nav-link @if (Request::segment(2) == 'fees_collection') menu-is-opening menu-open @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Pagos-Cobros
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="{{ url('coordinator/fees_collection/collect_fees') }}"
                                    class="nav-link  @if (Request::segment(3) == 'collect_fees') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Abonos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('coordinator/fees_collection/collect_fees_report') }}"
                                    class="nav-link  @if (Request::segment(3) == 'collect_fees_report') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Reporte Abonos
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('coordinator/account') }}"
                            class="nav-link  @if (Request::segment(2) == 'account') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mi Perfil
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('coordinator/my_student') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_student') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mi Estudiante
                            </p>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="{{ url('coordinator/my_student_notice_board') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_student_notice_board') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                 Estudiante con Noticias
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('coordinator/my_notice_board') }}"
                            class="nav-link  @if (Request::segment(2) == 'my_notice_board') active @endif"">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Mis Noticias
                            </p>
                        </a>
                    </li>
                @endif




                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Salir
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
