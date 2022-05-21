
<div class="col s12">
    <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;">
        <div class="col s6 m6 l6">
            <p class="flow-text" style="font-size: 35px;">Ordenes</p>
            <p class="flow-text" style="color: rgb(126, 126, 126)"><small>Encuentra las ordenes registradas.</small></p>
        </div>
        <div class="col s6 m6 l6 right-align">
            <a class="tooltipped btn-floating btn-large modal-trigger waves-effect waves-light red" data-position="left" data-tooltip="Agregar nuevo orden" href="#addorden" onclick="AddOrden()"><i class="material-icons">add</i></a>
        </div>
    </div>
</div>


<div class="col s12">
    <div class="row" style="background: white; border-radius: 5px; box-shadow: 0px 1px 1px 1px  #c2c2c2; padding:10px;">
      <p class="flow-text">Ordenes registradas</p>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    @csrf
                    <input id="busqueda" type="text" class="validate" onkeyup="searchOrdenes('{{ route('ordenes_search') }}')">
                    <label for="busqueda">Busqueda</label>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="row table-responsive" id="content_table_ordenes">
                <table class="striped responsive-table" id="table_ordenes">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Orden</th>
                        <th>De</th>
                        <th>Para</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Pago</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    
                </table>
                <div class="col-md-12 center text-center">
                    <span class="left" id="total_reg"></span>
                        <ul class="pagination pager" id="table_pager_ordenes"></ul>
                </div>
                <script>
                $(document).ready(function(){
                    updateTable('table_ordenes', 'table_pager_ordenes');
                });
                </script>
            </div>
        </div>
    </div>
</div>