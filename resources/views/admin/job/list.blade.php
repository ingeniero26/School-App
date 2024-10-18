@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Listado</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right">
                        <form action="{{ url('admin/jobs_export') }}" method="get">
                            <input type="hidden" name="start_date" value="{{ Request::get('start_date') }}">
                            <input type="hidden" name="end_date" value="{{ Request::get('end_date') }}">
                            <a class="btn btn-success"
                                href="{{ url('admin/jobs_export?start_date=' . Request::get('start_date') . '&end_date=' . Request::get('end_date')) }}">Excel</a>
                        </form>
                        <br><a href="{{ url('admin/job/add') }}" class="btn btn-primary">
                            Nuevo Puesto</a>
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
                                <h3 class="card-title">Search</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control"
                                                value="{{ Request::get('job_title') }}" name="job_title"
                                                placeholder="Job Title">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Min Salary</label>
                                            <input type="number" class="form-control"
                                                value="{{ Request::get('min_salary') }}" name="min_salary"
                                                placeholder="Min Salary">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Max Salary</label>
                                            <input type="number" class="form-control"
                                                value="{{ Request::get('max_salary') }}" name="max_salary"
                                                placeholder="Max Salary">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Fecha Inicio</label>
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{ Request::get('start_date') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Fecha Fin</label>
                                            <input type="date" name="end_date" class="form-control"
                                                value="{{ Request::get('end_date') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/job/list') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Listado de puestos de trabajo</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tale-responsive">
                                    <table class="table table-bordered" id="jobs">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Salario Maximo</th>
                                                <th>Salario Minimo</th>
                                                <th>Creado</th>
                                                <th>Status</th>
                                                <th style="width: 40px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->job_title }}</td>
                                                    <td>{{ $value->description }}</td>
                                                    <td>${{ number_format($value->min_salary, 2) }}</td>
                                                    <td>${{ number_format($value->max_salary, 2) }}</td>
                                                    <td>{{ $value->created_by_name }}</td>
                                                    <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/job/view/' . $value->id) }}"
                                                            class="btn btn-info btn-sm">Detalle</a>
                                                        <a href="{{ url('admin/job/edit/' . $value->id) }}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="{{ url('admin/job/delete/' . $value->id) }}"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Esta seguro de eliminar este registro?')">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
    <!-- /.content-wrapper -->
@endsection
@section('script')
<script>
 $(function () {
    $("#jobs").DataTable({
       "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
        "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#jobs_wrapper .col-md-6:eq(0)');

  });
</script>

@endsection
