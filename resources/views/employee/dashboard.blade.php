@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Administración Empleado</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                {{-- <h3>{{$TotalStudent}}</h3> --}}

                <p>Total Estudiantes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('teacher/my_student')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #3d9970!important">
              <div class="inner">
                {{-- <h3>{{$getTotalClass}}</h3> --}}

                <p>Total Programas</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-table"></i>
              </div>
              <a href="{{url('teacher/my_class_subject')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #68DEEC!important">
              <div class="inner">
                {{-- <h3>{{$getTotalSubject}}</h3> --}}

                <p>Total Asignaturas</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-table"></i>
              </div>
              <a href="{{url('teacher/my_exam_timetable')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #F3D1CA!important">
              <div class="inner">
                {{-- <h3>{{$getTotalNotice}}</h3> --}}

                <p>Total Noticias</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-table"></i>
              </div>
              <a href="{{url('teacher/my_notice_board')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      </div>


      </div>

    </div>
  </section>

</div>
<!-- /.content-wrapper -->
@endsection
