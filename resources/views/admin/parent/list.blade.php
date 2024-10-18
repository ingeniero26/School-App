@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Listado de Coordinadores</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right">
                        <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Nuevo Coordinador</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Buscar</h3>
                            </div>
                            <!-- form start -->
                            <form method="get" action="">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" value="{{ Request::get('name') }}"
                                                placeholder="nombre" name="name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Apelidos</label>
                                            <input type="text" class="form-control"
                                                value="{{ Request::get('last_name') }}" placeholder="apellido"
                                                name="last_name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Documento</label>
                                            <input type="text" class="form-control"
                                                value="{{ Request::get('roll_number') }}" placeholder="documento"
                                                name="roll_number">
                                        </div>



                                        <div class="form-group col-md-2">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control"
                                                value="{{ Request::get('email') }}" placeholder="Enter email">

                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Fecha Creado</label>
                                            <input type="date" name="date" class="form-control"
                                                value="{{ Request::get('date') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary" style="margin-top: 30px">
                                                Buscar</button>
                                            <a href="{{ url('admin/parent/list') }}" class="btn btn-success"
                                                style="margin-top: 30px">Limpiar</a>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card -->

                        <!-- general form elements -->



                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
                @include('_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de
                            Estudiantes (Total: {{ $getRecord->total() }})</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0" style="overflow: auto;">
                        <div class="table-responsive">
                            <table class="table table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Tipo Documento</th>
                                        <th>No Documento</th>
                                        <th>Email</th>
                                        <th>Genero</th>
                                        <th>Foto</th>

                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Ocupación</th>


                                        <th>Creado</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->last_name }}</td>
                                            <td>{{ $value->document_type }}</td>
                                            <td>{{ $value->roll_number }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->gender }}</td>
                                            <td>
                                                @if (!empty($value->getProfileDirect()))
                                                    <img src="{{ $value->getProfileDirect() }}" class="img-fluid"
                                                        style="height: 50px; width: 50px; border-radius: 50px">
                                                @endif

                                            </td>
                                            <td>{{ $value->address }}</td>
                                            <td>{{ $value->mobile_number }}</td>
                                            <td>{{ $value->occupation }}</td>

                                            <td>{{ date('d-m-y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/parent/edit/' . $value->id) }}"
                                                    class="btn btn-warning">Editar</a>
                                                <a href="{{ url('admin/parent/delete/' . $value->id) }}"
                                                    class="btn btn-danger">Eliminar</a>
                                                <!--<a href="{{ url('admin/parent/my-student/' . $value->id) }}"
                                                    class="btn btn-success">Estudiante</a>-->
                                                <a href="{{ url('chat?receiver_id=' . base64_encode($value->id)) }}"
                                                    class="btn btn-success">Mensaje</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <div style="padding:10px; float:right;">

                            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
    </div>

    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(function() {
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
