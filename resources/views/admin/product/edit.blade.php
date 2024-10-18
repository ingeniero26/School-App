@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Producto</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/product/list') }}" class="btn btn-primary">Volver a la Lista</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="{{ url('admin/product/edit/' . $getRecord->id) }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Nombre del Producto <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $getRecord->title }}" required
                                                placeholder="Ingrese el nombre del producto">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>SKU <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="sku"
                                                value="{{ $getRecord->sku }}" required placeholder="Ingrese el SKU">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Marca</label>
                                            <select class="form-control" name="brand_id">
                                                <option value="">Seleccionar Marca</option>
                                                @foreach ($getBrands as $brand)
                                                    <option {{ $getRecord->brand_id == $brand->id ? 'selected' : '' }}
                                                        value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Color <span style="color: red;">*</span></label>

                                            <div>

                                            @foreach ($getColors as $color)

                                                    @php
                                                        $checked = '';
                                                    @endphp
                                                    @foreach ($getRecord->getColor as $pcolor)
                                                        @if ($pcolor->color_id == $color->id)
                                                            @php
                                                                $checked = 'checked';
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    <label><input {{ $checked }} type="checkbox" name="color_id[]" id=""
                                                            value="{{ $color->id }}">{{ $color->name }}</label>
                                            @endforeach
                                            </div>

                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Unidad de Medida</label>
                                            <select class="form-control" name="measure_id">
                                                <option value="">Seleccionar Medida</option>
                                                @foreach ($getMeasures as $measure)
                                                    <option {{ $getRecord->measure_id == $measure->id ? 'selected' : '' }}
                                                        value="{{ $measure->id }}">{{ $measure->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Categoría</label>
                                            <select class="form-control" id="ChangeCategory" name="category_id">
                                                <option value="">Seleccionar Categoría</option>
                                                @foreach ($getCategories as $category)
                                                    <option
                                                        {{ $getRecord->category_id == $category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Subcategoría</label>
                                            <select class="form-control" required id="getSubCategory" name="sub_category_id">
                                                <option value="">Seleccionar Subcategoría</option>
                                                @foreach ($getSubCategories as $subCategory)
                                                    <option {{ $getRecord->sub_category_id == $subCategory->id ? 'selected' : '' }} value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Precio Anterior</label>
                                            <input type="number" step="0.01" class="form-control" name="old_price"
                                                value="{{ !empty($getRecord->old_price) ? $getRecord->old_price : '' }}"
                                                placeholder="Ingrese el precio anterior">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Precio Nuevo</label>
                                            <input type="number" step="0.01" class="form-control" name="price"
                                                value="{{ !empty($getRecord->price) ? $getRecord->price : '' }}" required placeholder="Ingrese el precio">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Tamaños</label>
                                            <div>
                                                <table class="table table-striped">
                                                   <thead>
                                                    <tr>
                                                        <th>
                                                            Nombre
                                                        </th>
                                                        <th>
                                                            Precio
                                                        </th>
                                                        <th>
                                                            Acciones
                                                        </th>
                                                    </tr>
                                                   </thead>
                                                   <tbody id="AppendSize">
                                                    @php
                                                        $i_s = 1;
                                                    @endphp
                                                    @foreach ($getRecord->getSize as $size)
                                                    <tr id="DeleteSize{{$i_s}}">
                                                        <td>
                                                            <input type="text" class="form-control" value="{{ $size->name }}" name="size[100][name]" required placeholder="Ingrese el nombre del tamaño">
                                                        </td>
                                                        <td>
                                                            <input type="number" step="0.01" value="{{ $size->price }}" class="form-control" name="size[100][price]" required placeholder="Ingrese el precio del tamaño">
                                                        </td>
                                                        <td>
                                                            <button type="button" id="{{$i_s}}"  class="btn btn-danger DeleteSize"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $i_s++;
                                                    @endphp
                                                    @endforeach
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" name="size[{{$i_s}}][name]"  placeholder="Ingrese el nombre del tamaño">
                                                        </td>
                                                        <td>
                                                            <input type="number" step="0.01"  class="form-control" name="size[{{$i_s}}][price]"  placeholder="Ingrese el precio del tamaño">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary AddSize"><i class="fa fa-plus"></i></button>
                                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Imagen</label>
                                                <input type="file" name="image[]" style="padding: 5px;" multiple accept="image/*" class="form-control">
                                                <br>

                                            </div>
                                        </div>
                                        @if(!empty($getRecord->getImage->count()))
                                        <div class="row" id="sortable">
                                            @foreach ($getRecord->getImage as $image)
                                            @if(!empty($image->getImagenLogo()))
                                                <div class="col-md-3 sortable_image" id="{{$image->id}}">
                                                    <img src="{{ $image->getImagenLogo() }}"
                                                     alt="" style="width: 100%; height: auto;">
                                                     <a href="{{ url('admin/product/delete_image/'.$image->id) }}"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta imagen?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        @endif
                                        <hr>

                                        <div class="form-group col-md-12">
                                            <label>Descripción Corta</label>
                                            <textarea class="form-control" name="short_description" placeholder="Ingrese la descripción corta">{{ $getRecord->short_description }}</textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Descripción</label>
                                            <textarea class="form-control editor"  name="description" placeholder="Ingrese la descripción">{{ $getRecord->description }}</textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Información Adicional</label>
                                            <textarea class="form-control editor" name="additional_information"
                                            placeholder="Ingrese la información adicional">{{ $getRecord->additional_information }}</textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Devolución</label>
                                            <textarea class="form-control editor" name="shipping_returns" placeholder="Ingrese la política de devolución">{{ $getRecord->shipping_returns }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Estado</label>
                                            <select class="form-control" name="status">
                                                <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">
                                                    Activo
                                                </option>
                                                <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">
                                                    Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
<script src="https://cdn.tiny.cloud/1/7yrdj8zvz9f177o7ti89t64k4d886sh4ve4m2x9p1fvwm3fn/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ url('public/dist/js/tinymce-jquery.min.js') }}"></script>
<script src="{{ url('public/dist/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $( "#sortable" ).sortable({
        update: function(event, ui) {
           var photo_id = new Array();
           $('.sortable_image').each(function(){
            var id = $(this).attr('id');
            photo_id.push(id);
           });
        $.ajax({
            url: '{{ url('admin/product/update_photo_order') }}',
            type: 'POST',
            data: {
                'photo_id': photo_id,
            _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                alert('Imagen actualizada');
            },
            error: function() {
                alert('Error al actualizar la imagen');
            }
        });
        }
    });
    $( "#sortable" ).disableSelection();
});
    $('body').delegate('#ChangeCategory','change',  function() {

        var id = $(this).val();
        $.ajax({
            url: '{{ url('admin/get_sub_category') }}',
            type: 'POST',
            data: {
                'id': id,
            _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                $('#getSubCategory').html(response);
            },
            error: function() {
                alert('Error al obtener las subcategorías');
            }
        });
    });
     var i = 101;
    $('body').delegate('.AddSize','click', function() {
    var html = '<tr id="DeleteSize'+i+'">\n\
        <td><input type="text"  class="form-control" name="size['+i+'][name]" required placeholder="Ingrese el nombre del tamaño"></td>\n\
        <td><input type="number" step="0.01" value="0" class="form-control" name="size['+i+'][price]" required placeholder="Ingrese el precio del tamaño"></td>\n\
        <td><button type="button" id="'+i+'" class="btn btn-danger DeleteSize""><i class="fa fa-trash"></i></button></td>\n\
        </tr>';
        i++;
    $('#AppendSize').append(html);
    });
    $('body').delegate('.DeleteSize','click', function() {
        var id = $(this).attr('id');
        $('#DeleteSize'+id).remove();
    });


    $('.editor').tinymce({
        height: 500,
        menubar: false,
        plugins: [
           'a11ychecker','advlist','advcode','advtable','autolink','checklist','markdown',
           'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
           'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'
      });

</script>
@endsection
