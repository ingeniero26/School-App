@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Coordinador</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="post" >
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="name" required placeholder="Ingrese nombre">
                                </div>
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input type="text" class="form-control" name="last_name" required placeholder="Ingrese apellido">
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Tipo Documento<span style="color: red"></span> </label>
                                    <select name="document_type" id="" required class="form-control">
                                        <option value="">Tipo Documento</option>
                                        <option {{ (old('document_type')=='CEDULA')?'selected' : '' }} value="CEDULA">CEDULA</option>
                                        <option {{ (old('document_type')=='TI')?'selected' : '' }}  value="TI">TI</option>
                                        <option {{ (old('document_type')=='PASAPORTE')?'selected' : '' }}  value="PASAPORTE">PASAPORTE</option>
                                        <option {{ (old('document_type')=='OTRO')?'selected' : '' }} value="OTRO">Otro</option>
                                    </select>
                                    <div style="color:red;">
                                        {{ $errors->first('gender') }}
                                       </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label> Número<span style="color: red"></span> </label>
                                    <input type="text" class="form-control"
                                    value="{{ old('roll_number') }}"
                                    placeholder="Documento" name="roll_number">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label> Genero<span style="color: red"></span> </label>
                                    <select name="gender" id="" required class="form-control">
                                        <option value="">Seleccione Sexo</option>
                                        <option {{ (old('gender')=='Male')?'selected' : '' }} value="Male">Masculino</option>
                                        <option {{ (old('gender')=='Female')?'selected' : '' }}  value="Female">Femenino</option>
                                        <option {{ (old('gender')=='Other')?'selected' : '' }} value="Other">Otro</option>
                                    </select>
                                    <div style="color:red;">
                                        {{ $errors->first('gender') }}
                                       </div>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label> Foto<span style="color: red"></span> </label>
                                    <input type="file" name="profile_pic"  class="form-control"
                                   >
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label> Direccion<span style="color: red"></span> </label>
                                    <input type="text"  class="form-control"
                                    value="{{ old('address') }}"
                                    placeholder="" name="address">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label> Celular<span style="color: red"></span> </label>
                                    <input type="text"  class="form-control"
                                    value="{{ old('mobile_number') }}"
                                    placeholder="" name="mobile_number">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label> Ocupacion<span style="color: red"></span> </label>
                                    <input type="text"  class="form-control"
                                    value="{{ old('occupation') }}"
                                    placeholder="" name="occupation">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label> EPS<span style="color: red"></span> </label>
                                    <input type="text" class="form-control"
                                        value="{{ old('eps') }}" placeholder=""
                                        name="eps">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" required placeholder="Ingrese email">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" name="password" required placeholder="Ingrese contraseña">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
