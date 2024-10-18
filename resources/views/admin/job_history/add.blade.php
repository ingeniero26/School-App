@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nuevo Historial</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Agregar Historial de Trabajo</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" enctype="multipart/form-data">
                                {{ @csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">

                                        <label for="title">Empleado</label>

                                        <select name="employee_id" id="" class="form-control">
                                            <option value="">Seleccione Empleado</option>
                                            @foreach ($getEmployee as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}
                                                    {{ $employee->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="salary">Fecha Inicio</label>
                                        <input type="date" class="form-control" value="{{ old('start_date') }}"
                                            id="start_date" name="start_date" placeholder="">
                                        <div style="color:red;">
                                            {{ $errors->first('start_date') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Fecha Fin</label>
                                        <input type="date" class="form-control" id="end_date"
                                            value="{{ old('end_date') }}" name="end_date" placeholder="">
                                        <div style="color:red;">
                                            {{ $errors->first('end_date') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Cargo</label>
                                        <select name="job_id" id="" class="form-control">
                                            <option value="">Seleccione un Puesto</option>
                                            @foreach ($getJobs as $job)
                                                <option value="{{ $job->id }}">{{ $job->job_title }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="title">Seccion</label>
                                        <select name="department_id" id="" class="form-control">
                                            <option value="">Departamento</option>
                                            <option value="0">Depto 1</option>
                                            <option value="1">Depto 2</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
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
