<?php
  /* Acceso a la informacion de la BD */
  /*Informacion requerida para acceder a la BD
      host: localhost
      nombre BD: checador
      usuario BD: checador
      password: checacor2015
  */
  $servername= "localhost";
  $username = "checador";
  $password = "checador2015";
  $db =  "checador";

  //Crear una coneccion a la base de datos
  $conn =  mysqli_connect($servername, $username, $password, $db);

  //checa el estado de la conexion
  if (!$conn){
    die("Coneccion Fallida: " . mysqli_connect_error());
  }

  if (isset($_GET['user'])){/*confirma si el usuario ya ha proporcionado sus datos*/
    //isset determina si una variable esta definida y no es nulo
    $user = $_GET['user'];
    $pass = $_GET['pass'];
    /*Ahora tenemos que comparar las variables de $user y $pass
    con los valores que estan en la BD*/
    /*tenemos que consultar a la BD para ver si existe el usuario ingresado en $user*/
    $sql = "SELECT usuario, password FROM Usuario where usuario = '$user' and password = '$pass'";
    /*instrucciones en lenguaje SQL para hacer la consulta en la BD de forma segura*/
    echo $sql;
    //para ejecutar la consulta y los resultados esta en $resultados
    $result = mysqli_query($conn, $sql);
    echo "numero de renglones reultado de la consulta:" . mysqli_num_rows($result);

    mysqli_close($conn);
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Asistencias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <!--aqui se incluyn todos los css-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="fondo">
        <script>
            var trans = ['trans20','trans40','trans60','trans80','trans100'];
            for(i=0;i<500;i++) {
            ri = Math.floor(Math.random()*5);
            line = '<div id="c'+i+'" class="cuadros '+trans[ri]+'"></div>';
            document.write(line);
            } /* preguntar al prof de donde sale : ri = Math.floor(Math.random()*5);
            line = '<div id="c'+i+'" class="cuadros '+trans[ri]+'"></div>';
            document.write(line) */
        </script>

    </div> <!--termina cuadros-->

    <div id="pagina">
    <header>
        <h1> <strong>VIRTUAL NET</strong></h1>
        <p>Internet, Papeleria, Mantenimiento, Copias, Diseño y Asesoría.</p>
    </header>

    <section id="contenedor">
      <?php
        include("login.html");
      ?>
    </section>

    <footer>
        <p>www.virtual.com</p>
    </footer>

    </div> <!--termina div pagina-->
</body>
</html>
