@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edición de Trabajo</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <div class="card-body">
                                <!-- Add your form fields here -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Nombre del Trabajo <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="job_title" value="{{ old('job_title', $getRecord->job_title) }}" required placeholder="Nombre del trabajo">
                                        <div style="color:red;">
                                            {{ $errors->first('job_title') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Descripción <span style="color: red">*</span></label>
                                        <textarea class="form-control" name="description"
                                         placeholder="Descripción del trabajo">{{ old('description', $getRecord->description) }}</textarea>
                                        <div style="color:red;">
                                            {{ $errors->first('description') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Salario minimo <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="min_salary"
                                         value="{{ old('min_salary', $getRecord->min_salary) }}"  placeholder="">
                                        <div style="color:red;">
                                            {{ $errors->first('min_salary') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Salario Maximo <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="max_salary"
                                         value="{{ old('max_salary', $getRecord->max_salary) }}"  placeholder="">
                                        <div style="color:red;">
                                            {{ $errors->first('max_salary') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Estado</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', $getRecord->status) == 1 ? 'selected' : '' }}>Activo</option>
                                            <option value="0" {{ old('status', $getRecord->status) == 0 ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
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
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
