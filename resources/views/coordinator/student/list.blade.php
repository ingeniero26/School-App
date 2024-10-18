@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Estudiantes</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('coordinator/student/add') }}" class="btn btn-primary">Agregar Nuevo Estudiante</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buscar Estudiante</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Nombre">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Apellido</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name') }}" placeholder="Apellido">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Documento</label>
                                        <input type="text" class="form-control"
                                            value="{{ Request::get('roll_number') }}" placeholder="documento"
                                            name="roll_number">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Matricula</label>
                                        <input type="text" class="form-control"
                                            value="{{ Request::get('admission_number') }}" placeholder="matricula"
                                            name="admission_number">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Programa</label>
                                        <input type="text" class="form-control" value="{{ Request::get('class') }}"
                                            placeholder="programa" name="class">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Sede</label>
                                        <input type="text" class="form-control"
                                            value="{{ Request::get('headquarter') }}" placeholder="sede"
                                            name="headquarter">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Jornada</label>
                                        <input type="text" class="form-control" value="{{ Request::get('journey') }}"
                                            placeholder="jornada" name="journey">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ Request::get('email') }}" placeholder="Enter email">

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Fecha Matricula</label>
                                        <input type="date" name="admission_date" class="form-control"
                                            value="{{ Request::get('admission_date') }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Fecha Creado</label>
                                        <input type="date" name="date" class="form-control"
                                            value="{{ Request::get('date') }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Buscar</button>
                                        <a href="{{ url('coordinator/student/list') }}" class="btn btn-success" style="margin-top: 30px;">Limpiar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Estudiantes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                <a href="{{ url('coordinator/student/edit/'.$value->id) }}" class="btn btn-primary">Editar</a>
                                                <a href="{{ url('coordinator/student/delete/'.$value->id) }}" class="btn btn-danger">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
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
