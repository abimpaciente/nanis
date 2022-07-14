
@foreach ($empleados as $empleado)
<tr>
    <td></td>                            
    <td>{{$empleado['username']}}</td>
    <td>{{$empleado['correo']}}</td>
    <td class="center-align">
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
