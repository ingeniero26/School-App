@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mis Actividades Enviadas</h1>
        </div>
        {{--  <div class="col-sm-6" style="text-align:right">
          <a href="{{ url('student/homework/homework/add') }}" class="btn btn-primary">Nueva Actividad</a>
        </div>  --}}
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
             <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Buscar</h3>
                </div>

                <form method="get" action="">

                    <div class="card-body">
                    <div class="row">

                    <div class="form-group col-md-2">
                        <label>Programa</label>
                        <input type="text"
                        name="class_name"
                        class="form-control"
                        value="{{ Request::get('class_name') }}"
                        placeholder="Enter ">

                    </div>
                    <div class="form-group col-md-2">
                        <label>Asignatura</label>
                        <input type="text"
                        name="subject_name"
                        class="form-control"
                        value="{{ Request::get('subject_name') }}"
                        placeholder="Enter ">

                    </div>
                    <div class="form-group col-md-2">
                        <label>Fecha Creada Inicio</label>
                        <input type="date"
                        name="from_homework_date"
                        class="form-control"
                        value="{{ Request::get('from_homework_date') }}"
                        >
                    </div>
                     <div class="form-group col-md-2">
                        <label>Fecha Creada Fin</label>
                        <input type="date"
                        name="to_homework_date"
                        class="form-control"
                        value="{{ Request::get('to_homework_date') }}"
                        >
                    </div>
                    <div class="form-group col-md-2">
                        <label>Fecha Entrega Inicio</label>
                        <input type="date"
                        name="from_submission_date"
                        class="form-control"
                        value="{{ Request::get('from_submission_date') }}"
                        >
                    </div>
                     <div class="form-group col-md-2">
                        <label>Fecha Entrega Fin</label>
                        <input type="date"
                        name="to_submission_date"
                        class="form-control"
                        value="{{ Request::get('to_submission_date') }}"
                        >
                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit"
                        class="btn btn-primary"
                        style="margin-top: 30px">
                        Buscar</button>
                        <a href="{{ url('student/my_submit_homework') }}"
                        class="btn btn-success"
                        style="margin-top: 30px">Limpiar</a>
                    </div>
                    </div>


                    </div>

                </form>
                </div>
            </div>


            <div class="col-md-12">
                 @include('_message')
                <div class="card">
                <div class="card-header">
                <h3 class="card-title">Listado de Actividades
                {{--  Administradores (Total: {{  $getRecord->total() }})</h3>  --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <table id="example1" class="table  table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Programa</th>
                        <th>Asignatura</th>
                        <th>Fecha Tarea</th>
                        <th>Fecha Entrega</th>
                        <th>Documento </th>
                        <th>Descripción</th>
                        <th>Creado</th>

                         <th>Documento Enviado</th>
                        <th>Descripción Enviada</th>
                        <th>Fecha Envio</th>


                    </tr>
                    </thead>
                        <tbody>
                    @forelse($getRecord as $value)
                        <tr>
                                <td>{{$value->id  }}</td>
                                <td>{{$value->class_name  }}</td>
                                <td>{{$value->subject_name  }}</td>
                                <td>{{date('d-m-Y',strtotime($value->getHomework->homework_date )) }}</td>
                                <td>{{date('d-m-Y',strtotime($value->getHomework->submission_date )) }}</td>

                                    <td>
                                        @if(!empty($value->getHomework->getDocument()))
                                            <a href="{{ $value->getHomework->getDocument() }}"
                                            class="btn btn-primary" download="">Descargar</a>
                                        @endif

                                    </td>

                            </td>
                                <td>{!! $value->getHomework->description   !!} </td>

                                <td>{{date('d-m-y H:i A',strtotime($value->getHomework->created_at )) }}</td>

                                 <td>
                                        @if(!empty($value->getDocument()))
                                            <a href="{{ $value->getDocument() }}"
                                            class="btn btn-primary" download="">Descargar</a>
                                        @endif

                                    </td>

                            </td>
                                <td>{!! $value->description   !!} </td>

                                <td>{{date('d-m-y H:i A',strtotime($value->created_at )) }}</td>


                            </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">No hay datos</td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>

                </div>

            </div>
            </div>


        </div>

      </div>

    </div>
  </section>


</div>
@endsection


@section('script')
<script>
 $(function () {
    $("#example1").DataTable({
       "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
        "responsive": true,
         "lengthChange": false,
          "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

@endsection
