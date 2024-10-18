@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de Clases</h1>
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
              <form method="post">
                {{ @csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nombre Prorama</label>
                    <input type="text" class="form-control"
                    placeholder="nombre clase" name="name">
                  </div>
                  <div class="form-group">
                    <label>Sede</label>
                    <select name="headquater_id" id="ChangeHeadquarter" class="form-control">
                        <option value="">Selecciona una sede</option>
                        @foreach($getHeadquarter as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Tipo de Programa</label>
                    <select name="program_type" id="ChangeProgramType" class="form-control">
                        <option value="">Selecciona un tipo de programa</option>
                        <option value="1">Curso Corto</option>
                        <option value="2">Intermedio</option>
                        <option value="3">Tecnico</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Ingresa el valor($)</label>
                    <input type="number"
                     name="amount" required
                    class="form-control"
                    placeholder="Valor">

                  </div>

                  <div class="form-group">
                    <label>Estado</label>
                    <select name="status" id="" class="form-control">
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"
                  class="btn btn-primary">Registrar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->



          </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
