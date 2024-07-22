@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Administración</h1>
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
          <div class="small-box bg-info">
            <div class="inner">
               <h3>${{ number_format($getTotalPaidAmount,2)}}</h3>

              <p> Mis Pagos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('student/my_fees_collection')}}" class="small-box-footer">Pagos <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$getTotalSubject}}</h3>

              <p>Total Asignaturas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('student/my_subject')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$getTotalNotice}}</h3>

              <p>Mis Noticias</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('student/my_notice_board')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$getTotalHommework}}</h3>

              <p>Mis Actividades</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('student/my_homework')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$getSubmitedHommework}}</h3>

              <p>Mis Tareas Enviadas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('student/my_submitted_homework')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$getAttendance}}</h3>

              <p>Mis Asistencias</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('student/my_attendance')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      
    </div>
     
    </div>
  </section>

</div>
<!-- /.content-wrapper -->
@endsection
