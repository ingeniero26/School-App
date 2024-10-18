@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Productos</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/product/add') }}" class="btn btn-primary">Agregar Nuevo Producto</a>
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
                            <h3 class="card-title">Lista de Productos</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped" id="tb_product">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>SKU</th>
                                        <th>Marca</th>
                                        <th>Medida</th>
                                        <th>Categoría</th>
                                        <th>Subcategoría</th>
                                        <th>Precio</th>
                                        <th>Precio Anterior</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->sku }}</td>
                                            <td>{{ $value->brand_name }}</td>
                                            <td>{{ $value->measure_name }}</td>
                                            <td>{{ $value->category_name }}</td>
                                            <td>{{ $value->sub_category_name }}</td>
                                            <td>{{ $value->price }}</td>
                                            <td>{{ $value->old_price }}</td>
                                            <td>{{ ($value->status == 0) ? 'Activo' : 'Inactivo' }}</td>
                                            <td>
                                                <a href="{{ url('admin/product/view/'.$value->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{ url('admin/product/edit/'.$value->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ url('admin/product/delete/'.$value->id) }}"
                                                     class="btn btn-danger"
                                                     onclick="return confirm('¿Estás seguro de eliminar este producto?')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            $("#tb_product").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "ordering": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tb_category_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
