@extends('layouts.app')
@section('title', 'Crear Médico')
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
                                @if(Session::has('message'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                                @endif
                                <form class="form form-vertical" action=" {{ action('MedicoController@save') }}"  novalidate method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Usuario</label>
                                                    <select name="idusuario" class="select2 form-control">
                                                        @foreach($usuario as $usuarios)
                                                        <option value={{$usuarios->id}}>{{$usuarios->cedula}} - {{$usuarios->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password-vertical">Centro de salud</label>
                                                    <select name="idcentros_salud" class="select2 form-control">
                                                        @foreach($centro_salud as $centros_salud)
                                                        <option value={{$centros_salud->idcentros_salud}}>{{$centros_salud->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password-vertical">Profesión</label>
                                                    <select name="idprofesiones" class="select2 form-control">
                                                        @foreach($profesion->except([1]) as $profesiones)
                                                        <option value={{$profesiones->idprofesiones}}>{{$profesiones->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Crear</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic example and Profile cards section end -->
            </div>
@endsection
