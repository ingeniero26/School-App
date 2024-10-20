@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <h1>Estudiantes Matriculados</h1>
            <form id="filterForm" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <label for="headquarter_id">Sede:</label>
                        <select id="headquarter_id" name="headquarter_id" class="form-control ChangeHeadquarter">
                            <option value="">Todas</option>
                            @foreach ($headquarters as $headquarter)
                                <option value="{{ $headquarter->id }}">{{ $headquarter->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">


                        <label for="class_id">Programa Acádmico:</label>
                        <select id="class_id" name="class_id" class="form-control getClassHeadquarter">
                            <option value="">Todas</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                     <button type="submit" class="btn btn-primary">Filtrar</button> <br>
                </div>


                <a href="{{ url('registration.export') }}" class="btn btn-primary">Exportar a Excel</a>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Tipo Documento</th>
                        <th>Documento</th>

                        <th>Sede</th>
                        <th>Programa</th>
                        <th>Jornada</th>
                        <th>Fecha Matricula</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->student->name }} {{ $enrollment->student->last_name }}</td>
                            <td>{{ $enrollment->student->document_type }}</td>
                            <td>{{ $enrollment->student->roll_number }}</td>
                            <td>{{ $enrollment->headquarter->name }}</td>
                            <td>{{ $enrollment->class->name }}</td>
                            <td>{{ $enrollment->journeys->name }}</td>
                            <td>{{ $enrollment->date_of_entry }}</td>
                            <td>  <select class="form-control changeStatus" style="width: 170px;" id="{{$enrollment->id}}">
                                <option {{($enrollment->status == '1') ? 'selected' : ''}} value="1"> <span class="badge bg-primary">Matrciulado</span></option>
                                <option {{($enrollment->status == '2') ? 'selected' : ''}} value="2"><span class="badge bg-danger">Graduado</span></option>
                                <option {{($enrollment->status == '3') ? 'selected' : ''}} value="3"><span class="badge bg-danger">Retirado</span></option>
                                <option {{($enrollment->status == '4') ? 'selected' : ''}} value="4"><span class="badge bg-danger">Cancelado</span></option>
                                <option {{($enrollment->status == '5') ? 'selected' : ''}} value="5"><span class="badge bg-danger">Expulsado</span></option>
                            </select></td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
<script>
 $('body').delegate('.ChangeHeadquarter','change',  function() {
    var headquarterId = $(this).val();
    $.ajax({
        url: '{{ url('admin/student/getClassHeadquarter') }}',
        type: 'POST',
        data: {
            headquater_id: headquarterId,
            _token: '{{ csrf_token() }}'
        },

        dataType: 'json',
        success: function(response) {
            $('.getClassHeadquarter').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});
$('.changeStatus').change(function(){
        var status_id = $(this).val();
        var order_id = $(this).attr('id');
        $.ajax({
            type:'GET',
            url: "{{ url('admin/registration/changeStatus')}}",
            data:{status_id:status_id,order_id:order_id},
            dataType:'JSON',
            success:function(data)
            {
                alert('Estado cambiado');
                window.location.href="";
            }
        });
    });
</script>
@endsection
