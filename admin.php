

<?php
session_start();
include("conn.php");

?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
	<title>IEA | URSE ORIENTE</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="imagenes/logo.png" type="image/png">

    <style>
        /* Estilos para el elemento con la clase labelheader */
        .labelheader {
            color: #071161; /* Cambia esto al color que prefieras */
            font-family: 'Verdana', sans-serif; /* Cambia esto al tipo de letra que prefieras */
        }

        .col {
        margin-top: 10px;
        margin-bottom:20px;
        width: 1150px;
        border-radius: 10px;
    }
    </style>
<body>
<div class="body">
	<div class="container text-center header">
	  	<div class="row align-items-start">
		    <div class="col">
		    	<img src="imagenes/ags.svg" class="imgheader" width="220" height="110">
		    </div>
		    <div class="col">
          
        <label class="labelheader" style="color: #151859;">UNIDAD REGIONAL DE SERVICIOS EDUCATIVOS "ORIENTE"</label>
		    </div>
		    <div class="col">
		    	<img src="imagenes/iea.png" class="imgheader" width="200" height="100">
		    </div>
	  	</div>
	</div>


    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #151859;" style="margin-top: 15px;">

</style>
  
<div class="container-fluid">
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="nav">
			        
                <li class="active"><a href="admin.php">Ingresar</a></li>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="works.php">Centros de trabajo</a></li>
						<li><a href="info.php">Conócenos </a></li>
				        <li><a href="">Programa</a>
					<ul>
                        <li><a href="https://suenos.iea.edu.mx/infos/Presentacion-Los-Suenos-se-Construyen-en-el-Aula.pdf"  target="_blank">Los sueños se construyen en el aula</a></li>
						<li><a href="https://www.iea.gob.mx/IEA/sistema-educativo/Calendario-Escolar-2023-2024-BASICA.pdf"  target="_blank">Calendario Escolar</a></li>
						<li><a href="sueños.php">Otro</a></li>
					</ul>
				</li>
				<li><a href="contacto.php">Contacto</a></li>
		        	<?php 
		        		if(isset($_SESSION['user'])){
                            echo "<div style='display: flex; align-items: center; margin-top: 4px; margin-left: 30px;'>";
                            // Reemplaza 'ruta_de_la_imagen' con la ruta real de tu imagen
                            echo "<img src='imagenes/user.png' alt='Imagen de usuario' style='width: 30px; height: 30px; border-radius: 50%; margin-right: 10px;'>";
                            echo "<label style='font-size: 15px; color: #E3F417; margin-right: 15px;'>";
                            echo $_SESSION['user'];
                            echo "</label>";
                            echo "<a href='logout.php' class='logout-button'>Salir</a>";
                            echo "</div>";
                        }
		        	?>
		      	</ul>
		      	<style>
    /* Estilo para el campo de búsqueda */
    .form-control {
        width: 220px; /* Puedes ajustar este valor según tus necesidades */
    }

    /* Estilo para el botón de búsqueda */
    .btn {
        width: auto;
        height: 40px; /* Esto permite que el ancho del botón se ajuste automáticamente al contenido */
    }
    
    body {
    background-color: #FAFAF3;
    }
</style>

<form class="d-flex ms-auto" method="GET" action="buscador.php">
        <input class="form-control me-2" type="text" name="search" placeholder="Buscar centro de trabajo" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

                
		    </div>
	  	</div>
	</nav>


    <?php
// Mover este bloque de código aquí
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $query = "SELECT user FROM admin WHERE user='$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $_SESSION['user'] = $username;
       
        echo "<div style='text-align: center; color: #008000; padding: 10px; border: 1px solid #008000; margin: 10px;'>
            <p style='font-weight: bold;'>¡Login exitoso! Bienvenido.</p>
        </div>";
    } else {
        // Muestra un mensaje de error si las credenciales son incorrectas
        echo "<div style='text-align: center; color: #ff0000; padding: 10px; border: 1px solid #ff0000; margin: 10px;'>
            <p style='font-weight: bold;'>Nombre de usuario o contraseña incorrecto. Por favor, inténtalo de nuevo.</p>
        </div>";
    }
}
?>

    <style>
        	
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:500px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
            .nav li a {
                background-color: #151859;
                color: #fff;
                text-decoration: none;
                padding: 10px 12px;
                display: block;
                border-radius: 15px;
                border: .1px solid #6E88DA; /* Cambia #ff0000 al color que desees para el borde */
            }
			
			.nav li a:hover {
				background-color:#0F47A0;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				
				top:0px;
			}
            .nav li.active a {
             color: #ffffff; /* Cambia el color de texto a blanco o el color deseado */
             background-color: #0F34A0; /* Cambia el color de fondo a azul o el color deseado */
			 border-radius: 15px;
			 
            }

        .navbar{
            border-radius: 20px; 
        }


        .logout-button {
           display: inline-block;
          padding: 6px 10px;
          background-color: #F3166A; 
          color: #fff;
          text-decoration: none;
          border-radius: 5px;
          transition: background-color 0.3s ease;
          border: .1px solid #6E88DA;
        }

       .logout-button:hover {
          background-color: #151859;
          color: #fff;
        }



        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 20px;
            width: 300px;
            margin: auto;
            padding: 20px; /* Añadido padding al contenedor */
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            display: block;
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 90%;
            padding: 12px;
            background-color: #1565C0;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0D47A1;
        }

        .contenedor {
            flex: 1;
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #FAFAF3;
        }

        .body {
            flex: 1; /* Asegura que el contenido ocupe todo el espacio disponible en el cuerpo */
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #151859;
            color: #fff;
            width: 100%; /* Asegura que el footer ocupa todo el ancho */
        }
    </style>
</head>


<body>
    <?php
    if (!isset($_SESSION['user'])) {
    ?>
       <div class="login-container" style="margin-top: 80px; margin-bottom: 80px; border: 1px solid #ECE1E1;">
       <h2 style="color: #151859;">Iniciar Sesión</h2>
       <form action="admin.php" method="POST" style="display: flex; flex-direction: column; align-items: center;">
    <input type="text" placeholder="Usuario" name="user" style="margin-bottom: 10px;">
   
    <button type="submit">Ingresar</button>
</form>

     </div>

    <?php } ?>
</div>

    <footer>
        <p>
            <span style="color: #fff;">
                Gobierno del Estado de Aguascalientes 2022 - 2027
                <a class="" href="https://www.aguascalientes.gob.mx/avisodeprivacidad.pdf" style="color: #fff;">Aviso de Privacidad &copy; 2023</a>
            </span>
        </p>
    </footer>
</body>

</html>
