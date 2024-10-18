@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Estudiante</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editar Información del Estudiante</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post"  enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Nombre <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" required placeholder="Ingrese nombre">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Apellido <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}" required placeholder="Ingrese apellido">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tipo de Documento <span style="color: red;">*</span></label>
                                        <select class="form-control" name="document_type" required>
                                            <option value="">Seleccione tipo de documento</option>
                                            <option {{ old('document_type', $getRecord->document_type) == 'CC' ? 'selected' : '' }} value="CC">Cédula de Ciudadanía</option>
                                            <option {{ old('document_type', $getRecord->document_type) == 'TI' ? 'selected' : '' }} value="TI">Tarjeta de Identidad</option>
                                            <option {{ old('document_type', $getRecord->document_type) == 'CE' ? 'selected' : '' }} value="CE">Cédula de Extranjería</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Número de Documento <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number', $getRecord->roll_number) }}" required placeholder="Ingrese número de documento">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email <span style="color: red;">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" required placeholder="Ingrese email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" name="password" placeholder="Ingrese nueva contraseña (dejar en blanco para mantener la actual)">
                                    </div>
                                    <!-- Add more fields as needed -->
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
