@extends('layouts.app')
@section('title', 'Médicos')
@section('content')
            <div class="content-body">
                <!-- Basic example and Profile cards section start -->
                <section id="basic-examples">
                    <div class="card text-white bg-gradient-default text-center">
                        <div class="card-content d-flex">
                            <div class="card-body">
                                <img style="border-radius: 10px;" src="../assets/images/medico.png" alt="Médico" width="150" class="float-left mr-2">
                                <h3 class="card-title text-left text-primary mt-3 font-weight-bold">Médicos</h3>
                                <p class="text-left text-muted">Los mejores especialistas disponibles para ti</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row match-height">
                        @foreach ($medico as $medicos)
                        <!-- Profile Cards Starts -->
                        <div class="col-xl-4 col-md-6 col-sm-12 profile-card-1">
                            <div class="card">
                                <div class="card-header mx-auto">
                                    <div class="avatar avatar-xl">
                                        <img class="img-fluid" src="{{ route('user.avatar', ['filename'=>$medicos->imagen]) }}" alt="img placeholder">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <h4>{{$medicos->name}}</h4>
                                        
                                        @foreach (App\UsuarioProfesion::where('idusuario', $medicos->id)->get() as $usuario_profesiones)
                                        <span class="badge badge-primary">{{$usuario_profesiones->profesion->nombre}}</span>
                                        @endforeach

                                        @foreach (App\MedicoCentroSalud::where('idusuario', $medicos->id)->get() as $medico_centro_salud)
                                            <span class="badge badge-danger">{{$medico_centro_salud->centro_salud->nombre}}</span>
                                            @endforeach

                                        <div class="card-btns d-flex justify-content-between">
                                        </div>
                                        <hr class="my-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="float-left">
                                                <a href="{{ route('atencion.medico', ['id'=>$medicos->id]) }}"><button class="btn gradient-light-primary">Solicitar atención</button></a>
                                            </div>
                                            <div class="float-right">
                                                <i class="feather icon-briefcase text-primary mr-50"></i> {{App\AtencionMedica::where(['idmedico' => $medicos->id, 'confirmado' => 1])->count()}} atenciones
                                            </div>
                                        </div>
                                    </div>
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
