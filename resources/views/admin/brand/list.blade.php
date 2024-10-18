@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Marcas List</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/brand/add') }}" class="btn btn-primary">Add New Brand</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Brand</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Date</label>
                                        <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                        <a href="{{ url('admin/brand/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Brand List</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Slug</th>
                                        <th>Titule</th>
                                        <th>Descripción</th>
                                        <th>Keywords</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->slug }}</td>
                                        <td>{{ $value->meta_title }}</td>
                                        <td>{{ $value->meta_description }}</td>
                                        <td>{{ $value->meta_keywords }}</td>
                                        <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $value->created_by_name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/brand/view/'.$value->id) }}" class="btn btn-info">Detalle</a>
                                            <a href="{{ url('admin/brand/edit/'.$value->id) }}" class="btn btn-warning">Editar</a>
                                            <a href="{{ url('admin/brand/delete/'.$value->id) }}"
                                                onclick=" return confirm('Estas seguro de eliminar el registro?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
