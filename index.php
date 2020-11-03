<?php include 'conexion.php';?>
<!Doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <title>Rastreo de pedidos EcSport.shop</title>
    <link rel="icon" href="logo.png">  <meta charset="utf-8">
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />


  </head>

  <body>

    <!-- Begin page content -->

<div class="container">
 <h4 class="mt-5">Rastreo de pedidos EcSports</h4>
 <hr>

<div class="row">
  <div class="col-12 col-md-12">
<!-- Contenido -->   



<ul class="list-group">
  <li class="list-group-item">
<form method="post">
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Curso</label>
      <input required name="PalabraClave" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Ingrese el código de rastreo">  
      <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
    </div>
   
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </div>
  </div>
</form>
  </li>

</ul>


<?php
 
if(!empty($_POST))
{
      $aKeyword = explode(" ", $_POST['PalabraClave']);
      $query ="SELECT * FROM clientes WHERE codigo like '%" . $aKeyword[0] . "%' OR nombres like '%" . $aKeyword[0] . "%'";
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR nombres like '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $result = $db->query($query);
     echo "<br>Pedido<b> ". $_POST['PalabraClave']."</b>";
                     
     if(mysqli_num_rows($result) > 0) {
        $row_count=0;

      echo "<br><table class='table table-striped'>";
         {   
           
            echo " 
            <tr>
            <th>Código de rastreo</th>
            <th>Nombre</th>
            <th>Pedido</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Oficina</th>
            <th>Próxima Oficina</th>
            </tr>";
        }
        echo "</table>";

        echo "<br><table class='table table-striped'>";

        While($row = $result->fetch_assoc()) {   
            $row_count++;                         
            
            echo " 
            <tr>
            <td>". $row['codigo'] . "</td>
            <td>". $row['nombres'] . "</td>
            <td>". $row['pedido'] . "</td>
            <td>". $row['estado'] . "</td>
            <td>". $row['registrado'] . "</td>
            <td>". $row['direccion'] . "</td>
            <td>". $row['poficina'] . "</td>
            </tr>";
        }
        echo "</table>";
	
    }
    else {
        echo "<br>Verifique que el código de rastreo ingresado sea el correcto.";
		
    }
}
 
?>




<!-- Fin Contenido --> 
</div>
</div><!-- Fin row -->
</div><!-- Fin container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    </body>
</html>