@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Listado de Blogs</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/blog/add') }}"
                        class="btn btn-primary"> <i class=""></i>Nuevo</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Buscar Blogs</h3>
                            </div>

                            <form method="get" action="{{ url('admin/blog/list') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Título</label>
                                            <input type="text" class="form-control" value="{{ Request::get('title') }}"
                                                placeholder="Título" name="title">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Categoria</label>
                                            <input type="text" class="form-control" value="{{ Request::get('category') }}"
                                                placeholder="category" name="category">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Usuario</label>
                                            <input type="text" class="form-control" value="{{ Request::get('username') }}"
                                                placeholder="Usuario" name="username">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Estado</label>
                                            <select class="form-control" name="status">
                                                <option value="">Seleccione Estado</option>
                                                <option value="0" {{ Request::get('status') == '0' ? 'selected' : '' }}>Activo</option>
                                                <option value="1" {{ Request::get('status') == '1' ? 'selected' : '' }}>Inactivo</option>
                                            </select>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label>Fecha</label>
                                            <input type="date" name="date" class="form-control"
                                                value="{{ Request::get('date') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary" style="margin-top: 30px">
                                                Buscar</button>
                                            <a href="{{ url('admin/blog/list') }}" class="btn btn-success"
                                                style="margin-top: 30px">Limpiar</a>
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
                                <h3 class="card-title">Lista de Blog</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped" id="tb_blog">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Slug</th>
                                            <th>Categoria</th>
                                            <th>Descripción</th>

                                            <th>Keywords</th>
                                            <th>Publicado</th>
                                            <th>Foto</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Usuario</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @forelse($getRecord as $value)
                                             <tr>
                                                 <td>{{ $loop->iteration }}</td>
                                                 <td>{{ $value->title }}</td>
                                                 <td>{{ $value->slug }}</td>
                                                 <td>{{ $value->category_name }}</td>
                                                 <td>{!! $value->description !!}</td>

                                                 <td>{{ $value->meta_keywords }}</td>
                                                 <td>{{ $value->is_publish == 1 ? 'Si' : 'No' }}</td>
                                                 <td>
                                                    @if(!empty($value->getImage()))
                                                    <img src="{{ $value->getImage() }}"
                                                    @endif
                                                    alt="Blog Image" style="width: 100px; height: 100px;">
                                                </td>
                                                 <td>{{ $value->status == 0 ? 'Activo' : 'Inactivo' }}</td>
                                                 <td>{{ $value->created_by_name }}</td>
                                                 <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                 <td>
                                                     <a href="{{ url('admin/blog/view/', $value->id) }}" class="btn btn-info">Ver</a>
                                                     <a href="{{ url('admin/blog/edit/', $value->id) }}" class="btn btn-warning">Editar</a>
                                                     <a href="{{ url('admin/blog/delete/', $value->id) }}" class="btn btn-danger" onclick="return confirm('Desea eliminar este registro?')">Eliminar</a>
                                                 </td>
                                             </tr>
                                         @empty
                                             <tr>
                                                 <td colspan="11" class="text-center">No records found.</td>
                                             </tr>
                                         @endforelse

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
            $("#tb_blog").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tb_blog_wrapper .col-md-6:eq(0)');
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

