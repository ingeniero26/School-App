@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('public/tagsinput/bootstrap-tagsinput.css') }}">

@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nuevo Blog</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/blog/list') }}" class="btn btn-primary">Atras</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Añadir Blog</h3>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="name">Titulo</label>
                                            <input type="text" name="title" class="form-control" id="name"
                                                placeholder="Enter category name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="category_id">Categoria</label>
                                            <select name="category_id" class="form-control select2" id="category_id"
                                                required>
                                                @foreach ($getRecord as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="slug">Slug</label>
                                            <input type="text" name="slug" readonly class="form-control" id="slug"
                                                placeholder="Ese genera automatico">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Imagen</label>
                                            <input type="file" name="image_file"
                                            class="form-control"
                                                >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="description">Descripción</label>
                                            <textarea id="summernote" class="form-control" name="description" placeholder="Enter description"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tags">Tags</label>
                                            <input type="text" name="tags" class="form-control" id="tags"
                                                placeholder="Enter tags" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="description">Meta Descripción</label>
                                            <textarea name="meta_description"  class="form-control" placeholder="Enter description"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name">Keywords</label>
                                            <input type="text" name="meta_keywords" class="form-control" id="name"
                                                placeholder="" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tags">Tags</label>
                                            <input type="text" name="tags"
                                             class="form-control" id="tags"
                                                placeholder="Enter tags">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="status">Publicar</label>
                                            <select name="is_publish" class="form-control" id="is_publish" required>
                                                <option value="1">Si</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status" required>
                                                <option value="0">Activo</option>
                                                <option value="1">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
<script src="{{url('public/tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $('.select2').select2()
            $('#summernote').summernote()
        });
        $("#tags").tagsinput('items')
    </script>
@endsection
