@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles del Estudiante</h1>
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
                            <h3 class="card-title">Información del Estudiante</h3>
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
                                        <td>{{ $getRecord->name }} {{ $getRecord->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $getRecord->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipo de Documento</th>
                                        <td>{{ $getRecord->document_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Número de Admisión</th>
                                        <td>{{ $getRecord->admission_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Número de Roll</th>
                                        <td>{{ $getRecord->roll_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Clase</th>
                                        <td>{{ $getRecord->class_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sede</th>
                                        <td>{{ $getRecord->headquarter_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jornada</th>
                                        <td>{{ $getRecord->journey_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Género</th>
                                        <td>{{ $getRecord->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha de Nacimiento</th>
                                        <td>{{ !empty($getRecord->date_of_birth) ? date('d-m-Y', strtotime($getRecord->date_of_birth)) : '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Casta</th>
                                        <td>{{ $getRecord->caste }}</td>
                                    </tr>
                                    <tr>
                                        <th>Religión</th>
                                        <td>{{ $getRecord->religion }}</td>
                                    </tr>
                                    <tr>
                                        <th>Estrato Social</th>
                                        <td>{{ $getRecord->social_stratum }}</td>
                                    </tr>
                                    <tr>
                                        <th>Número de Teléfono</th>
                                        <td>{{ $getRecord->mobile_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha de Admisión</th>
                                        <td>{{ !empty($getRecord->admission_date) ? date('d-m-Y', strtotime($getRecord->admission_date)) : '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Grupo Sanguíneo</th>
                                        <td>{{ $getRecord->blood_group }}</td>
                                    </tr>
                                    <tr>
                                        <th>EPS</th>
                                        <td>{{ $getRecord->eps }}</td>
                                    </tr>
                                    <tr>
                                        <th>Altura</th>
                                        <td>{{ $getRecord->height }}</td>
                                    </tr>
                                    <tr>
                                        <th>Peso</th>
                                        <td>{{ $getRecord->weight }}</td>
                                    </tr>
                                    <tr>
                                        <th>Estado</th>
                                        <td>{{ $getRecord->status == 0 ? 'Activo' : 'Inactivo' }}</td>
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
