<?php
include('conexionbd.php');

$sqlcategorias = 'SELECT * FROM categorias';
$resultadocategorias = $conexion->query($sqlcategorias);
?>

<!doctype html>
<html lang="es">
  <head>
    <title>REPORTES PDF</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container"></div>
      <h1 align="center">EJEMPLO DE REPORTES PDF</h1> 
      <br>
      <form action="#" method="POST" class="form-inline">
          <label for="" class="my-1 mr-2" >categoria</label>
          <select name="cat" class="`custom-select my-1 mr-sm-2" required>
              <option value="">seleccionar</option>
              <?php foreach ($resultadocategorias as $nombrecategorias): ?>
                <option value="<?php echo $nombrecategorias['IdCategoria']; ?> "><?php echo $nombrecategorias['NombreC']; ?></option>
                <?php endforeach ?>
          </select>

          <button type="submit" name="mostrar" class="btn btn-primary my-1">mostrar</button>

      </form>
      <?php
      if (isset($_POST['mostrar'])) {
          
           $categoriaseleccionada = $_POST['cat'];
           $sqlproductos = "SELECT p.CodigoP, p.NombreP, p.Precio, c.IdCategoria FROM productos AS p INNER JOIN categorias AS c
                                    ON p.IdCategoria = c.IdCategoria WHERE C.IdCategoria = $categoriaseleccionada ";

            $resultadosproductos = $conexion->query($sqlproductos)                        

      ?>

      <h4 alingn ="center">========= lista de productos</h4>

      <table>
          <thead>
              <tr>
                  <th>codigo</th>
                  <th>producto</th>
                  <th>precio</th>
              </tr>
          </thead>
          <tbody>
              <?php 
              while ($registro = $resultadosproductos->fetch_array()){
                  echo "<tr>
                            <td>".$registro['CodigoP']."</td>
                            <td>".$registro['NombreP']."</td>
                            <td>".$registro['Precio']."</td>
                        </tr>";
              }
              $conexion->close();
              ?>
          </tbody>
      </table>

       <?php
      } else {
          echo'error';
      }

        ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>