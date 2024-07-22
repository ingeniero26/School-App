@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de Administradores</h1>
          </div>

        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            
            <div class="card card-primary">

              <form method="post" enctype="multipart/form-data">
                {{ @csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control"
                    value="{{ old('name') }}"
                     placeholder="nombre" name="name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                     name="email" required
                    class="form-control"
                    value="{{ old('email') }}"
                      placeholder="Enter email">
                      <div style="color:red;">
                         {{ $errors->first('email') }}
                        </div>
                     
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password"
                     class="form-control"
                    name="password" required
                      placeholder="Password">
                  </div>
                   <div class="form-group">
                        <label> Foto<span style="color: red"></span> </label>
                        <input type="file" name="profile_pic"  class="form-control"
                           >
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"
                  class="btn btn-primary">Registrar</button>
                </div>
              </form>
            </div>
         


          </div>
      
       
        </div>
     
      </div><!-- /.container-fluid -->
    </section>
    
  </div>

@endsection
