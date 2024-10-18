@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Empleado</h1>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Información del Empleado</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" required placeholder="Ingrese Nombre">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Apellidos <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}" required placeholder="Ingrese Apellidos">
                                        </div>
                                        <!-- Add more fields as needed, similar to the add.blade.php file -->
                                        <div class="form-group col-md-6">
                                            <label>Número de Documento <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="number_document" value="{{ old('number_document', $getRecord->number_document) }}" required placeholder="Ingrese Número de Documento">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tipo de Documento <span style="color: red;">*</span></label>
                                            <select class="form-control" name="document_type" required>
                                                <option value="">Seleccione Tipo de Documento</option>
                                                <option value="Cedula" {{ old('document_type', $getRecord->document_type) == 'Cedula' ? 'selected' : '' }}>CEDULA</option>
                                                <option value="Pasaporte" {{ old('document_type', $getRecord->document_type) == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                                                <option value="Nit" {{ old('document_type', $getRecord->document_type) == 'Nit' ? 'selected' : '' }}>NIT</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Dirección</label>
                                            <input type="text" class="form-control" name="address" value="{{ old('address', $getRecord->address) }}" placeholder="Ingrese Dirección">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Teléfono Móvil</label>
                                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number) }}" placeholder="Ingrese Teléfono Móvil">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Fecha de Contratación <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" name="hire_date" value="{{ old('hire_date', $getRecord->hire_date) }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Puesto de trabajo<span style="color: red">*</span> </label>
                                            <select name="job_id" id=""
                                            class="form-control" required>
                                                <option value="">Seleccione un Salario</option>
                                            @foreach($getJob as $job)
                                             <option {{ (old('job_id',$getRecord->job_id)==$getRecord->job_id) ? 'selected' : '' }}
                                                 value="{{ $job->id }}">{{ $job->job_title }}</option>

                                                {{--  <option value="{{ $headquarter->id }}">{{ $headquarter->name }}</option>  --}}
                                            @endforeach
                                            </select>
                                         </div>

                                        <div class="form-group col-md-6">
                                            <label>Salario <span style="color: red;">*</span></label>
                                            <input type="number" step="0.01" class="form-control" name="salary" value="{{ old('salary', $getRecord->salary) }}" required placeholder="Ingrese Salario">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Comisión (%)</label>
                                            <input type="number" step="0.01" class="form-control" name="commission_pct" value="{{ old('commission_pct', $getRecord->commission_pct) }}" placeholder="Ingrese Comisión">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Género <span style="color: red;">*</span></label>
                                            <select class="form-control" name="gender" required>
                                                <option value="">Seleccione Género</option>
                                                <option value="Male" {{ old('gender', $getRecord->gender) == 'Male' ? 'selected' : '' }}>Masculino</option>
                                                <option value="Female" {{ old('gender', $getRecord->gender) == 'Female' ? 'selected' : '' }}>Femenino</option>
                                                <option value="Other" {{ old('gender', $getRecord->gender) == 'Other' ? 'selected' : '' }}>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email <span style="color: red;">*</span></label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" required placeholder="Ingrese Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Contraseña</label>
                                            <input type="password" class="form-control" name="password" placeholder="Ingrese Contraseña (dejar en blanco para mantener la actual)">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Actualizar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->


@endsection
