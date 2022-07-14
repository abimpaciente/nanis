<meta name="csrf-token-empleados" content="{{ csrf_token() }}">
<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center; margin-top: 50px;">
        <div class="col s6 m6 l6">
        </div>
        <div class="col s6 m6 l6 right-align">
            <a class="tooltipped btn-floating btn-large modal-trigger waves-effect waves-light red" 
            data-position="left" data-tooltip="Agregar nuevo empleado" href="#addempleado" onclick="AddEmpleado()">
            <i class="material-icons">add</i></a>
        </div>
    </div>
</div>


<div class="col s12">
    <div class="row" style="background: white; border-radius: 5px; box-shadow: 0px 1px 1px 1px  #c2c2c2; padding:10px;">
      <p class="flow-text">Empleados</p>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    @csrf
                    <input id="busqueda" type="text" class="validate" onkeyup="searchEmpleados('{{ route('empleados_search') }}')">
                    <label for="busqueda">Busqueda</label>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="row table-responsive" id="content_table_empleados">
                <table class="striped responsive-table" id="table_empleados">
                    <thead>
                    <tr>
                        <th></th>
                        <!-- <th>Id</th> -->
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Tipo</th>
                        <th>Status</th>
                    </tr>
                    </thead>                    
                    <tbody id="table_content_empleados">
                        @foreach ($empleados as $empleado)
                        <tr>
                            <td></td>                            
                            <td>{{$empleado['username']}}</td>
                            <td>{{$empleado['correo']}}</td>
                            <td>
                            <?php
                                foreach($tipos as $clave => $valor)  { 
                                    if ($empleado['tipo']==$clave) {?>
                                        {{$valor}}
                                    <?php 
                                    }
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                            if ($empleado['status']=='1') {
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
                            if ($empleado['status']=='1') {
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger orange darken-2" href="#bajaempleado" onclick="downOutEmpleado('{{$empleado['id']}}')"  data-position="bottom" data-tooltip="Dar de baja"><i class="material-icons">remove</i></a>
                            <?php
                            }else{
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger green darken-2" href="#altaempleado" onclick="downOutEmpleado('{{$empleado['id']}}')"  data-position="bottom" data-tooltip="Dar de alta"><i class="material-icons">add</i></a>
                            <?php
                            }
                            ?>
                            </td>
                            <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger light-blue darken-1" href="#editempleado" onclick="EditEmpleado('{{$empleado['id']}}')" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a></td>
                        </tr>
                    @endforeach     
                    </tbody>
                </table>
                <div class="col-md-12 center text-center">
                    <span class="left" id="total_reg"></span>
                        <ul class="pagination pager" id="table_pager_empleados"></ul>
                </div>
                <script>
                $(document).ready(function(){
                      $('.tooltipped').tooltip(); 
                    updateTable('table_empleados', 'table_pager_empleados');
                });

                function searchEmpleados(url)        
                {
                    var value = $('#busqueda').val();
                    var data = new FormData();
                    data.append('_token', $("meta[name='csrf-token-empleados']").attr("content"));
                    data.append('busqueda',value);
                    $.ajax({
                        url:url,
                        type:'POST',
                        contentType:false,
                        data:data,
                        dataType: "html",
                        processData:false,
                        cache:false,
                        beforeSend: function(){
                        },
                        error: function(request, status, error)
                        {
                        console.log(request);
                        },
                        success:function (data) {

                            $('#table_content_empleados').html(data)
                            updateTable('table_empleados', 'table_pager_empleados');
                        },
                        complete: function (XMLHttpRequest, textStatus) {
                            var headers = XMLHttpRequest.getAllResponseHeaders();
                            /* console.log(headers) */
                        }
                    })      
                }

                function updateTable(table, id_pager){
                $('#'+id_pager).html('')
                $('#'+table).pageMe({
                    pagerSelector:'#'+id_pager,
                    activeColor: 'red darken-2',
                    prevText:'Anterior',
                    nextText:'Siguiente',
                    showPrevNext:true,
                    hidePageNumbers:false,
                    perPage:5
                });
                }
                </script>
            </div>
        </div>
    </div>
</div>
@include('modals.add_empleado')
@include('modals.edit_empleado')
@include('modals.baja_empleado_modal')
@include('modals.alta_empleado_modal')