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
                        <h1>Editar Blog</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')
                        <div class="card">
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    {{ @csrf_field() }}
                                    <div class="card-body">
                                        <!-- Your form fields here -->
                                    <div class="form-group">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                                        <div style="color:red;">
                                            {{ $errors->first('title') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $blog->slug) }}" required>
                                        <div style="color:red;">
                                            {{ $errors->first('slug') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Categoría</label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            <option value="">Seleccione una categoría</option>
                                            @foreach($getRecord as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color:red;">
                                            {{ $errors->first('category_id') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{!! old('description', $blog->description) !!}</textarea>
                                        <div style="color:red;">
                                            {{ $errors->first('description') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @php
                                         $tags = '';
                                             foreach($blog->getTags as $value )
                                             {
                                                 $tags .= $value->name.',';
                                             }

                                        @endphp

                                        <label for="tags">Tags</label>
                                        <input type="text" class="form-control" value="{{$tags}}" id="tags" name="tags">


                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="meta_title">Meta Título</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $blog->meta_title) }}">
                                        <div style="color:red;">
                                            {{ $errors->first('meta_title') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Descripción</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $blog->meta_description) }}</textarea>
                                        <div style="color:red;">
                                            {{ $errors->first('meta_description') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $blog->meta_keywords) }}">
                                        <div style="color:red;">
                                            {{ $errors->first('meta_keywords') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_publish">Publicar</label>
                                        <select class="form-control" id="is_publish" name="is_publish" required>
                                            <option value="1" {{ old('is_publish', $blog->is_publish) == 1 ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('is_publish', $blog->is_publish) == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                        <div style="color:red;">
                                            {{ $errors->first('is_publish') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Estado</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="0" {{ old('status', $blog->status) == 0 ? 'selected' : '' }}>Activo</option>
                                            <option value="1" {{ old('status', $blog->status) == 1 ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                        <div style="color:red;">
                                            {{ $errors->first('status') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Imagen</label>
                                        <input type="file" class="form-control"  name="image_file">
                                        @if(!empty($blog->getImage()))
                                        <img src="{{ $blog->getImage() }}"  alt="Blog Image" style="width: 100px; height: 100px;">
                                        @endif
                                        <div style="color:red;">
                                            {{ $errors->first('image') }}
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
            </div>
        </section>
    </div>
@endsection
@section('script')
<script src="{{url('public/tagsinput/bootstrap-tagsinput.js')}}"></script>
<script type="text/javascript">
 $("#tags").tagsinput('items')
</script>
@endsection
