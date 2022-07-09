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

