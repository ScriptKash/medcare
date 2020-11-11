@extends('layouts.app')
@section('title', 'Solicitar Atención Médica')
@section('content')
    <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">@yield('title')</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- Basic example and Profile cards section start -->
                <section id="basic-examples">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="card text-white bg-gradient-primary text-center">
                                    <div class="card-content d-flex">
                                        <div class="card-body">
                                            <img style="border-radius: 10px;" src="{{ route('user.avatar', ['filename'=>$usuario->imagen]) }}" alt="Médico" width="150" class="float-left mr-2">
                                            <h4 class="card-title text-left text-white mt-3">{{$usuario->name}}</h4>
                                            <p class="text-left">
                                                @foreach (App\UsuarioProfesion::where('idusuario', $usuario->id)->get() as $usuario_profesiones)
                                                <span class="badge badge-primary badge-glow">{{$usuario_profesiones->profesion->nombre}}</span>
                                            @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                @if(Session::has('message'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                                @endif

                                @auth
                                <form class="form form-vertical" action=" {{ action('AtencionMedicaController@saveMedico') }}"  novalidate method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$usuario->id}}" name="idmedico">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="id">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Centro de salud</label>
                                                    <select name="idcentro_salud" class="select2 form-control">
                                                        @foreach($centro_salud as $centros_salud)
                                                        <option value={{$centros_salud->idcentros_salud}}>{{$centros_salud->centro_salud->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Motivo de la atención médica</label>
                                                    <textarea name="mensaje" class="form-control" id="basicTextarea" rows="3" placeholder="Escriba el motivo aquí..." required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Solicitar atención médica</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endauth

                                @guest 
                                <div class="alert alert-primary text-center" role="alert">
                                    Necesitas tener una cuenta para poder solicitar atención médica
                                  </div>
                                  @endguest
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic example and Profile cards section end -->
            </div>
@endsection
