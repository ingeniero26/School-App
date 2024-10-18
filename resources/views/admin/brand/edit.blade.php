@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Marca</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="post" action="">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" required placeholder="Enter brand name">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" name="slug" value="{{ $getRecord->slug }}" required placeholder="Enter brand slug">
                                </div>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{ $getRecord->meta_title }}" placeholder="Enter meta title">
                                </div>
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" name="meta_description" placeholder="Enter description">{{ $getRecord->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" value="{{ $getRecord->meta_keywords }}" placeholder="Enter meta keywords">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                        <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
