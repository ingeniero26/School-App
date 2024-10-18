@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles del Coordinador</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Información del Coordinador</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $getRecord->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nombre</th>
                                        <td>{{ $getRecord->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Apellido</th>
                                        <td>{{ $getRecord->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $getRecord->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Género</th>
                                        <td>{{ $getRecord->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha de Creación</th>
                                        <td>{{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Última Actualización</th>
                                        <td>{{ date('d-m-Y H:i A', strtotime($getRecord->updated_at)) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
