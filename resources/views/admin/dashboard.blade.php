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
               <h3>${{ number_format($getTotalfees,2)}}</h3>

              <p> Pagos Recibidos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('admin/fees_collection/collect_fees_report')}}" class="small-box-footer">Pagos <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-ligth">
            <div class="inner">
              <h3>${{ number_format($getTotalTodayFees,2)}}</h3>

              <p>Total Pagos Hoy</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('admin/fees_collection/collect_fees_report?start_created_date='.date('Y-m-d').'&end_created_date='.date('Y-m-d').'')}}" class="small-box-footer">Pagos <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$TotalStudent}}</h3>

              <p>Total Estudiantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('admin/student/list')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$TotalTeacher}}</h3>

              <p>Total Docentes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('admin/teacher/list')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$TotalParent}}</h3>

              <p>Total Padres</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{URL('admin/parent/list')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$TotalAdmin}}</h3>

              <p>Total Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('admin/admin/list')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #3d9970!important">
            <div class="inner">
              <h3>{{$getTotalExam}}</h3>

              <p>Total Ciclos</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-table"></i>
            </div>
            <a href="{{url('admin/examinations/exam/list')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
    

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #3d9970!important">
            <div class="inner">
              <h3>{{$getTotalClass}}</h3>

              <p>Total Programas</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-table"></i>
            </div>
            <a href="{{url('admin/class/list')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #3d9970!important">
            <div class="inner">
              <h3>{{$getTotalSubject}}</h3>

              <p>Total Asignaturas</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-table"></i>
            </div>
            <a href="{{url('admin/subject/list')}}" class="small-box-footer">Más <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
     
    </div>
  </section>

</div>
<!-- /.content-wrapper -->
@endsection
