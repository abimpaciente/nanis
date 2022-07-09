
<meta name="csrf-token-promos" content="{{ csrf_token() }}">
<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;">
        <div class="col s6 m6 l6">
            <!-- <p class="flow-text" style="font-size: 35px;">{{$promos}}</p> -->
            <!-- <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Encuentra las promos.</small></p> -->
        </div>
        <div class="col s6 m6 l6 right-align">
            <a class="tooltipped btn-floating btn-large modal-trigger waves-effect waves-light red" 
            data-position="left" data-tooltip="Agregar nuevo promo" href="#addpromo" onclick="AddPromo()">
            <i class="material-icons">add</i></a>
        </div>
    </div>
</div>


<div class="col s12">
    <div class="row" style="background: white; border-radius: 5px; box-shadow: 0px 1px 1px 1px  #c2c2c2; padding:10px;">
      <p class="flow-text">Promociones</p>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    @csrf
                    <input id="busqueda" type="text" class="validate" onkeyup="searchPromos('{{ route('promos_search') }}')">
                    <label for="busqueda">Busqueda</label>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="row table-responsive" id="content_table_promos">
                <table class="striped responsive-table" id="table_promos">
                    <thead>
                    <tr>
                        <th></th>
                        <!-- <th>Id</th> -->
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Servicio</th>
                        <th>Descuento</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Status</th>
                    </tr>
                    </thead>                    
                    <tbody id="table_content_promos">
                        @foreach ($promos as $promo)
                        <tr>
                            <td></td>                            
                            <!-- <td style="font-weight: bold">{{$promo['id']}}</td> -->
                            <td>{{$promo['promo_code']}}</td>
                            <td>{{$promo['descripcion']}}</td>
                            <td class="center-align">{{$promo['servicio']}}</td>
                            <td>{{$promo['discount']}}</td>
                            <td>{{$promo['fecha_inicio']}}</td>
                            <td>{{$promo['fecha_fin']}}</td>
                            <td>
                            <?php
                            if ($promo['status_promo']=='1') {
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
                            if ($promo['status_promo']=='1') {
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger orange darken-2" href="#bajapromo" onclick="downOutPromo('{{$promo['promo_code']}}')"  data-position="bottom" data-tooltip="Dar de baja"><i class="material-icons">remove</i></a>
                            <?php
                            }else{
                            ?>
                                <a class="tooltipped waves-effect waves-light btn-small modal-trigger green darken-2" href="#altapromo" onclick="downOutPromo('{{$promo['promo_code']}}')"  data-position="bottom" data-tooltip="Dar de alta"><i class="material-icons">add</i></a>
                            <?php
                            }
                            ?>
                            </td>
                            <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger light-blue darken-1" href="#editpromo" onclick="EditPromo('{{$promo['promo_code']}}')" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a></td>
                        </tr>
                    @endforeach     
                    </tbody>
                </table>
                <div class="col-md-12 center text-center">
                    <span class="left" id="total_reg"></span>
                        <ul class="pagination pager" id="table_pager_promos"></ul>
                </div>
                <script>
                $(document).ready(function(){
                      $('.tooltipped').tooltip(); 
                    updateTable('table_promos', 'table_pager_promos');
                });

                function searchPromos(url)        
                {
                    var value = $('#busqueda').val();
                    var data = new FormData();
                    data.append('_token', $("meta[name='csrf-token-promos']").attr("content"));
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

                            $('#table_content_promos').html(data)
                            updateTable('table_promos', 'table_pager_promos');
                        },
                        complete: function (XMLHttpRequest, textStatus) {
                            var headers = XMLHttpRequest.getAllResponseHeaders();
                            /* console.log(headers) */
                        }
                    })      
                }
                </script>
            </div>
        </div>
    </div>
</div>

@include('modals.add_promo')
@include('modals.edit_promo')
@include('modals.baja_promo_modal')
@include('modals.alta_promo_modal')