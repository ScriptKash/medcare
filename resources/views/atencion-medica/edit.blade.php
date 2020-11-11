@extends('layouts.app')
@section('title', 'Editar Atención Médica')
@section('content')
    <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">
                                @if(Auth::user()->idroles == 2 || Auth::user()->idroles == 3)
                                @yield('title')
                                @else
                                Confirmar Atención Médica
                                @endif
                            </h2>
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

                                @auth
                                <form class="form form-vertical" action=" {{ action('AtencionMedicaController@update') }}"  novalidate method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$atencion_medica->idatencion_medica}}" name="id">
                                    @if(Auth::user()->idroles == 2 || Auth::user()->idroles == 3)
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Precio de la atención médica</label>
                                                    <input @if($atencion_medica->precio)value={{$atencion_medica->precio}}@endif type="number" id="email-id-vertical" class="form-control" name="precio" placeholder="Precio de atención">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Fecha de la atención médica</label>
                                                    <input type='text' class="form-control pickadate-translations"  name="fecha_atencion" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Hora de la atención médica</label>
                                                    <input {{ $atencion_medica->hora_atencion}} type='text' class="form-control pickatime" name="hora_atencion" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Guardar cambios</button>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        @if($atencion_medica->confirmado === 1)
                                        <h5>La cita médica ya fue confirmada</h5>
                                        @else
                                        <h5>La cita médica fue actualizada por el médico, con los siguientes datos</h5>
                                        <ul class="list-group mt-2">
                                            <li class="list-group-item"><strong>Fecha de atención:</strong> {{ $atencion_medica->fecha_atencion }} - {{ $atencion_medica->hora_atencion }} </li>
                                            <li class="list-group-item"><strong>Precio:</strong> ₡{{ number_format($atencion_medica->precio, 2) }}</li>
                                          </ul>
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 mt-2">Confirmar cita</button>
                                        @endif
                                    @endif
                                </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic example and Profile cards section end -->
            </div>
@endsection
