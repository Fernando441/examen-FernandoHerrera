    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <style type="text/css">
		.button-style-icon {
		    width: 20px;
		    margin-top: -3px;
		    margin-right: 5px;
		}
        .alert-success{
            background-color: #58D68D;
        }
    </style>


  <div class="row" style="margin-top: 50px;">
  	<div class="col s12 m2"></div>
    <div class="col s12 m8">

        <div class="row">
            <div class="col m12 s12">
                <a href="{{ url('/') }}">  <i class="material-icons">add_circle</i>
  Agregar contacto</a>
            </div>
        </div>

      <div class="card">
        <div class="card-content">
          <span class="card-title">Lista de contactos</span>

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
            <table id="usuariosSistema" class="table w-100">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" class="gone">Nombre</th>
                        <th scope="col" class="text-center">Apellido Paterno</th>
                        <th scope="col" class="text-center">Apellido Materno</th>
                        <th scope="col" class="text-center gone">Fecha nacimiento</th>
                        <th scope="col" class="text-center">Direccion</th>
                        <th scope="col" class="text-center">Numero casa</th>
                        <th scope="col" class="text-center">Numero celular</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($contactos as $cont)
                    <tr>
                        <td></td>
                        <td class="gone">{{ $cont->nombre }}</td>
                        <td class="text-center">{{ $cont->ap_paterno }}</td>
                        <td class="text-center">{{ $cont->ap_materno }}</td>
                        <td class="text-center">{{ $cont->fecha_nacimiento }}</td>
                        <td class="text-center">{{ $cont->ubicacion }}</td>
                        <td class="text-center">{{ $cont->telefono_casa }}</td>
                        <td class="text-center">{{ $cont->telefono_celular }}</td>
                        <td>
                        	<div class="row">
                        		<div class="col s6 m6">
		                            <a title="Editar contacto" href="{{route('contactos.editar', $cont->id )}}" class="modal-trigger">
		                            <img src="/img/editar-contacto.png" class="button-style-icon m-2">
		                            </a>
                        		</div>
                        		<div class="col s6 m6">
		                            <div data-id="{{$cont->id}}"  alt="Eliminar contacto" title="Eliminar contacto" class="delete">
		                            <img src="/img/eliminar.png" class="button-style-icon">		
		                           	</div>
                        		</div>
                        	</div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>



        </div>

      </div>
    </div>

    <div class="col s12 m2"></div>
  </div>

    <form method="post" id="usuario_delete_form" action="{{ route('contactos.delete') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id_delete" value="">
    </form>


  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  	<script type="text/javascript" src="/js/materialize.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript">


        $("#close").click(function() {
            $(".alert-success").hide();
        });

        $(".delete").click(function() {
            id = $(this).data('id');

            swal({
                    title: "Estas seguro de eliminar el registro",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById("id_delete").value = id;
                        swal("Espere un momento, la información esta siendo procesada", {
                            icon: "success",
                            buttons: false,
                        });

                        document.getElementById("usuario_delete_form").submit();

                    } else {
                        swal("La accion fue cancelada!");
                    }
                });

        });
	</script>