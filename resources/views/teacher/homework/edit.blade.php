@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Nueva Actividad</h1>
          </div>

        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            @include('_message')
            <div class="card card-primary">
              <form method="post" enctype="multipart/form-data">
                {{ @csrf_field() }}
                <div class="card-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Programa <span style="color: red">*</span></label>
                            <select name="class_id" id="getClass" class="form-control select2" style="width: 100%;">
                                <option value="" >Selecccione </option>
                                    {{--  @foreach($getClass as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach  --}}

                                 @foreach($getClass as $class)
                                    <option {{ ($getRecord->class_id==$class->class_id) ? 'selected':'' }} value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asignatura <span style="color: red">*</span></label>
                            <select name="subject_id" id="getSubject"
                             required
                              class="form-control select2" style="width: 100%;">
                                <option value="">Selecccione </option>
                                  @foreach($getSubject as $subject)
                                    <option {{ ($getRecord->subject_id==$subject->subject_id) ? 'selected':'' }} value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   <div class="col-md-6">
                       <div class="form-group">
                        <label for="">Fecha Tarea</label>
                        <input type="date" class="form-control"
                        name="homework_date" value="{{  $getRecord->homework_date }}"</input>

                        </div>
                    </div>
                   <div class="col-md-6">
                       <div class="form-group">
                        <label for="">Fecha Entrega</label>
                        <input type="date" class="form-control"
                        name="submission_date" value="{{  $getRecord->submission_date }}"</input>

                        </div>
                    </div>



                      <div class="form-group">
                        <label>Documento </label>
                         <input type="file" class="form-control"
                        name="document_file">
                            @if(!empty($getRecord->getDocument()))
                                <a href="{{ $getRecord->getDocument() }}"
                                class="btn btn-primary" download="">Descargar</a>
                            @endif
                      </div>


                  <div class="form-group">
                    <label>Decripción</label>
                    <textarea id="compose-textarea" name="description"
                     class="form-control"
                      style="height: 300px">{{ $getRecord->description }} </textarea>
                  </div>


                </div>
               <div class="card-footer">
                  <button type="submit"
                  class="btn btn-warning">Editar Tarea</button>
                </div>
              </form>
            </div>

          </div>

        </div>
      </div>
    </section>

  </div>

@endsection
@section('script')

<script src="{{ url('public/plugins/summernote/summernote-bs4.min.js') }}"></script>


<script>
 $(function () {
    //Add text editor
    $('#compose-textarea').summernote({
        height: 150,
        codemirror: {
            theme:'monokai'
        }
    });

    $('#getClass').change(function(){
        var class_id = $(this).val();
         $.ajax({
                type: "POST",
                url: "{{ url('teacher/ajax_get_subject')}} ",
                data: {
                   "_token" : "{{ csrf_token() }}",
                    class_id:class_id,

                },
                dataType: "json",
                success: function(data) {
                        $('#getSubject').html(data.success);

                }
            });
    });


     $('.select2').select2()
  });
</script>
@endsection
