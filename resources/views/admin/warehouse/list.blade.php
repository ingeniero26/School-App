@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de Bodegas</h1>
                </div>
                <div class="col-sm-6" style="text-align:right">
                    <a href="{{ url('admin/warehouse/add') }}" class="btn btn-primary">
                        Nueva Bodega</a>
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
                            <h3 class="card-title">Bodegas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Estado</th>
                                        <th>Creado por</th>
                                        <th style="width: 40px">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>{{ $value->status == 0 ? 'Activo' : 'Inactivo' }}</td>
                                            <td>{{ $value->created_by_name }}</td>
                                            <td>
                                                <a href="{{ url('admin/warehouse/edit/'.$value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ url('admin/warehouse/view/'.$value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>

                                                <a href="{{ url('admin/warehouse/delete/'.$value->id) }}"
                                                    class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este registro?')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">

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
