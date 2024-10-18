@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar  Empleado Nuevo</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Employee Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Enter First Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Apellidos <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required placeholder="Enter Last Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Documento <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="number_document" value="{{ old('number_document') }}" required placeholder="Enter Last Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Tipo Documento<span style="color: red"></span> </label>
                                            <select name="document_type" id="" required class="form-control">
                                                <option value="">Tipo Documento</option>
                                                <option {{ old('document_type') == 'Cedula' ? 'selected' : '' }}
                                                    value="CEDULA">CEDULA</option>
                                                <option {{ old('document_type') == 'Nit' ? 'selected' : '' }} value="Nit">Nit
                                                </option>
                                                <option {{ old('document_type') == 'Pasaporte' ? 'selected' : '' }}
                                                    value="PASAPORTE">PASAPORTE</option>
                                                <option {{ old('document_type') == 'TI' ? 'selected' : '' }}
                                                    value="PASAPORTE">TI</option>
                                                <option {{ old('document_type') == 'Otro' ? 'selected' : '' }} value="OTRO">
                                                    Otro</option>
                                            </select>
                                            <div style="color:red;">
                                                {{ $errors->first('document_type') }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Dirección <span style="color: red;">*</span></label>
                                            <textarea class="form-control" name="address" required>{{ old('address') }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Teléfono <span style="color: red;">*</span></label>
                                            <input type="number" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}"  placeholder="Enter Mobile Number">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Fecha Contrato <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" name="hire_date" value="{{ old('hire_date') }}"  placeholder="Enter Mobile Number">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Puesto<span style="color: red">*</span> </label>
                                            <select name="job_id" id="" class="form-control" required>
                                                <option value="">Seleccione un Puesto</option>
                                                @foreach ($getRecord as $job)
                                                    <option {{ old('job_id') == $job->id ? 'selected' : '' }}
                                                        value="{{ $job->id }}">{{ $job->job_title }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red;">
                                                {{ $errors->first('job_id') }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Salario<span style="color: red;">*</span></label>
                                            <input type="number" class="form-control" name="salary"
                                             value="{{ old('salary') }}"  placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>% Comision<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="commission_pct"
                                             value="{{ old('commission_pct') }}"  placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Jefe Inmediato <span style="color: red;">*</span></label>
                                            <select name="manager_id" class="form-control" required>
                                                <option value="">Seleccione un jefe</option>
                                                <option  value="1">Jefe 1</option>
                                                <option  value="2">Jefe 2</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Seccion<span style="color: red;">*</span></label>
                                            <select name="deparment_id" class="form-control" required>
                                                <option value="">Seleccione un depto</option>
                                                <option  value="1">Depto 1</option>
                                                <option  value="2">Depto 2</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Genero <span style="color: red;">*</span></label>
                                            <select name="gender" class="form-control" >
                                                <option value="">Select Genero</option>
                                                <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                                <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                                <option {{ (old('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Status <span style="color: red;">*</span></label>
                                            <select name="status" class="form-control" required>
                                                <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                                                <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>
                                    <h2 class="text-center"><b>Login Information</b></h2>
                                    <div class="form-group">
                                        <label>Email <span style="color: red;">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter Email">
                                        <div style="color:red">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span style="color: red;">*</span></label>
                                        <input type="password" class="form-control" name="password" required placeholder="Enter Password">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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

@endsection
