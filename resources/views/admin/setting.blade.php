@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Configuración</h1>
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
            @include('_message')
            <!-- general form elements -->
            <div class="card card-primary">

              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data">
                {{ @csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Correo comercial-Pagos</label>
                    <input type="email"
                     name="paypal_email" required
                    class="form-control"
                      placeholder="Enter email"
                      value="{{$getRecord->paypal_email}}">
                      <div style="color:red;">
                        {{ $errors->first('paypal_email') }}
                       </div>
                  </div>
                   <div class="form-group">
                            <label> Favicon Icon<span style="color: red"></span> </label>
                            <input type="file" name="favicon_icon"
                             class="form-control">
                             @if(!empty($getRecord->getLogo()))
                             <img src="{{ $getRecord->getLogo() }}" style="width:50px;" >
                             @endif
                  
                      </div>
                       <div class="form-group">
                            <label> Logo<span style="color: red"></span> </label>
                            <input type="file" name="logo"
                             class="form-control">
                            @if(!empty($getRecord->getFavicon()))
                             <img src="{{ $getRecord->getFavicon() }}" style="width:50px;" >
                             @endif
                  
                      </div>
               </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"
                  class="btn btn-primary">Guardar</button>
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
