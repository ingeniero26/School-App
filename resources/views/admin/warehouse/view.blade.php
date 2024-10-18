@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $header_title }}</h1>
                </div>
                <div class="col-sm-6" style="text-align:right">
                    <a href="{{ url('admin/warehouse/list') }}" class="btn btn-primary">
                        Volver a la lista</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalles de la Bodega</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Nombre</th>
                                        <td>{{ $getRecord->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dirección</th>
                                        <td>{{ $getRecord->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Estado</th>
                                        <td>{{ $getRecord->status == 0 ? 'Activo' : 'Inactivo' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Creado por</th>
                                        <td>{{ $getRecord->created_by_name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{ url('admin/warehouse/edit/'.$getRecord->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ url('admin/warehouse/delete/'.$getRecord->id) }}" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este registro?')">Eliminar</a>
                        </div>
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
<!-- /.content-wrapper -->
@endsection
