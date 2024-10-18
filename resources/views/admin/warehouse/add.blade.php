@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar Bodega</h1>
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
                                <h3 class="card-title">Detalles de la Bodega</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" enctype="multipart/form-data">
                                {{ @csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nombre de la Bodega</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre de la bodega" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Dirección</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Ingrese la dirección de la bodega" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Estado</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="0">Activo</option>
                                            <option value="1">Inactivo</option>
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
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
