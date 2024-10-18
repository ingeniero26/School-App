@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalle del Trabajo</h1>
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
                            <h3 class="card-title">Información del Trabajo</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Título del Trabajo:</strong> {{ $getRecord->job_title }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Estado:</strong> {{ $getRecord->status == 0 ? 'Activo' : 'Inactivo' }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <strong>Salario Mínimo:</strong> {{ $getRecord->min_salary }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Salario Máximo:</strong> {{ $getRecord->max_salary }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <strong>Descripción:</strong>
                                    <p>{{ $getRecord->description }}</p>
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
                    <a href="{{ url('admin/job/list')}}" class="btn btn-success">Atrás</a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
