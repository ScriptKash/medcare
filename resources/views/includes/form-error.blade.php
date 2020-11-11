@if ($errors->any())


      <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
            <h4 class="alert-heading">Errores en los datos ingresados</h4>
            <ul style="list-style:none">
                    @foreach ($errors->all() as $error)
                        <li><i class="feather icon-info mr-1 align-middle"></i> {{ $error }}</li>
                    @endforeach
                </ul>
          </div>

  @endif
