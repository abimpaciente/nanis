
<meta name="csrf-token-servicios_<?php echo str_replace(' ', '_',$orden); ?>" content="{{ csrf_token() }}">
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
            <!-- <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Encuentra los servicios.</small></p> -->
        </div>
        <div class="col s6 m6 l6 right-align">
          
            <!-- <a class="tooltipped btn-floating btn-large modal-trigger waves-effect waves-light red" data-position="left" data-tooltip="Agregar nueva orden" href="#addorden" onclick="AddOrden()"><i class="material-icons">add</i></a> -->
            
        </div>
    </div>
</div>


<div class="col s12">
    <div class="row" style="background: white; border-radius: 5px; box-shadow: 0px 1px 1px 1px  #c2c2c2; padding:10px;">
      <p class="flow-text"><?php echo "Servicio con status " .  $orden ?></p>
            <div class="col s12">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    @csrf
                    <input id="busqueda" type="text" class="validate" onkeyup="searchServicios('{{ route('servicios_search') }}')">
                    <label for="busqueda">Busqueda</label>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="row table-responsive" id="content_table_servicios_<?php echo str_replace(' ', '_',$orden); ?>">
                <table class="striped responsive-table" id="table_servicios_<?php echo str_replace(' ', '_',$orden); ?>">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Folio</th>
                        <th>Comision</th>
                        <th>Total</th>
                        <th>Servicio</th>
                        <th>Cliente</th>
                        <th>Nani</th>
                        <th>Carrera</th>
                        <th>Pago</th>
                        <th>Fecha</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tbody id="table_content_servicios_<?php echo str_replace(' ', '_',$orden); ?>">
                        @foreach ($servicios as $servicio)
                        <tr>
                            <td></td>
                            <td style="font-weight: bold">{{$servicio['folio']}}</td>
                            <td>{{$servicio['comision']}}</td>
                            <td>{{$servicio['total']}}</td>
                            <td>{{$servicio['tipo_servicio']}}</td>
                            <td>{{$servicio['nombre_cliente']}}</td>
                            <td>{{$servicio['nanny_nombre']}}</td>
                            <td>{{$servicio['nanny_carrera']}}</td>
                            <td>{{$servicio['forma_pago']}}</td>
                            <td>{{$servicio['fecha']}}</td>
                            <td>{{$servicio['status']}}</td>

                            <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger light-blue darken-1" href="#editservicio" onclick="EditServicio('{{$servicio['id_servicio']}}')" data-position="bottom" data-tooltip="Editar" data-outDuration="50"><i class="material-icons">edit</i></a></td>
    
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="col-md-12 center text-center">
                    <span class="left" id="table_pager_servicios_<?php echo str_replace(' ', '_',$orden); ?>_total_reg"></span>
                        <ul class="pagination pager" id="table_pager_servicios_<?php echo str_replace(' ', '_',$orden); ?>"></ul>
                </div>
                <script>
                $(document).ready(function(){
                    updateTable('table_servicios_<?php echo str_replace(' ', '_',$orden); ?>', 'table_pager_servicios_<?php echo str_replace(' ', '_',$orden); ?>');
                });
                </script>
            </div>
        </div>
    </div>
</div>

<script>
    function searchServicios(url)
    {
        var value = $('#busqueda').val();
        var data = new FormData();
        data.append('_token', $("meta[name='csrf-token-servicios_<?php echo str_replace(' ', '_',$orden); ?>']").attr("content"));
        data.append('busqueda',value);
        $.ajax({
            url:'{{route('servicios_search')}}',
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
                $('#table_content_servicios_<?php echo str_replace(' ', '_',$orden); ?>').html(data)
                updateTable('table_servicios_<?php echo str_replace(' ', '_',$orden); ?>', 'table_pager_servicios_<?php echo str_replace(' ', '_',$orden); ?>');
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

