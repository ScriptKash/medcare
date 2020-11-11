@extends('layouts.app')
@section('title', 'Centros de Salud')
@section('content')
            <div class="content-body">
                <!-- Basic example and Profile cards section start -->
                <section id="basic-examples">
                    <div class="card text-white bg-gradient-default text-center">
                        <div class="card-content d-flex">
                            <div class="card-body">
                                <img style="border-radius: 10px;" src="../assets/images/hospital.png" alt="Médico" width="150" class="float-left mr-2">
                                <h3 class="card-title text-left text-primary mt-3 font-weight-bold">Centros de Salud</h3>
                                <p class="text-left text-muted">Tenemos afiliaciones con los mejores centros de salud de la zona</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row match-height">
                        @foreach ($centro_salud as $centros_salud)
                        <!-- Profile Cards Starts -->
                        <div class="col-xl-4 col-md-6 col-sm-12 profile-card-1">
                            <div class="card">
                                <div class="card-header mb-1">
                                    <h4 class="card-title">{{$centros_salud->nombre}}</h4>
                                </div>
                                <div class="card-content">
                                    <div style="height:300px;width:100%;background-image:url({{ route('centro-salud.imagen', ['filename'=>$centros_salud->imagen]) }});background-size:cover;"></div>
                                    <div class="card-body">
                                        <p class="card-text">{{$centros_salud->descripcion}}</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted" style="background-color: #fff !important;">
                                    <p>{{$centros_salud->direccion}}</p>
                                    <p>
                                        Teléfono: {{$centros_salud->telefono}}
                                    </p>
                                    <a href="{{ route('atencion.centro-salud', ['id'=>$centros_salud->idcentros_salud]) }}"><button class="btn btn-block gradient-light-primary mt-3">Solicitar atención</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- Profile Cards Ends -->
                        @endforeach
                    </div>
                </section>
                <!-- // Basic example and Profile cards section end -->
            </div>
@endsection
