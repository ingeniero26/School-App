@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Categorias</h1>
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
                                        <label>Nombre Categoria</label>
                                        <input type="text" class="form-control" placeholder="nombre clase" name="name"
                                            value="{{ $getRecord->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" class="form-control" placeholder="nombre clase" name="title"
                                            value="{{ $getRecord->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Titulo</label>
                                        <input type="text" class="form-control" placeholder="nombre clase" name="meta_title"
                                            value="{{ $getRecord->meta_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Descripción</label>
                                        <textarea name="meta_description"
                                        class="form-control" id="meta_description" value="{{ $getRecord->meta_description }}" placeholder="Enter meta description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ $getRecord->meta_keywords }}" name="meta_keywords" placeholder="Enter meta keywords" required>
                                    </div>



                                    <div class="form-group">
                                        <label>Menu </label>
                                        <select name="is_menu" id="" class="form-control">
                                            <option {{ $getRecord->is_menu == 0 ? 'selected' : '' }} value="0">No
                                            </option>
                                            <option {{ $getRecord->is_menu == 1 ? 'selected' : '' }} value="1">Si
                                            </option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select name="status" id="" class="form-control">
                                            <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">Activo
                                            </option>
                                            <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">Inactivo
                                            </option>
                                        </select>

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
