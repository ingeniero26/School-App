@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar de Administradores</h1>
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
              <form method="post" action="" enctype="multipart/form-data">
                {{ @csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control"
                     placeholder="nombre"
                      name="name" value="{{ old('name',$getRecord->name)}} " >
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                     name="email" required
                    class="form-control"
                      placeholder="Enter email"
                      value="{{ old('email',$getRecord->email) }}">
                      <div style="color:red;">
                        {{ $errors->first('email') }}
                       </div>
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="text"
                     class="form-control"
                    name="password"
                      placeholder="Password">
                      <p> <span style="color: red;">Digite un nueva clave, si desea actualizar</span></p>
                  </div>
                       <div class="form-group">
                            <label> Foto<span style="color: red"></span> </label>
                            <input type="file" name="profile_pic"
                             class="form-control">
                             @if(!empty($getRecord->getProfile()))
                             <img src="{{ $getRecord->getProfile() }}" style="width:100px;" >
                             @endif
                      </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"
                  class="btn btn-warning">Editar</button>
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
