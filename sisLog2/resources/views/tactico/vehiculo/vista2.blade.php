
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte MERS</title>
    
    <style type="text/css">

      hr {
          border-color: #66BDA9;
          height: 1px;
          margin: 5px 0;
          display: block;
          clear: both;
      }

      table {
            border: #CC5A6A 1px solid;

      }

      th,tr,td{
            border: #66BDA9 1px solid;
      }

    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="..\public\img\MERS.png" width="100" height="100">
      </div>
      <h1 align="center"><font color="#66BDA9">Redes Moviles de El Salvador - Reporte de Existencia de Vehiculos con Desperfectos</font></h1>
      
      
      <br><br><br><br>


    </header>
    <main>
      <table align="center" >
        <thead>
          <tr>
            <th class="Irregularidad" bgcolor="#D0D3D4">Id Vehiculo</th>
            <th class="Irregularidad" bgcolor="#D0D3D4">Marca Vehiculo</th>
            <th class="Irregularidad" bgcolor="#D0D3D4">Tipo Desperfecto</th>
            
          </tr>

        </thead>
        <tbody>

          




            @foreach ($anys as $any)
         <tbody>
          <tr>
         
          
        
          
            <td class="Irregularidad"><div align="left">{{ $any->IDVEHICULO }}</div></td>
            <td class="Irregularidad"><div align="left">{{ $any->MARCAVEHICULO }} </div></td></td>
            <td class="Irregularidad"><div align="left">{{ $any->TIPODESPERFECTO }}</div></td></td>
           
          
         </tbody>
        </tr>
          </tbody>      
  @endforeach


      </table>
      
    </main>
    <footer>
      <br><br>
      <hr>
      <br>
      <center>Reporte de Apoyo para los tomadores de decision de nivel Tactico de la Empresa MERS</center>
    </footer>
  </body>
</html>