
<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;">
        <div class="col s6 m6 l6">
            <!-- <p class="flow-text" style="font-size: 35px;">{{$usuarios}}</p> -->
            <!-- <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Encuentra registros de {{$tipo}}.</small></p> -->
        </div>
        <div class="col s6 m6 l6 right-align">
            <!-- <a class="tooltipped btn-floating btn-large modal-trigger waves-effect waves-light red" 
            data-position="left" data-tooltip="Agregar nuevo usuario" href="#addusuario" onclick="AddUsuario()">
            <i class="material-icons">add</i></a> -->
        </div>
    </div>
</div>


<div class="col s12">
    <div class="row" style="background: white; border-radius: 5px; box-shadow: 0px 1px 1px 1px  #c2c2c2; padding:10px;">
      <p class="flow-text">{{ucwords($tipo)}}</p>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    @csrf
                    <input id="busqueda" type="text" class="validate" onkeyup="searchUsuarios('{{ route('usuarios_search') }}')">
                    <label for="busqueda">Busqueda</label>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="row table-responsive" id="content_table_usuarios">
                <table class="striped responsive-table" id="table_usuarios">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Tipo Registro</th>
                        <th>Status</th>
                    </tr>
                    </thead>                    
                    <tbody id="table_content_usuarios">
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td></td>
                            <td style="font-weight: bold">{{$usuario['id_cliente_o_nanny']}}</td>
                            <td>{{$usuario['name']}}</td>
                            <td>{{$usuario['last_name']}}</td>
                            <td class="center-align">{{$usuario['correo']}}</td>
                            <td>{{$usuario['tipo_de_registro']}}</td>
                            <td>
                            <?php
                            if ($usuario['status']=='1') {
                            ?>
                                <a class="tooltipped btn-floating btn-large waves-effect waves-light green darken-2" data-position="left" data-tooltip="Activo"><i class="material-icons">done</i></a>
                            <?php
                            }else{
                            ?>
                                <a class="tooltipped btn-floating btn-large red darken-2" data-position="left" data-tooltip="Dado de baja"><i class="material-icons">remove</i></a>
                            <?php
                            }
                            ?>                            
                            </td>
                            <td>
                            <?php
                            if ($usuario['status']=='1') {
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger orange darken-2" href="#bajausuario" onclick="downOutUsuario('{{$usuario['id_cliente_o_nanny']}}')"  data-position="bottom" data-tooltip="Dar de baja"><i class="material-icons">remove</i></a>
                            <?php
                            }else{
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger green darken-2" href="#altausuario" onclick="downOutUsuario('{{$usuario['id_cliente_o_nanny']}}')"  data-position="bottom" data-tooltip="Dar de alta"><i class="material-icons">add</i></a>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                    @endforeach     
                    </tbody>
                </table>
                <div class="col-md-12 center text-center">
                    <span class="left" id="total_reg"></span>
                        <ul class="pagination pager" id="table_pager_usuarios"></ul>
                </div>
                <script>
                $(document).ready(function(){

                    $('.tooltipped').tooltip(); 
                    // updateTable('table_usuarios', 'table_pager_usuarios');
                });
                </script>
            </div>
        </div>
    </div>
</div>

@include('modals.baja_usuario_modal')
@include('modals.alta_usuario_modal')