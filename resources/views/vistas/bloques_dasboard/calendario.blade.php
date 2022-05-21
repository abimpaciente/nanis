
<style>
    #hoySelect 
{
  color:white;
  cursor: pointer;
  background:#cc6521;
  text-align: center;
  -webkit-transition: width 2s, height 4s; /* For Safari 3.1 to 6.0 */
  transition: width 2s, height 4s;
}
#hoySelect:hover 
{
  -webkit-transition: width 2s, height 4s; /* For Safari 3.1 to 6.0 */
  transition: width 2s, height 4s;
  padding: 2px;
  transform: scale(1.2);
  background:#cc6521;
  color:white;
}
  /*Fin de semana*/
#hoySelectJQFinSemana 
{
  cursor: pointer;
  background:  #af0000  ;
  text-align: center;
  color:white;
  -webkit-transition: width 2s, height 4s; /* For Safari 3.1 to 6.0 */
  transition: width 2s, height 4s;
  color:white;
}

td.tip {
    text-align: center;
    text-decoration: none
    z-index: 100;

}
td.tip:hover {
    z-index: 100;
    position: relative
}
td.tip span {
    display: none
}
td.tip:hover span {
    padding: 5px 20px 5px 5px;
    display: block;
    z-index: 100;
    background:  #af0000  ;
    left: 30px;
    font-size: 10px;
    border-radius: 5px;
    margin: 10px;
    width: 150px;
    position: absolute;
    top: 30px;
    text-decoration: none;
}
</style>
<div class="col s12">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="containerMes">
              <div class="grafica3_dashboard_3" style="z-index: 0;">
                
                <?php
                  # definimos los valores iniciales para nuestro calendario
                  $diaActual=date("j");
        
                  $month=date("n");
                  $year=date("Y");
        
                  # Obtenemos el dia de la semana del primer dia
                  # Devuelve 0 para domingo, 6 para sabado
                  $diaSemana=date("w",mktime(0,0,0,$month,1,$year))+8;
        
                  # Obtenemos el ultimo dia del mes
                  $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1)); 
        
                  $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                ?>
                <div class="footer_grafica3">
                    <div class="row" style="margin: 10px;">
                      
                      <div class="col s12 text-center">
                        <font style="font-size: 25px;">{{$meses[$month]." ".$year}}</font>
                      </div>
                      
                    </div>
                  </div>
                <div class="table-responsive-sm">
                  <table id='mytable' class='table table-bordred table-striped table-hover' >
                    <thead class="card-panel red darken-3 white-text">
                      <th><div align='center' style="font-size: 10px;">Domingo</div></th>
                      <th><div align='center' style="font-size: 10px;">Lunes</div></th>
                      <th><div align='center' style="font-size: 10px;">Martes</div></th>
                      <th><div align='center' style="font-size: 10px;">Miércoles</div></th>
                      <th><div align='center' style="font-size: 10px;">Jueves</div></th>
                      <th><div align='center' style="font-size: 10px;">Viernes</div></th>
                      <th><div align='center' style="font-size: 10px;">Sábado</div></th>
                    </thead>
                    <tbody >
                        <?php
                          //print_r($yearQuery);
                          $last_cell=$diaSemana+$ultimoDiaMes;
                          // hacemos un bucle hasta 42, que es el máximo de valores que puede
                          // haber... 6 columnas de 7 dias
                          for($i=1;$i<=44;$i++)
                          {
                            if($i==$diaSemana)
                            {
                              // determinamos en que dia empieza
                              $day=1;
                            }
                            if($i<$diaSemana || $i>=$last_cell)
                            {
                              // celca vacia
                              echo "<td></td>";
                            }else
                            {
                              // mostramos el dia
                              if($day==$diaActual)
                              {
                                  ?>
                                  <td class="tip" id="hoySelect" style="font-size: 13px;"><?php echo $day;?><span>Hoy</span></td>
                                  <?php                      
                              }
                              else
                              {
                                if ($i%7==0) 
                                {
                                  ?>
                                  <td class="tip" id="hoySelectJQFinSemana" style="font-size: 13px;"><?php echo $day;?></td>
                                <?php
                                }else if ($i%7==1) 
                                {
                                  ?>
                                  <td class="tip" id="hoySelectJQFinSemana" style="font-size: 13px;"><?php echo $day;?></td>
                                <?php
                                }else 
                                {
                                  ?>
                                  <td class="tip" style="font-size: 13px;cursor: pointer;" data-toggle="modal" data-target="#motivo_dia" ><?php echo $day;?></td>
                                <?php                              
                                }
                              }
                              $day++;
                            }
                            // cuando llega al final de la semana, iniciamos una columna nueva
                            if($i%7==0)
                            {
                            echo "</tr>
                            <tr>\n";
                            }
                          }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>