@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lista de Colores</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/color/add') }}" class="btn btn-primary">Agregar Nuevo Color</a>
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
                                <h3 class="card-title">Buscar Color</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ Request::get('name') }}" placeholder="Nombre del Color">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Código</label>
                                            <input type="text" class="form-control" name="code"
                                                value="{{ Request::get('code') }}" placeholder="Código del Color">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Buscar</button>
                                            <a href="{{ url('admin/color/list') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reiniciar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista de Colores</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped" id="tb_color">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Código</th>
                                            <th>Estado</th>
                                            <th>Creado Por</th>
                                            <th>Creado El</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->code }}</td>
                                                <td>{{ $value->status == 0 ? 'Activo' : 'Inactivo' }}</td>
                                                <td>{{ $value->created_by_name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/color/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Editar</a>
                                                    <a href="{{ url('admin/color/delete/' . $value->id) }}"
                                                        class="btn btn-danger">Eliminar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
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
            $("#tb_color").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "ordering": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tb_color_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
