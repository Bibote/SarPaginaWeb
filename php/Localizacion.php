<?php
$datos = json_decode( file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR'].'?fields=status,message,country,regionName,city'), true );
      if(($datos['status'])=='success') {
        $pais=$datos['country'];
        $region=$datos['regionName'];
        $ciudad=$datos['city'];
        echo "<h3>Localización cliente</h3><br>
          <center><table border='1' bgcolor='AFEEEE'>
              <tr>
                <td>Pais</td>
                <td>Region</td>
                <td>Ciudad</td>
              </tr>
              <tr>
                <td> $pais </td>
                <td> $region </td>
                <td> $ciudad </td>
              </tr>
              </table>";
              
      }
      else {
        print_r("No disponible");
      }
?>