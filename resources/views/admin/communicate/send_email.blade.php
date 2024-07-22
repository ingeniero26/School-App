@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enviar Correo</h1>
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
              <form method="post">
                {{ @csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control"
                    value="{{ old('title') }}"
                     placeholder="Titulo" name="subject">
                  </div>
                  <div class="form-group">
                  <label>Usuario (Estudiante / Padre Familia / Docente)</label>
                  <select name="user_id" class="form-control select2" style="width: 100%;">
                    <option value="">Selecccione </option>

                  </select>
                </div>

                   <div class="form-group">
                    <label style="display: block">Mensaje para</label> <br>
                    <label style="margin-right: 50px">
                      <input type="checkbox"   value="3"  name="message_to[]" >Estudiante
                    </label>
                    <label style="margin-right: 50px">
                      <input type="checkbox"  value="4"  name="message_to[]">Padre de familia
                    </label>
                    <label>
                      <input type="checkbox"  value="2"   name="message_to[]">Docente
                    </label>
                  </div>

                  <div class="form-group">
                    <label>Mensaje</label>
                    <textarea id="compose-textarea" name="message"  class="form-control" style="height: 300px"> </textarea>
                  </div>


                </div>
               <div class="card-footer">
                  <button type="submit"
                  class="btn btn-primary">Enviar Correo</button>
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

     $('.select2').select2({
        ajax: {
            url: '{{ url('admin/communicate/search_user') }}',
            dataType: 'json',
            delay: 250,
            data: function(data) {
                return {
                    search: data.term,

                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
        }
     });


     //$('.select2').select2()
  });
</script>
@endsection
