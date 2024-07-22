@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Reportes Abonos <span style="color: blue"> (Total:{{ $getRecord->total() }}) </span> </h1>
        </div>

        {{--  <div class="col-sm-12" style="text-align:right">
        <a href=""
        class="btn btn-primary" >Reporte Abono </a>
      </div>  --}}
        <div class="col-sm-12" style="text-align:right">
      
      </div>
      </div>
    </div>
  </section>


  <!-- Main content -->
  <sec4
  tion class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        <!-- /.col -->
        <div class="col-md-12">

 			<div class="card card-default">
                    <div class="card-header">
                            <h3 class="card-title"><b>Buscar Estudiante</b></h3>
                        </div>
                        <!-- form start -->
                        <form method="get" action="">

                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-2">
                                        <label>Programa</label>
                                        <select  class="form-control select2"
                                         name="class_id">
                                            <option value="">Select</option>
                                            @foreach ($getClass as $class)
                                            <option  {{ (Request::get('class_id')==$class->id) ? 'selected' : '' }}
                                                value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                       <div class="form-group col-md-2">
                                        <label>ID Estudiante</label>
                                      <input type="text" name="student_id"
                                       class="form-control" value="{{ Request::get('student_id') }}">
                                    </div>
                                       <div class="form-group col-md-2">
                                        <label> Estudiante</label>
                                      <input type="text" name="first_name"
                                       class="form-control" value="{{ Request::get('first_name') }}">
                                    </div>
                                       <div class="form-group col-md-2">
                                        <label> Apellido</label>
                                      <input type="text" name="last_name"
                                       class="form-control" value="{{ Request::get('last_name') }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Inicio</label>
                                      <input type="date" name="start_created_date"
                                       class="form-control"
                                        value="{{ Request::get('start_created_date') }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Fin</label>
                                      <input type="date" name="end_created_date"
                                       class="form-control"
                                        value="{{ Request::get('end_created_date') }}">
                                    </div>
                                 


                                    <div class="form-group col-md-1">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 30px">
                                            Buscar</button>
                                        <a href="{{ url('admin/fees_collection/collect_fees_report') }}" class="btn btn-success"
                                            style="margin-top: 30px">Limpiar</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
          </div>

        </div>

            @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b> Listado de Abonos
              {{--  Clases (Total: {{  $getRecord->total() }})</b> </h3>  --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Estudiante ID</th>
                     <th>Estudiante</th>
                    <th>Programa</th>
                    <th>Monto Total</th>
                    <th>Monto Pagado</th>
                    <th>Saldo</th>
                    <th>Tipo</th>
                    <th>Observaciones</th>
                    <th>Usuario</th>
                    <th>Creado</th>
                  </tr>
                </thead>
                   <tbody>
                  
                        @forelse ($getRecord as $value )
                            <tr>
                                <td>{{ $value->id }}</td>
                                 <td>{{ $value->student_id }}</td>
                                <td>{{ $value->first_name }} {{ $value->last_name }} </td>
                                <td>{{ $value->class_name }} </td>
                                <td>${{number_format($value->total_amount,2)  }}</td>
                                <td>${{number_format($value->paid_amount,2)  }}</td>
                                <td>${{number_format($value->remaning_amount,2)  }}</td>
                                 <td>{{ $value->payment_type }} </td>
                                 <td>{{ $value->remark }} </td>
                                 <td>{{ $value->created_by_name }} </td>
                                <td>{{date('d-m-y H:i A',strtotime($value->created_at )) }}</td>

                            </tr>
                        @empty
                          <tr>
                            <td colspan="100%">No hay datos</td>
                        </tr>
                        @endforelse
                   
                 </tbody>
                
              </table>
              <div style="padding:10px; float:right;">
                {{--  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}  --}}
                </div>
            </div>
            <!-- /.card-body -->
          </div>

        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

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
