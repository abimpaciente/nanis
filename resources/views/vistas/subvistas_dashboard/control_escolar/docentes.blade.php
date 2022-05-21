<meta name="csrf-token-docentes" content="{{ csrf_token() }}">

<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;">
        <div class="col s6 m6 l6">
            <p class="flow-text" style="font-size: 35px;">Docentes</p>
            <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Encuentra los docentes registrados.</small></p>
        </div>
        <div class="col s6 m6 l6 right-align">
            <a class="tooltipped btn-floating btn-large modal-trigger waves-effect waves-light red" data-position="left" data-tooltip="Agregar nuevo docente" href="#adddocente" onclick="AddDocente()"><i class="material-icons">add</i></a>
        </div>
    </div>
</div>

<div class="col s12">
    <div class="row" style="background: white; border-radius: 5px; box-shadow: 0px 1px 1px 1px  #c2c2c2; padding:10px;">
        <p class="flow-text">Docentes registrado</p>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <input id="busqueda_docentes" type="text" class="validate" onkeyup="searchDocentes('{{ route('docentes_search') }}', '')">
                    <label for="busqueda_docentes">Busqueda</label>
                </div>              
            </div>
        </div>
        <div class="col s12">
            <div class="row table-responsive">
                <table class="responsive-table striped" id="table_docentes">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Fecha Nacimiento</th>
                        <th>Fecha Ingreso</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Status</th>
                    </tr>
                    </thead>
            
                    <tbody id="table_content_docente">
                        @foreach ($docentes as $docente)
                        <tr>
                            <td></td>
                            <td>{{$docente->nombre." ".$docente->apellidoP." ".$docente->apellidoM}}</td>
                            <td>{{$docente->correo}}</td>
                            <td>{{$docente->telefono}}</td>
                            <td>{{$docente->fecha_nacimiento}}</td>
                            <td>{{$docente->fecha_ingreso}}</td>
                    
                            <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger light-blue darken-1" href="#editdocente" onclick="EditDocente('{{$docente->id}}')" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a></td>
                            <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger red darken-2" href="#deletedocente" data-position="bottom" data-tooltip="Eliminar"><i class="material-icons">delete</i></a></td>
                            <td>
                            <?php
                            if ($docente->status=='1') {
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger orange darken-2" href="#bajadocente" data-position="bottom" data-tooltip="Dar de baja"><i class="material-icons">remove</i></a>
                            <?php
                            }else{
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger green darken-2" href="#bajadocente" data-position="bottom" data-tooltip="Dar de alta"><i class="material-icons">add</i></a>
                            <?php
                            }
                            ?>                            
                            </td>
                            <td>
                                <?php
                                if ($docente->status=='1') {
                                ?>
                                    <a class="tooltipped btn-floating btn-large green darken-2" data-position="left" data-tooltip="Activo"><i class="material-icons">done</i></a>
                                <?php
                                }else{
                                ?>
                                    <a class="tooltipped btn-floating btn-large red darken-2" data-position="left" data-tooltip="Inactivo"><i class="material-icons">remove</i></a>
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
                        <ul class="pagination pager" id="table_pager_docentes"></ul>
                </div>
                <script>
                    $(document).ready(function(){
                        updateTable('table_docentes', 'table_pager_docentes');
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.tooltipped');
    });
    $(document).ready(function(){
        $('.tooltipped').tooltip();
    });

    function searchDocentes(url, value)        
    {
        var value = $('#busqueda_docentes').val();
        var data = new FormData();
        data.append('_token', $("meta[name='csrf-token-docentes']").attr("content"));
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

                $('#table_content_docente').html(data)
                updateTable('table_docentes', 'table_pager_docentes');
            },
            complete: function (XMLHttpRequest, textStatus) {
                var headers = XMLHttpRequest.getAllResponseHeaders();
                /* console.log(headers) */
            }
        })      
    }
    </script>
@include('modals.add_docente') 
@include('modals.edit_docente')   
@include('modals.delete_docente_modal') 
@include('modals.baja_docente_modal')   