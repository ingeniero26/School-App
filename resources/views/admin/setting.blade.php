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
                    <div class="col-md-12">
                        @include('_message')
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <!-- form start -->
                            <form method="post" action="" enctype="multipart/form-data">
                                {{ @csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre Institucion</label>
                                                <input type="text" name="school_name" required class="form-control"
                                                    placeholder="Nombre" value="{{ $getRecord->school_name }}">
                                                <div style="color:red;">
                                                    {{ $errors->first('school_name') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <input type="text" name="exam_description" class="form-control"
                                                    placeholder="Nombre" value="{{ $getRecord->exam_description }}">
                                                <div style="color:red;">
                                                    {{ $errors->first('exam_description') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Licencia Funcionamiento</label>
                                                <input type="text" name="operating_license" class="form-control"
                                                    placeholder="Nombre" value="{{ $getRecord->operating_license }}">
                                                <div style="color:red;">
                                                    {{ $errors->first('operating_license') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Representante Legal</label>
                                                <input type="text" name="legal_representative" class="form-control"
                                                    placeholder="Nombre" value="{{ $getRecord->legal_representative }}">
                                                <div style="color:red;">
                                                    {{ $errors->first('legal_representative') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Nombre" value="{{ $getRecord->address }}">
                                                <div style="color:red;">
                                                    {{ $errors->first('address') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Teléfono</label>
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Nombre" value="{{ $getRecord->phone }}">
                                                <div style="color:red;">
                                                    {{ $errors->first('phone') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Correo comercial-Pagos</label>
                                                <input type="email" name="paypal_email" required class="form-control"
                                                    placeholder="Enter email" value="{{ $getRecord->paypal_email }}">
                                                <div style="color:red;">
                                                    {{ $errors->first('paypal_email') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Favicon Icon<span style="color: red"></span> </label>
                                                <input type="file" name="favicon_icon" class="form-control">
                                                @if (!empty($getRecord->getLogo()))
                                                    <img src="{{ $getRecord->getLogo() }}" style="width:50px;">
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Logo<span style="color: red"></span> </label>
                                                <input type="file" name="logo" class="form-control">
                                                @if (!empty($getRecord->getFavicon()))
                                                    <img src="{{ $getRecord->getFavicon() }}" style="width:50px;">
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Estado<span style="color: red"></span> </label>
                                                <input readonly type="text" name="status" class="form-control"
                                                    placeholder="Estado" value="{{ $getRecord->status }}">
                                                <div style="color:red;">
                                                    {{ $errors->first('phone') }}
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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
