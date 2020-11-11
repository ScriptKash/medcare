@extends('layouts.app')
@section('title', 'Crear Centro de salud')
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
                                <form class="form form-vertical" action=" {{ action('CentroSaludController@save') }}"  novalidate method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Nombre del centro de salud</label>
                                                    <input type="text" id="email-id-vertical" class="form-control" name="nombre" placeholder="Nombre">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Dirección</label>
                                                    <input type="text" id="email-id-vertical" class="form-control" name="direccion" placeholder="Dirección">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Teléfono</label>
                                                    <input type="text" id="email-id-vertical" class="form-control" name="telefono" placeholder="Teléfono">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Descripción</label>
                                                    <textarea name="descripcion" class="form-control" id="basicTextarea" rows="3" placeholder="Escriba el motivo aquí..." required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Imagen</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="imagen" name="imagen" autocomplete="imagen">
                                                        <label class="custom-file-label" for="imagen">Selecciona la imagen</label>
                                                    </div>
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
