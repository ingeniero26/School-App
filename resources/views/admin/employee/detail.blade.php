@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalle Empleado</h1>
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
                            <h3 class="card-title">Información del Empleado</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Nombre:</strong> {{ $getRecord->name }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Apellidos:</strong> {{ $getRecord->last_name }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Email:</strong> {{ $getRecord->email }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <strong>Género:</strong> {{ $getRecord->gender }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Teléfono:</strong> {{ $getRecord->mobile_number }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Fecha de Contratación:</strong>
                                     {{ $getRecord->hire_date }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <strong>Puesto:</strong>
                                    {{!empty($getRecord->job->job_title) ?
                                     $getRecord->job->job_title: '' }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Salario:</strong> {{ $getRecord->salary }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Comisión:</strong> {{ $getRecord->commission_pct }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <strong>Estado:</strong> {{ $getRecord->status == 0 ? 'Activo' : 'Inactivo' }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Fecha de Creación:</strong> {{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('admin/employee/list')}}" class="btn btn-success">Atras</a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
