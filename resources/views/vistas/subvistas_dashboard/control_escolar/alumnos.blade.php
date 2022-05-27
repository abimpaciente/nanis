
<meta name="csrf-token-alumnos" content="{{ csrf_token() }}">
<style>
    .material-tooltip > .backdrop {
    background-color:#cc0000;
}

.material-tooltip > span {
    font-size:22px;
    padding:10px;
}
</style>
<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;">
        <div class="col s6 m6 l6">
            <p class="flow-text" style="font-size: 35px;"><?php echo $orden ?></p>
            <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Encuentra los ordenes <?php echo $orden ?>.</small></p>
        </div>
        <div class="col s6 m6 l6 right-align">
            <?php
            if ($orden=='En curso') {
            ?>
                <a class="tooltipped btn-floating btn-large modal-trigger waves-effect waves-light red" data-position="left" data-tooltip="Agregar nueva orden" href="#addalumno" onclick="AddAlumno()"><i class="material-icons">add</i></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="col s12">
    <div class="row" style="background: white; border-radius: 5px; box-shadow: 0px 1px 1px 1px  #c2c2c2; padding:10px;">
      <p class="flow-text"><?php echo "Ordenes " . $orden ?></p>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    @csrf
                    <input id="busqueda" type="text" class="validate" onkeyup="searchAlumnos('{{ route('alumnos_search') }}')">
                    <label for="busqueda">Busqueda</label>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="row table-responsive" id="content_table_alumnos">
                <table class="striped responsive-table" id="table_alumnos">
                    <thead>
                    <tr>
                        <th></th>
                        <!-- <th>Matrícula</th> -->
                        <th>Nombre</th>
                        <th>Correo</th>
                        <!-- <th>Carrera</th> -->
                        <th>Teléfono</th>
                        <th>Fecha Nacimiento</th>
                        <!-- <th>Fecha Ingreso</th> -->
                        <th></th>
                        <th></th>
                        <th></th>
                        <!-- <th>Kardex</th> -->
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tbody id="table_content_alumnos">
                        @foreach ($alumnos as $alumno)
                        <tr>
                            <td></td>
                            <!-- <td style="font-weight: bold">{{$alumno->matricula}}</td> -->
                            <td>{{$alumno->nombre." ".$alumno->apellidoP." ".$alumno->apellidoM}}</td>
                            <td>{{$alumno->correo}}</td>
                            <td>{{$alumno->telefono}}</td>
                            <td>{{$alumno->fecha_nacimiento}}</td>
                            <!-- <td>{{$alumno->fecha_ingreso}}</td> -->

                            <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger light-blue darken-1" href="#editalumno" onclick="EditAlumno('{{$alumno->id}}')" data-position="bottom" data-tooltip="Editar" data-outDuration="50"><i class="material-icons">edit</i></a></td>
                            <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger red darken-2" href="#deletealumno" onclick="eliminarAlumno('{{$alumno->id}}')" data-position="bottom" data-tooltip="Eliminar"><i class="material-icons">delete</i></a></td>
                            <td>
                            <?php
                            if ($alumno->status=='1') {
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger orange darken-2" href="#bajaalumno" onclick="downOutAlumno('{{$alumno->id}}')"  data-position="bottom" data-tooltip="Dar de baja"><i class="material-icons">remove</i></a>
                            <?php
                            }else{
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger green darken-2" href="#altaalumno" onclick="downOutAlumno('{{$alumno->id}}')"  data-position="bottom" data-tooltip="Dar de alta"><i class="material-icons">add</i></a>
                            <?php
                            }
                            ?>
                            </td>
                            <!-- <td><a class="tooltipped btn waves-effect waves-light red darken-4 btn-small"  onclick="getPDF('{{$alumno->id}}', '{{$alumno->matricula}}')" data-position="left" data-tooltip="Descargar Kardex"><i class="material-icons center">picture_as_pdf</i></a></td> -->
                            <td>
                                <?php
                                if ($alumno->status=='1') {
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="col-md-12 center text-center">
                    <span class="left" id="total_reg"></span>
                        <ul class="pagination pager" id="table_pager_alumnos"></ul>
                </div>
                <script>
                $(document).ready(function(){
                    updateTable('table_alumnos', 'table_pager_alumnos');
                });
                </script>
            </div>
        </div>
    </div>
</div>

<style>
    /* The Modal (background) */
    .modalPDFViewer {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 20000000 !important;
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modalPDFViewer-content {
      background-color: #fefefe;
      margin: auto;
      border: 1px solid #888;
      width: 80%;
      border-radius: 12px 12px 0px 0px;
      padding-left: 15px;
      padding-right: 15px;
    }
    </style>
<div id="viewer_pdf" class="modalPDFViewer">
    <div class="modalPDFViewer-content">
        <div class="row">
        <div class="col s12">
            <div class="row text-center">
            <iframe style="width:100%;height:800px;border-radius: 10px 10px 0px 0px;" id="iframeViewerPDF"></iframe>
            </div>
        </div>

            <script type="text/javascript">
            function viewerPDF(pdf)
            {
                var modalsettings = document.getElementById("viewer_pdf");
                var output = document.getElementById('iframeViewerPDF');
                output.src = "";
                var aceptarNuevoCliente = document.getElementById("aceptarviewer_pdf");

                $('#viewer_pdf').show(500);
                modalsettings.style.display = "block";


                aceptarNuevoCliente.onclick = function() {
                    $('#viewer_pdf').hide(500);
                    modalsettings.style.display = "none";;
                }

                window.onclick = function(event) {
                    if (event.target == modalsettings) {
                    modalsettings.style.display = "none";
                    }
                }
                //pdf = pdf.replace("https://www.tradconsultores.com/", "../");
                output.src = pdf;
                offLoad()
            }
        </script>
        <div class="col s12 text-center">
            <div class="row" style="margin-top:10px;margin-bottom:10px;height: 1px; background: lightgray;">
            </div>
        </div>
        <div class="col s12 text-center">
            <div class="row" style="padding:10px;">
                <div class="col s12 right-align">
                    <a id="aceptarviewer_pdf" class="waves-effect waves-light btn-large blue darken-1">Aceptar</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
    function searchAlumnos(url)
    {
        var value = $('#busqueda').val();
        var data = new FormData();
        data.append('_token', $("meta[name='csrf-token-alumnos']").attr("content"));
        data.append('busqueda',value);
        $.ajax({
            url:'{{route('alumnos_search')}}',
            type:'POST',
            contentType:false,
            data:data,
            //dataType: "html",
            processData:false,
            cache:false,
            async: false,
            xhrFields: {
                responseType: 'html'
            },
            beforeSend: function(){
            },
            error: function(request, status, error)
            {
            console.log(request);
            },
            success:function (data) {
                $('#table_content_alumnos').html(data)
                updateTable('table_alumnos', 'table_pager_alumnos');
            },
            complete: function (XMLHttpRequest, textStatus) {
                var headers = XMLHttpRequest.getAllResponseHeaders();
                /* console.log(headers) */
            }
        })
    }

    function getPDF(id_alumno, matricula)
    {
        var data = new FormData();
        data.append('_token', $("meta[name='csrf-token-alumnos']").attr("content"));
        data.append('id_alumno',id_alumno);
        $.ajax({
            url:'{{route('alumno_kardex_pdf')}}',
            type:'POST',
            contentType:false,
            data:data,
            //dataType: "html",
            processData:false,
            cache:false,
            xhrFields: {
                responseType: 'blob'
            },
            beforeSend: function(){
                onLoad()
            },
            error: function(request, status, error)
            {
                offLoad()
            console.log(request);
            },
            success:function (data) {
                const blob = new Blob([data], {type: "application/pdf"});
                var width = document.body.clientWidth;
                if(width<=990){
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = matricula+".pdf";
                    link.click();
                    offLoad()
                }else{
                    var fileData = window.URL.createObjectURL(blob);
                    viewerPDF(fileData);
                }               

            },
            complete: function (XMLHttpRequest, textStatus) {
                var headers = XMLHttpRequest.getAllResponseHeaders();
                /* console.log(headers) */
            }
        })
    }



    function exportExcel()
    {
        var data = new FormData();
        data.append('_token', $("meta[name='csrf-token-alumnos']").attr("content"));
        $.ajax({
            url:'{{route('alumnos_excel')}}',
            type:'POST',
            contentType:false,
            data:data,
            //dataType: "json",
            processData:false,
            cache:false,
            xhrFields: {
                responseType: 'blob'
            },
            beforeSend: function(){
                onLoad()
            },
            error: function(request, status, error)
            {
                offLoad()
                console.log(request);
            },
            success:function (data) {

                var blob = new Blob([data]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                var today = new Date().toLocaleString("es-ES", {timeZone: "America/Mexico_City"});
                /* var day = today.getDate();
                var month = today.getMonth();
                var year = today.getFullYear(); */
                link.download = "Alumnos_"+today.replace(" ", "_")+".xlsx";
                link.click();
                offLoad()
            },
            complete: function (XMLHttpRequest, textStatus) {
                var headers = XMLHttpRequest.getAllResponseHeaders();
                /* console.log(headers) */
            }
        })
    }

    function capitalizarLetter(value, thisData)
    {
        if (value!='')
        {
        $(thisData).val(toTitleCase(value))
        }
    }
    function toTitleCase( str )
    {
        return str.split(/\s+/).map( s => s.charAt( 0 ).toUpperCase() + s.substring(1).toLowerCase() ).join( " " );
    }
    </script>
@include('modals.add_alumno')
@include('modals.edit_alumno')
@include('modals.delete_alumno_modal')
@include('modals.baja_alumno_modal')
@include('modals.alta_alumno_modal')
