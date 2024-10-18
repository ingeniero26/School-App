@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Color</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/color/list') }}" class="btn btn-primary">Volver</a>
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
                            <form method="post" action="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nombre del Color</label>
                                        <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" required placeholder="Ingrese el nombre del color">
                                    </div>
                                    <div class="form-group">
                                        <label>Código del Color</label>
                                        <input type="color" class="form-control" name="code" value="{{ $getRecord->code }}" required placeholder="Ingrese el código del color">
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control" name="status">
                                            <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Activo</option>
                                            <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactivo</option>
                                        </select>
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
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
