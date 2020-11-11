@extends('layouts.app')
@section('title', 'Atenciones Médicas')
@section('content')
            <div class="content-body">
                <!-- Column selectors with Export Options and print table -->
    <section id="column-selectors">
        <div class="card text-white bg-gradient-default text-center">
            <div class="card-content d-flex">
                <div class="card-body">
                    <img style="border-radius: 10px;" src="../assets/images/atenciones.png" alt="Médico" width="150" class="float-left mr-2">
                    <h3 class="card-title text-left text-primary mt-3 font-weight-bold">Atenciones médicas</h3>
                    <p class="text-left text-muted">Aquí encontrarás todas las solicitudes que estén relacionadas contigo</p>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th># Atención médica</th>
                                            <th>Usuario solicitante</th>
                                            <th>Médico</th>
                                            <th>Fecha de atención</th>
                                            <th>Centro de salud</th>
                                            <th>Mensaje</th>
                                            <th>Precio</th>
                                            <th>Confirmada</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($atencion_medica as $atenciones)
                                        <tr>
                                            <td>{{ $atenciones->idatencion_medica }}</td>
                                            <td>{{ $atenciones->user->name }} ({{ $atenciones->user->cedula }})</td>
                                            <td>{{ $atenciones->medico->name }}</td>
                                            @if($atenciones->fecha_atencion)
                                            <td>{{ $atenciones->fecha_atencion }} - {{ $atenciones->hora_atencion }} </td>
                                            @else
                                            <td>-</td>
                                            @endif
                                            <td>{{ $atenciones->centro_salud->nombre }}</td>
                                            <td>{{ $atenciones->mensaje }}</td>
                                            @if($atenciones->precio)
                                            <td>₡{{ number_format($atenciones->precio, 2) }}</td>
                                            @else
                                            <td>-</td>
                                            @endif
                                            @if($atenciones->confirmado == 1)
                                            <td><h3><i class="feather icon-check-circle text-primary"></i></h3></td>
                                            @else
                                            <td><h3><i class="feather icon-clock text-warning"></i></h3></td>
                                            @endif
                                            <td>
                                                @if(Auth::check() && Auth::user()->idroles == 1)
                                                @if($atenciones->fecha_atencion)
                                                <a href="{{ route('atencion.edit', ['id'=>$atenciones->idatencion_medica]) }}"
                                                class="btn btn-icon btn-icon rounded-circle bg-gradient-primary mr-1 mb-1 waves-effect waves-light"
                                                data-toggle="tooltip" data-placement="top" title="Editar"><i
                                                    class="fa fa-edit"> </i></a>
                                            @else
                                                <a href="#"
                                                    class="btn btn-icon disabled btn-icon rounded-circle bg-gradient-primary mr-1 mb-1 waves-effect waves-light"
                                                    data-toggle="tooltip" data-placement="top" title="Editar"><i
                                                        class="fa fa-edit"> </i></a>
                                                        @endif
                                                @else
                                                <a href="{{ route('atencion.edit', ['id'=>$atenciones->idatencion_medica]) }}"
                                                    class="btn btn-icon btn-icon rounded-circle bg-gradient-primary mr-1 mb-1 waves-effect waves-light"
                                                    data-toggle="tooltip" data-placement="top" title="Editar"><i
                                                        class="fa fa-edit"> </i></a>
                                                @endif
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th># Atención médica</th>
                                            <th>Usuario solicitante</th>
                                            <th>Médico</th>
                                            <th>Fecha de atención</th>
                                            <th>Centro de salud</th>
                                            <th>Mensaje</th>
                                            <th>Precio</th>
                                            <th>Confirmada</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Column selectors with Export Options and print table -->
            </div>
@endsection
