@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Brand</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="post" action="{{ url('admin/brand/add') }}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="name" required placeholder="Enter brand name">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" disabled name="slug"  placeholder="Enter brand slug">
                                </div>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" placeholder="Enter meta title">
                                </div>
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" name="meta_description" placeholder="Enter description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" placeholder="Enter meta keywords">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
