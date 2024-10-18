@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalle de la Categoría</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Información de la Categoría</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Nombre:</strong> {{ $getRecord->name }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Estado:</strong> {{ $getRecord->status == 0 ? 'Activo' : 'Inactivo' }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <strong>Titulo:</strong>
                                    <p>{{ $getRecord->meta_title }}</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <strong>Meta Descripción:</strong>
                                    <p>{{ $getRecord->meta_description }}</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <strong>Creado por:</strong> {{ $getRecord->belongsToUser->name }} {{ $getRecord->belongsToUser->last_name }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Email del creador:</strong> {{ $getRecord->belongsToUser->email }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <strong>Fecha de Creación:</strong> {{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Última Actualización:</strong> {{ date('d-m-Y H:i A', strtotime($getRecord->updated_at)) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/category/list')}}" class="btn btn-success">Atrás</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
