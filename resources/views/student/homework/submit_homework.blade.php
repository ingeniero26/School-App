@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Responder Tarea</h1>
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

                      <div class="form-group">
                        <label>Documento </label>
                         <input type="file" class="form-control"
                        name="document_file">
                      </div>


                  <div class="form-group">
                    <label>Decripción</label>
                    <textarea id="compose-textarea" name="description"  class="form-control" style="height: 300px"> </textarea>
                  </div>


                </div>
               <div class="card-footer">
                  <button type="submit"
                  class="btn btn-primary">Agregar Tarea</button>
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

    {{--  $('#getClass').change(function(){
        var class_id = $(this).val();
         $.ajax({
                type: "POST",
                url: "{{ url('admin/ajax_get_subject')}} ",
                data: {
                   "_token" : "{{ csrf_token() }}",
                    class_id:class_id,

                },
                dataType: "json",
                success: function(data) {
                        $('#getSubject').html(data.success);

                }
            });
    });  --}}


     $('.select2').select2()
  });
</script>
@endsection
