@extends('layouts.app')
@section('title', 'Médicos')
@section('content')
            <div class="content-body">
                <div id="user-profile">
                    @if(Auth::user()->idroles == 3 && $usuario->idroles === 2)
                    <form class="form form-vertical" action=" {{ action('UsuarioController@eliminarMedico') }}"  novalidate method="POST">
                        @csrf
                        <input type="hidden" value={{$usuario->id}} name="id" />
                    <div class="text-right mb-2">
                        <button type="submit" class="btn btn-danger">Eliminar médico</button>
                    </div>
                </form>
                @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="profile-header mb-2">
                                <div class="relative">
                                    <div class="cover-container">
                                        <img class="img-fluid bg-cover rounded-0 w-100" src="../assets/images/banner.jpg" alt="User Profile Image">
                                    </div>
                                    <div class="profile-img-container d-flex align-items-center justify-content-between">
                                        <img src="{{ route('user.avatar', ['filename'=>$usuario->imagen]) }}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                        
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end align-items-center profile-header-nav">
                                    <nav class="navbar navbar-expand-sm w-100 pr-0">
                                        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav justify-content-around w-75 ml-sm-auto">
                                                <li class="nav-item px-sm-0">
                                                    <a href="#" class="nav-link font-small-3"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section id="profile-info">
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Acerca de</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="mt-1">
                                            <h6 class="mb-0">Nombre:</h6>
                                            <p>{{$usuario->name}}</p>
                                        </div>
                                    <div class="mt-1">
                                            <h6 class="mb-0">Cédula:</h6>
                                            <p>{{$usuario->cedula}}</p>
                                        </div>
                                    <div class="mt-1">
                                            <h6 class="mb-0">Correo electrónico:</h6>
                                            <p>{{$usuario->email}}</p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Solicitudes: {{$atencion_medica->count()}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-12">
                                @foreach ($atencion_medica as $atenciones)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="user-page-info">
                                                <p class="mb-0">Atención médica</p>
                                                <span class="font-small-2">
                                            @if($atenciones->fecha_atencion)
                                            <td>El {{ $atenciones->fecha_atencion }} a las {{ $atenciones->hora_atencion }}</td>
                                            @else
                                            <td>Sin fecha aún</td>
                                            @endif
                                                </span>
                                            </div>
                                        </div>
                                        <p><strong>{{$atenciones->user->name}}</strong> fue atentido por <strong>{{$atenciones->medico->name}}</strong> en el centro de salud <strong>{{$atenciones->centro_salud->nombre}}</strong></p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                    </section>
                </div>

            </div>
@endsection
