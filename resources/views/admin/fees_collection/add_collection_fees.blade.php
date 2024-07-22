@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Abonos Clases <span style="color: blue">({{ $getStudent->name }} {{ $getStudent->last_name }})</span></h1>
        </div>

        {{--  <div class="col-sm-12" style="text-align:right">
        <a href=""
        class="btn btn-primary" >Agregar Abono</a>
      </div>  --}}
        <div class="col-sm-12" style="text-align:right">
        <button type="button" class="btn btn-primary"
         data-toggle="modal" data-target="#modal-default" id="AddFees">
                  Agregar
        </button>
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
                    <th>ID</th>

                    <th>Programa</th>
                    <th>Monto Total</th>
                    <th>Monto Pagado</th>
                    <th>Saldo</th>
                    <th>Tipo</th>
                    <th>Observaciones</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                   <tbody>
                    @if(!empty($getFees))
                        @forelse ($getFees as $value )
                            <tr>
                                <td>{{ $value->id }}</td>
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

        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

</div>

   <div class="modal fade" id="AddFeesModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Pagos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <form action="" method="POST">
                {{ @csrf_field() }}
                <div class="modal-body" >

                    <div class="form-group">
                        <label for="">Estudiante:<span style="color: cadetblue">{{ $getStudent->name }} {{ $getStudent->last_name }}</span></label>
                    </div>
                    <div class="form-group">
                        <label for="">Documento:<span style="color: cadetblue">{{ $getStudent->roll_number }}</span></label>
                    </div>
                    <div class="form-group">
                        <label for="col-form-label">Programa. {{ $getStudent->class_name }}</label>
                    </div>

                    <div class="form-group">
                        <label  class="col-form-label">Cantidad Total :${{ number_format($getStudent->amount,2) }}</label>
                    </div>
                    <div class="form-group">
                        <label  class="col-form-label">Valor Pagado :${{ number_format($paid_amount,2) }}</label>
                    </div>
                    <div class="form-group">
                        @php
                            $RemaningAmount =$getStudent->amount - $paid_amount;
                        @endphp
                        <label  class="col-form-label">Cantidad Restante :${{ number_format($RemaningAmount,2) }}</label>
                    </div>
                    <div class="form-group">
                        <label  class="col-form-label"> <span style="color: red">*</span>Cantidad:</label>
                        <input type="number" class="form-control"  name="amount" required>
                    </div>
                    <div class="form-group">
                        <label  class="col-form-label"> <span style="color: red">*</span>Fecha Pago:</label>
                        <input type="date" class="form-control"  name="payment_date" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"> <span style="color: red">*</span> Tipo Pago:</label>
                        <select name="payment_type" class="form-control" name="payment_type" required>
                            <option value="">Seleccione un tipo</option>
                            <option value="Cash">Efectivo</option>
                            <option value="Cheque">Cheque</option>
                            <option value="transfer">Trasferencia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label  class="col-form-label">Observaciones:</label>
                        <textarea class="form-control" name="remark" ></textarea>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
           </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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


  $('#AddFees').click(function(){
    $('#AddFeesModal').modal('show');

  });


</script>

@endsection
