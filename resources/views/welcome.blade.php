@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br>
            <div class="text-center mb-2">
              <img src="../assets/images/medcare.png" alt="logo" style="width:200px;" />
            </div>
            <h1 class="text-center">Bienvenid@ a <strong>MedCare</strong></h1>
            <h4 class="text-center">QUÉ OFRECEMOS</h4>
            <hr>
            <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <div class="mb-3 card text-white card-body bg-primary"><h5 class="text-white card-title">Centros de salud</h5>Solicita atención médica en cualquiera de los centros de salud afiliados.</div>
                  </div>
                  <div class="col-sm">
                    <div class="mb-3 card text-white card-body bg-warning"><h5 class="text-white card-title">Médicos</h5>Contamos con los mejores médicos de la zona disponibles para atenderte.</div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

<div class="mb-2">
    <h5>Médicos destacados</h5>
  <a href="/medicos"><button class="btn btn-warning btn-sm">Ver todos los médicos</button></a>
</div>

<div class="row">
  @foreach ($medico as $medicos)    
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="card text-white bg-warning text-center">
      <div class="card-content">
        <div class="card-body">
          <div class="avatar mr-1 avatar-xl">
            <img src="{{ route('user.avatar', ['filename'=>$medicos->imagen]) }}" alt="avtar img holder">
          </div>
          <h4 class="card-title text-white">{{$medicos->name}}</h4>
          <p class="card-text text-white">
            @foreach (App\UsuarioProfesion::where('idusuario', $medicos->id)->get() as $usuario_profesiones)
                                        <span class="badge badge-warning">{{$usuario_profesiones->profesion->nombre}}</span>
                                        @endforeach
          </p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="mb-2">
  <h5>Centros de salud destacados</h5>
<a href="/centros-salud"><button class="btn btn-primary btn-sm">Ver todos los centros de salud</button></a>
</div>

<div class="row match-height">
@foreach ($centro_salud as $centros_salud)    
<div class="col-md-4 col-sm-6 col-xs-12">
  <div class="card">
    <div class="card-content">
      <div style="height:300px;width:100%;background-image:url({{ route('centro-salud.imagen', ['filename'=>$centros_salud->imagen]) }});background-size:cover;"></div>
      <div class="card-body">
        <h4 class="card-title">{{$centros_salud->nombre}}</h4>
        <p class="card-text">{{$centros_salud->descripcion}}</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>

<div class="mb-2">
  <h5>Algunas opiniones</h5>
</div>
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <blockquote class="blockquote pl-1 border-left-primary border-left-3">
      <div class="media">
        <div class="media-left pr-1">
          <img class="media-object img-xl" src="../app-assets/images/portrait/small/avatar-s-5.jpg" alt="Generic placeholder image">
        </div>
        <div class="media-body">
          Necesitaba una atención médica y encontré esta plataforma, la cual me ayudó con mi tratamiento. Excelente servicio, muy recomendable.
        </div>
      </div>
      <footer class="blockquote-footer text-right">Ramiro Rodríguez
        <cite title="Source Title">Desarrollador</cite>
      </footer>
    </blockquote>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <blockquote class="blockquote pl-1 border-left-primary border-left-3">
      <div class="media">
        <div class="media-left pr-1">
          <img class="media-object img-xl" src="../app-assets/images/portrait/small/avatar-s-20.jpg" alt="Generic placeholder image">
        </div>
        <div class="media-body">
          Encontré esta plataforma y me sorprendió, muy fácil de usar y encuentras a los mejores médicos de la zona.
        </div>
      </div>
      <footer class="blockquote-footer text-right">María Vargas
        <cite title="Source Title">Abogada</cite>
      </footer>
    </blockquote>
  </div>
</div>

@endsection
