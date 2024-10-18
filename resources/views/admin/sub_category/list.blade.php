@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Category Listado</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/sub_category/add') }}" class="btn btn-primary">Add New Sub Category</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Search</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Category</label>
                                        <input type="text" class="form-control" name="category" value="{{ Request::get('category') }}" placeholder="Category">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Date">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                        <a href="{{ url('admin/sub_category/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sub Category List</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped" id="tb_subcategory">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Slug</th>
                                        <th>Categoria</th>
                                        <th>Titulo</th>
                                        <th>Descripción</th>
                                        <th>Keywords</th>
                                        <th>Estado</th>
                                        <th>Usuario</th>
                                        <th>Fecha</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->slug }}</td>
                                            <td>{{ $value->category_name }}</td>
                                            <td>{{ $value->meta_title }}</td>
                                            <td>{{ $value->meta_description }}</td>
                                            <td>{{ $value->meta_keywords}}</td>
                                            <td>{{ ($value->status == 0) ? 'Activo' : 'Inactivo' }}</td>
                                            <td>{{ $value->created_by_name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/sub_category/edit/'.$value->id) }}" class="btn btn-warning">Editar</a>
                                                <a href="{{ url('admin/sub_category/delete/'.$value->id) }}"
                                                     class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar este registro?')">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="padding: 10px; float: right;">
                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@section('script')
    <script>
        $(function() {
            $("#tb_subcategory").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "ordering": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tb_subcategory_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
