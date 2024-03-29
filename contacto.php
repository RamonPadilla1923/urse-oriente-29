<?php 
session_start();
include("conn.php"); 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
	<title>IEA | URSE ORIENTE</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IEA | URSE ORIENTE</title>
  <link rel="shortcut icon" href="imagenes/logo.png" type="image/png">


</head>
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
			        
					<li><a href="admin.php">Ingresar </a></li>
                    <li><a href="index.php">Inicio</a></li>
						<li><a href="works.php">Centros de trabajo</a></li>
						<li><a href="info.php">Conócenos</a></li>
						<li><a href="sueños.php">Programa</a>
					<ul>
					    <li><a href="https://suenos.iea.edu.mx/infos/Presentacion-Los-Suenos-se-Construyen-en-el-Aula.pdf">Los sueños se construyen en el aula</a></li>
						<li><a href="https://www.iea.gob.mx/IEA/sistema-educativo/Calendario-Escolar-2023-2024-BASICA.pdf">Calendario Escolar</a></li>
						<li><a href="sueños.php">Otro</a></li>
					</ul>
				</li>
				<li class="active"><a href="contacto.php">Contacto</a></li>
              
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
            <form class="d-flex ms-auto" method="GET" action="buscador.php">
              <input class="form-control me-2" type="text" name="search" placeholder="Buscar centro de trabajo" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
		    </div>
	  	</div>
	</nav>

	

	<div class="container" style="display: flex; justify-content: space-between;">

    <!-- Contenedor de información (izquierda) -->
    <div class="info-container" style="margin-top: 60px; margin-bottom: 80px; border: 1px solid #ECE1E1; width: 450px;" >
        <h3 style="color: #151859;">Datos de contacto</h3>
        <form action="admin.php" method="POST" style="display: flex; flex-direction: column; align-items: left;">
            <label for="cct"><strong>C.C.T.:</strong></label>
            <input type="text" id="cct" name="cct" value="01ADG0032G" readonly>

            <label for="domicilio"><strong>Domicilio:</strong></label>
            <input type="text" id="domicilio" name="domicilio" value="Isaac Díaz de León s/n. Fracc. Solidaridad III" readonly>

            <label for="cp"><strong>C.P.:</strong></label>
            <input type="text" id="cp" name="cp" value="20298" readonly>

            <label for="telefono"><strong>Teléfono:</strong></label>
            <input type="text" id="telefono" name="telefono" value="917-71-43" readonly>

            <label for="horario"><strong>Horario de Servicio:</strong></label>
            <input type="text" id="horario" name="horario" value="Lunes a Viernes, 8:00 - 15:00 Hrs" readonly>
        </form>
    </div>

    <!-- Contenedor del mapa (derecha) -->
    <div class="map-container" style="margin-top: 60px; margin-bottom: 80px; border: 1px solid #ECE1E1; width: 950px;">
        <h3 style="color: #151859;">Ubicación</h3>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83763.99482214487!2d-102.32973147291798!3d21.900675175425146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429f20be5993719%3A0x2d440240195e4631!2sUnidad%20Regional%20de%20Servicios%20Educativos%20ORIENTE!5e0!3m2!1ses!2smx!4v1697143104323!5m2!1ses!2smx" width="540" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

</div>
<p><a class="link-opacity-100 linksworks" href="index.php">Volver a Inicio</a></p>
	<br><br>
	<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
         
        .navbar {
            border-radius: 20px; 
        }
        .contenedor {
            min-height: 100vh;
            background-color: #3498db; /* Fondo azul */
            color: #fff; /* Texto blanco */
            padding: 20px;
            box-sizing: border-box;
        }
		.info-container {
			
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 20px;
            padding: 20px;
            max-width: 1000px; /* Cambiado a 'max-width' para que no se extienda demasiado */
        }

		.map-container {
			
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 20px;
            padding: 1px;
            max-width: 550px; /* Cambiado a 'max-width' para que no se extienda demasiado */
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #151859; /* Fondo azul más oscuro para el pie de página */
        }
        
        body {
        background-color: #FAFAF3;
        }

        .col {
        margin-top: 10px;
        margin-bottom:20px;
        width: 1150px;
        border-radius: 10px;
        }
    </style>
    <style type="text/css">
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
				background-color:#0F34A0;
				border-radius: 15px;
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

		</style>
</head>
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