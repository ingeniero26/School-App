@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Historial</h1>
                </div>
                <div class="col-sm-6" style="text-align:right">
                    <a href="{{ url('admin/job_history/add') }}" class="btn btn-primary">
                        Nuevo Historial
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Add your main content here -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listado de Historial de Trabajo</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Empleado</th>
                                        <th>Cargo</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Departamento</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $history)
                                        <tr>
                                            <td>{{ $history->employee->name }} {{ $history->employee->last_name }}</td>
                                            <td>{{ $history->job->job_title }}</td>
                                            <td>{{ $history->start_date }}</td>
                                            <td>{{ $history->end_date ?? 'Actual' }}</td>
                                            <td>{{ $history->department_id ? 'Depto ' . $history->department_id : 'N/A' }}</td>
                                            <td>
                                                <a href="{{ url('admin/job_history/edit/'.$history->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                                <a href="{{ url('admin/job_history/delete/'.$history->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $getRecord->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
