<div class="col s12">
    <div class="row">
      <p class="flow-text">Mis Dispositivos</p>
      <table class="responsive-table striped">
        <thead>
          <tr>
            <th></th>
            <th>Navegador</th>
            <th>Dispositivo</th>
            <th>Fecha</th>
            <th>IP</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($misdispositivos as $dispositivos)
              <tr>
                <td>
                  <?php
                  if ($dispositivos->tipo=='android') {
                    ?>
                    <img src="img/icons-devices/android.png" style="padding:10px;width:70px;" >
                    <?php
                  }else if ($dispositivos->tipo=='OSX') {
                    ?>
                    <img src="img/icons-devices/macos-iphone.png" style="padding:10px;width:70px;" >
                    <?php
                  }else if ($dispositivos->tipo=='ios') {
                    ?>
                    <img src="img/icons-devices/macos-iphone.png" style="padding:10px;width:70px;" >
                    <?php
                  }else if ($dispositivos->tipo=='windows') {
                    ?>
                    <img src="img/icons-devices/windows.png" style="padding:10px;width:70px;" >
                    <?php
                  }
                  ?>
                </td>
                <td>{{$dispositivos->navegador}}</td>
                <td>{{$dispositivos->dispositivo}}</td>
                <td>{{$dispositivos->fecha}}</td>
                <td>{{$dispositivos->ip}}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>