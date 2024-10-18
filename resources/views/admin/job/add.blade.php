@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar Trabajo</h1>
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
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Detalles del Trabajo</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" enctype="multipart/form-data">
                                {{ @csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Título del Trabajo</label>
                                        <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Ingrese el título del trabajo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Ingrese la descripción del trabajo" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="salary">Salario Minimo</label>
                                        <input type="number" class="form-control" id="min_salary" name="min_salary" placeholder="Ingrese el salario ofrecido">
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Salario Maximo</label>
                                        <input type="number" class="form-control" id="max_salary" name="max_salary" placeholder="Ingrese el salario ofrecido">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Estado</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
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
