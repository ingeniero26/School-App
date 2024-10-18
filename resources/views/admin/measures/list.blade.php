@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listado Medidas</h1>
        </div>
        <div class="col-sm-6" style="text-align:right">
          <a href="{{ url('admin/measures/add') }}" class="btn btn-primary">Nueva Medida</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>Listado de Medidas (Total: {{ $getRecord->total() }})</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Estado</th>
                    <th>Usuario</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->abbreviation }}</td>
                      <td>
                        @if($value->status == 0)
                          Activo
                        @else
                          Inactivo
                        @endif
                      </td>
                      <td>{{ $value->created_by_name }}</td>
                      <td>{{ date('d-m-y H:i A', strtotime($value->created_at)) }}</td>
                      <td>
                        <a href="{{ url('admin/measures/view/'.$value->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ url('admin/measures/edit/'.$value->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ url('admin/measures/delete/'.$value->id) }}"
                             class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar este registro?')">Eliminar</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div style="padding:10px; float:right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection
