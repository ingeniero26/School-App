@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Agregar Medida</h1>
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
              <h3 class="card-title">Agregar Nueva Medida</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" name="name" required placeholder="Ingrese nombre de la medida">
                </div>
                <div class="form-group">
                  <label>Abreviatura</label>
                  <input type="text" class="form-control" name="abbreviation" required placeholder="Ingrese abreviatura de la medida">
                </div>
                <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" name="status">
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
