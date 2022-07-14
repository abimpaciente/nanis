@foreach ($servicios as $servicio)
    <tr>
        <td></td>
        <!-- <td style="font-weight: bold">{{$servicio['folio']}}</td> -->
        <td>{{$servicio['nombre_cliente']}}</td>
        <td>{{$servicio['comision']}}</td>
        <td>{{$servicio['total']}}</td>
        <td>
        <?php
            foreach($tipos as $clave => $valor)  { 
                if ($servicio['tipo_servicio']==$clave) {?>
                    {{$valor}}
                <?php 
                }
            }
        ?>
        </td>
        <td>{{$servicio['nanny_nombre']}}</td>
        <td>{{$servicio['nanny_carrera']}}</td>
        <td>{{$servicio['forma_pago']}}</td>
        <td>{{$servicio['fecha']}}</td>
        <td>
        <?php
            foreach($procesos as $clave => $valor)  { 
                if ($servicio['status']==$clave) {?>
                    {{$valor}}
                <?php 
                }
            }
        ?>
        </td>

        <td><a class="tooltipped waves-effect waves-light btn-small modal-trigger light-blue darken-1" href="#editservicio" onclick="EditServicio('{{$servicio['id_servicio']}}')" data-position="bottom" data-tooltip="Editar" data-outDuration="50"><i class="material-icons">edit</i></a></td>

    </tr>
@endforeach