@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Abonos Clases</h1>
        </div>
        {{--  <div class="col-sm-6" style="text-align:right">
          <a href="{{ url('admin/class/add') }}" class="btn btn-primary">Nueva Clase</a>
        </div>  --}}
      </div>
    </div>
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Buscar</h3>
              </div>
              <!-- form start -->
              <form method="get" action="">

                <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="my-select">Programa</label>
                        <select name="class_id" class="form-control" name="">
                        <option value="">Seleccione un programa</option>
                            @foreach($getClass as $class)
                           <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }}
                            value="{{ $class->id }}">{{ $class->name }}</option>
                       @endforeach
                        </select>
                    </div>

                  <div class="form-group col-md-3">
                    <label>ID</label>
                    <input type="text" class="form-control"
                    value="{{ Request::get('student_id') }}"
                     placeholder="ID" name="student_id">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Nombre Estudiante</label>
                    <input type="text" class="form-control"
                    value="{{ Request::get('first_name') }}"
                     placeholder="nombre" name="first_name">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Apellido Estudiante</label>
                    <input type="text" class="form-control"
                    value="{{ Request::get('last_name') }}"
                     placeholder="apellidos" name="last_name">
                  </div>

                  <div class="form-group col-md-3">
                    <button type="submit"
                    class="btn btn-primary"
                     style="margin-top: 30px">
                    Buscar</button>
                    <a href="{{ url('admin/fees_collection/collect_fees') }}"
                    class="btn btn-success"
                     style="margin-top: 30px">Limpiar</a>
                  </div>
                </div>


                </div>

              </form>
            </div>


          </div>

        </div>
        <!-- /.row -->
            @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b> Listado de
              {{--  Clases (Total: {{  $getRecord->total() }})</b> </h3>  --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped" id="example1">
                <thead>
                  <tr>
                    <th>ID Estudiante</th>
                    <th>Estudiante</th>
                    <th>Programa</th>
                    <th>Total</th>
                    <th>Valor Pagado</th>
                    <th>Saldo</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                  <tbody>
                    @if(!empty($getRecord))
                        @forelse ($getRecord as $value )
                        @php
                            $paid_amount = $value->getPaidAmount($value->id,$value->class_id);
                             $RemaningAmount =$value->amount - $paid_amount;
                            @endphp
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }} {{ $value->last_name }}</td>
                                <td>{{ $value->class_name }} </td>
                                <td>${{number_format($value->amount,2)  }}</td>
                                <td>${{number_format($paid_amount,2)  }}</td>
                                <td>${{number_format($RemaningAmount,2)  }}</td>

                                <td>{{date('d-m-y H:i A',strtotime($value->created_at )) }}</td>
                                  <td>
                                    <a href="{{ url('admin/fees_collection/collect_fees/add_fees/'.$value->id) }}" class="btn btn-warning">Abonar</a>
                                </td>
                            </tr>
                        @empty
                          <tr>
                            <td colspan="100%">No hay datos</td>
                        </tr>
                        @endforelse
                    @else
                        <tr>
                            <td colspan="100%">No hay datos</td>
                        </tr>
                    @endif
                 </tbody>
              </table>
              <div style="padding:10px; float:right;">
                {{--  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}  --}}
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
@section('script')
<script>
 $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
