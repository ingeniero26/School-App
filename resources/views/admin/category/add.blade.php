@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nueva Categoria</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/category/list') }}" class="btn btn-primary">Back to Category List</a>
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
                                <h3 class="card-title">Add Category</h3>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Titulo</label>
                                        <input type="text" name="title" class="form-control" id="name" placeholder="Enter category name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Meta Titulo</label>
                                        <input type="text" name="meta_title" class="form-control" id="name" placeholder="Enter category name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Descripción</label>
                                        <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Enter meta description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Enter meta keywords" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Menu</label>
                                        <select name="is_menu" class="form-control" id="status" required>
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" id="status" required>
                                            <option value="0">Active</option>
                                            <option value="1">Inactive</option>
                                        </select>
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
