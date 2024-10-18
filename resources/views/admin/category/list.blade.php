@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/category/add') }}" class="btn btn-primary"> Nueva Categoria</a>
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
                            <div class="card-header">
                                <h3 class="card-title">Lista de Categorias</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped" id="tb_category">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Slug</th>
                                            <th>Titulo</th>
                                            <th>Meta Titulo</th>
                                            <th>Descripción</th>
                                            <th>Keywords</th>
                                            <th>Menú</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Usuario</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->slug }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->meta_title }}</td>
                                                <td>{{ $value->meta_description }}</td>
                                                <td>{{ $value->meta_keywords }}</td>
                                                <td>{{ $value->is_menu == 0 ? 'Si' : 'No' }}</td>
                                                <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                                                <td>{{ $value->created_by_name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/category/edit/', $value->id) }}" class="btn btn-warning">Editar</a>
                                                    <a href="{{ url('admin/category/delete/', $value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                {{ $getRecord->links() }}
                            </div>
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
            $("#tb_category").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tb_category_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
