@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ver Marca</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <p>{{ $getRecord->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Slug:</label>
                                        <p>{{ $getRecord->slug }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <p>{{ ($getRecord->status == 0) ? 'Active' : 'Inactive' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title:</label>
                                        <p>{{ $getRecord->meta_title }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción:</label>
                                        <p>{{ $getRecord->meta_description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Keywords:</label>
                                        <p>{{ $getRecord->meta_keywords }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Created By:</label>
                                        <p>{{ $getRecord->created_by_name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Created Date:</label>
                                        <p>{{ date('d-m-Y', strtotime($getRecord->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('admin/brand/list') }}" class="btn btn-primary">Back to List</a>
                            <a href="{{ url('admin/brand/edit/'.$getRecord->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
