@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Nuevo Producto</h1>
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
                        <form method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nombre del Producto <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="title" required placeholder="Ingrese el nombre del producto">
                                </div>
                                <div class="form-group">
                                    <label>SKU <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="sku"  placeholder="Ingrese el SKU">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
