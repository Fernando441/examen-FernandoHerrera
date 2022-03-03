    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    <style type="text/css">
        .mt-2{
            margin-top: 20px;
        }
        .alert-success{
            background-color: #58D68D;
        }
    </style>

    <div class="row mt-2">
        <div class="col s12 m2"></div>
        <div class="col s12 m8">

            <div class="row">
                <div class="col m12 s12">
                    <a href="{{ route('contactos.lista') }}"><i class="material-icons">featured_play_list</i>Lista de contactos</a>
                </div>
            </div>

          <div class="card">
            <div class="card-content">
                <h4>Catalogo de contactos</h4>

                @if(session()->has('success'))
                <div class="row">
                    <div class="alert alert-success" style="width: 100%;" align="center">
                        <button type="button" class="btn" id="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Notificación: </strong>
                        {{ session()->get('success') }}
                    </div>
                </div>
                @endif

              <div class="row">
                <div class="col m12 s12">
                    <form method="POST" action="{{ route('contactos.agregar') }}" method="post" id="submit_user">
                        @csrf

                    <div class="input-field col s6">
                      <input placeholder="Placeholder" id="nombre" name="nombre" type="text" class="validate" required>
                      <label for="nombre">* Nombre: </label>
                    </div>
                    <div class="input-field col s6">
                      <input placeholder="Placeholder" id="ap_paterno" name="ap_paterno" type="text" class="validate" required>
                      <label for="ap_paterno">* Apellido paterno: </label>
                    </div>

                    <div class="input-field col s6">
                      <input placeholder="Placeholder" id="ap_materno" name="ap_materno" type="text" class="validate" required>
                      <label for="ap_materno">* Apellido materno: </label>
                    </div>

                    <div class="input-field col s6">
                      <input placeholder="Placeholder" id="fecha_nacimiento" name="fecha_nacimiento" type="text" class="validate" required>
                      <label for="fecha_nacimiento">* Fecha de nacimiento: </label>
                    </div>

                    <div class="input-field col s6">
                      <input placeholder="Placeholder" id="ubicacion" name="ubicacion" type="text" class="validate">
                      <label for="ubicacion">Direccion completa: </label>
                    </div>

                    <div class="input-field col s6">
                      <input placeholder="Placeholder" id="tel_casa" name="tel_casa" type="text" class="validate">
                      <label for="tel_casa">Numero de telefono de casa: </label>
                    </div>

                    <div class="input-field col s6">
                      <input placeholder="Placeholder" id="celular" name="celular" type="text" class="validate" required>
                      <label for="celular">* Numero celular: </label>
                    </div>

                    <div class="row">
                        <div class="col m12 s12 center">
                            <input type="submit" class="btn">
                        </div>
                    </div>
                    </form>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col s12 m2"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript">
        $("#close").click(function() {
            $(".alert-success").hide();
        });
    </script>