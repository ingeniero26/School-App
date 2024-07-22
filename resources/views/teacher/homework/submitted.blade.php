@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Actividades Recividas-Docente</h1>
        </div>
        {{--  <div class="col-sm-6" style="text-align:right">
          <a href="{{ url('admin/homework/homework/add') }}" class="btn btn-primary">Nueva Actividad</a>
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
                        <label>Nombres</label>
                        <input type="text"
                        name="first_name"
                        class="form-control"
                        value="{{ Request::get('first_name') }}"
                        >
                    </div>
                    <div class="form-group col-md-2">
                        <label>Apellidos</label>
                        <input type="text"
                        name="last_name"
                        class="form-control"
                        value="{{ Request::get('last_name') }}"
                        >
                    </div>
                     <div class="form-group col-md-2">
                        <label>Fecha Creada Inicio</label>
                        <input type="date"
                        name="from_created_date"
                        class="form-control"
                        value="{{ Request::get('from_created_date') }}"
                        >
                    </div>
                     <div class="form-group col-md-2">
                        <label>Fecha Creada Fin</label>
                        <input type="date"
                        name="to_created_date"
                        class="form-control"
                        value="{{ Request::get('to_created_date') }}"
                        >
                    </div>


                    <div class="form-group col-md-3">
                        <button type="submit"
                        class="btn btn-primary"
                        style="margin-top: 30px">
                        Buscar</button>
                        <a href="{{ url('teacher/homework/homework/submitted/'.$homework_id) }}"
                        class="btn btn-success"
                        style="margin-top: 30px">Limpiar</a>
                    </div>
                    </div>


                    </div>

                </form>
                </div>
            </div>

            @include('_message')
            <div class="col-md-12">
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
                        <th>Estudiante</th>
                        <th>Documento</th>
                        <th>Descripción</th>
                        <th>Fecha Creado</th>


                    </tr>
                    </thead>
                    <tbody>
                    @forelse($getRecord as $value)
                      <tr>
                                <td>{{$value->id  }}</td>
                                <td>{{$value->first_name  }} {{$value->last_name  }}</td>

                                    <td>
                                        @if(!empty($value->getDocument()))
                                            <a href="{{ $value->getDocument() }}"
                                            class="btn btn-primary" download="">Descargar</a>
                                        @endif

                                    </td>
                                    <td>{!! $value->description  !!} </td>
                                   <td>{{date('d-m-y H:i A',strtotime($value->created_at )) }}</td>


                            </td>

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

  <script>

</script>
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
        "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

@endsection
