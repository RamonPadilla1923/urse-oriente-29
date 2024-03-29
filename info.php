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
			        
            <li><a href="admin.php">Ingresar</a></li>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="works.php">Centros de trabajo</a></li>
						<li class="active"><a href="info.php">Conócenos</a></li>
				        <li><a href="">Programa</a>
					<ul>
            <li><a href="https://suenos.iea.edu.mx/infos/Presentacion-Los-Suenos-se-Construyen-en-el-Aula.pdf"  target="_blank">Los sueños se construyen en el aula</a></li>
						<li><a href="https://www.iea.gob.mx/IEA/sistema-educativo/Calendario-Escolar-2023-2024-BASICA.pdf"  target="_blank">Calendario Escolar</a></li>
						<li><a href="sueños.php">Otro</a></li>
					</ul>
				</li>
        <li class="nav-item">
        <li><a href="contacto.php">Contacto</a></li>
		        	</li>
              
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

	<style>
		body {
            padding-top: 10px; /* Padding en la parte superior de la página */
        }
		/* Estilos para los contenedores */
        .contenedor {
            display: flex;
            margin-bottom: 20px;
            border: 2px solid #151859; /* Borde de 1px */
            margin: 1px; /* Margen de 1px */
            overflow: hidden; /* Para contener los elementos hijos flotantes */
            width: 1148px; /* Ancho del contenedor */
            height: 350px; /* Alto del contenedor */
        }

        /* Estilos para el lado izquierdo (información) */
        .informacion {
            flex: 1; /* Toma el 50% del ancho del contenedor */
            padding: 20px;
            background-color: #151859 ; /* Color de fondo para el lado izquierdo E9319E*/
        }

        /* Estilos para el lado derecho (imagen) */
        .imagen {
            flex: 1; /* Toma el 50% del ancho del contenedor */
            overflow: hidden; /* Evita que la imagen se extienda más allá del contenedor */
        }

        .imagen img {
            width: 100%; /* Hace que la imagen ocupe el 100% del ancho del contenedor */
            height: auto; /* Mantiene la proporción de la imagen */
        }

        /* Asegurar que los elementos flotantes se limpien correctamente */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }




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
        
    </style>
</head>
<body>
   
<div class="contenedor">
<!-- Sección 1 -->
<div class="section">
  <div class="text">
  <h5 style="color: #151859;">Recepción</h5>
  </div>
  <div class="image">
    <img src="imagenes/sisaae12.jpeg" alt="Imagen 2" style="width: 400px; height: 250px;">
  </div>
</div>

<!-- Sección 2 -->
<div class="section">
  
  <div class="text">
    <h5 style="color: #151859;">¿Qué es la U.R.S.E.?</h5>
  </div>
  <div class="image">
  <p style="color: black; text-align: justify;">
  La Unidad Regional de Servicios Educativos, también conocida anteriormente como Coordinación y después Centro de Desarrollo Educativo, es un espacio donde se encuentran situados los Supervisores de zonas escolares de los tres niveles educativos que conforman la Educación Básica:
  </p>
  <ul style="color: black; text-align: justify; list-style-type: disc;">
<li>Preescolar</li>
<li>Primaria</li>
<li>Secundaria</li>
</ul>
  
<p style="color: black; text-align: justify; list-style-type: disc;">
Organizados por Regiones y Municipios.
</p>
  </div>
</div>


<!-- Sección 3 -->
<div class="section">
  <div class="text">
  <h5 style="color: #151859;">Oficinas</h5>
  </div>
  <div class="image">
    <img src="imagenes/sisaae8.jpeg" alt="Imagen 3" style="width: 400px; height: 250px;">
  </div>
</div>
</div>
   

            
    <style>
    .justificado {
      text-align: justify;
    }

    .contenedor {
            width: 1150px;
            height: 450px;
            background-color: #3498db;
            border-radius: 20px; /* Ajusta este valor según tus preferencias */
    }

    .section {
            border-radius: 20px; 
    } 
    .text{
          border-radius: 20px; 
    }

    .navbar{
      border-radius: 20px; 
      margin-top: 20px;

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


    .col {
        margin-top: 10px;
        margin-bottom:20px;
        width: 1150px;
        border-radius: 10px;
    }
    .navbar {
            border-radius: 20px;
            position: relative;
            z-index: 2; /* Ajusta este valor según sea necesario */
        }

  </style>

    <!-- Tercer div -->
    <div class="contenedor">
<br>
    <!-- Sección 1 -->
    <div class="section">
      <div class="text">
        <h5 style="color: #151859;">Planta Alta</h5>
      </div>
      <div class="image">
        <img src="imagenes/sisaae11.jpeg" alt="Imagen 1" style="width: 450px; height: 300px;">
      </div>
    </div>

    <!-- Sección 2 -->
    <div class="section">
      <div class="text">
      <h5 style="color: #151859;">¿Qué hacemos?</h5>
      </div>
      <div class="image">
      <p style="color: black; text-align: justify;">
      En las instalaciones de las Unidades Regionales se realizan gran parte de procesos tanto técnico-pedagógicos como administrativos; procesos que involucran a los jardines de niños y/o escuelas primarias y secundarias.

<br>Por ejemplo, coordinan las aplicaciones de Evaluaciones como:</p>
<ul style="color: black; text-align: justify; list-style-type: disc;">
    <li><a href="http://planea.sep.gob.mx/bienvenida/">PLANEA</a></li>
    <li><a href="https://www.aefcm.gob.mx/gbmx/convocatorias/archivos-2023/2023-06-21/index.html#:~:text=El%20%22Concurso%20de%20la%20Olimpiada,sexto%20grado%20de%20educaci%C3%B3n%20primaria.">Olimpiada del Conocimiento Infantil (OCI)</a></li>
</ul>

<p style="color: black; text-align: justify;">También se realizan acompañamientos pedagógicos a docentes y directivos, seguimiento al funcionamiento de los Consejos Escolares de Participación Social (CEPS) y diversos programas federales.
</p>


      </div>
    </div>

   
    </div>


    <!-- Tercer div -->
    <div class="contenedor">
<br>
    <!-- Sección 1 -->
    <div class="section">
      
      <div class="text">
        <h5 style="color: #151859;">Planta Baja</h5>
      </div>
      <div class="image">
        <img src="imagenes/sisaae7.jpeg" alt="Imagen 1" style="width: 400px; height: 250px;">
      </div>
     

    </div>

    <!-- Sección 2 -->
    <div class="section">
      <div class="text">
      <h5 style="color: #151859;">Otros Proceos</h5>
      </div>
      <div class="image">
      <p style="color: black; text-align: justify;">
    Asimismo se llevan a cabo procesos administrativos inherentes a la Educación Básica como:
</p>

<ul style="color: black; text-align: justify; list-style-type: disc;">
    <li>Control Escolar</li>
    <li>Distribución de Cheques y Nómina</li>
    <li>Entrega de materiales diversos</li>
    <li>Asesoría en el uso del SIPPE</li>
    <li>Entre otros...</li>
    
</ul>

      </div>
    </div>

    <!-- Sección 3 -->
    <div class="section">
      <div class="text">
      <h5 style="color: #151859;">Fachada Principal</h5>
      </div>
      <div class="image">
        <img src="imagenes/img.jpeg" alt="Imagen 3" style="width: 400px; height: 250px;">
      </div>
    </div>
    </div>



   



</head>
<body>
	

<style>
    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .container {
      display: flex;
      width: 100%;
      height: 115px; /* Puedes ajustar la altura del contenedor aquí */
    }

    .section {
      flex: 1;
      text-align: center;
      border: 1px solid #ccc;
    }

    .text {
      padding: 20px;
      background-color: #f0f0f0;
    }

    .image {
      padding: 20px;
    }

    .image img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<p><a class="link-opacity-100 linksworks" href="index.php">Volver a Inicio</a></p>
<body>

	<br><br>
  
	<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .contenedor {
          min-height: 460px;
            background-color: #FAFAF3; 
            color: #fff; /* Texto  */
            padding: 20px;
            box-sizing: border-box;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #151859; /* Fondo azul más oscuro para el pie de página */
        }
        .back-to-top {
             display: none;
             position: fixed;
             bottom: 20px;
             right: 20px;
             cursor: pointer;
        }

        .back-to-top img {
             width: 60px; /* Ajusta el ancho según tu necesidad */
             height: auto; /* Mantén la proporción de la imagen */
             }

        /* Mostrar el botón cuando se hace scroll hacia abajo */
         body.scrolled .back-to-top {
            display: block;
        }


  body {
    background-color: #FAFAF3;
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

    <a href="#" class="back-to-top">
    <img src="imagenes/btn-arriba.png" alt="Volver Arriba">
    </a>
    <script>
  // Detectar el scroll y mostrar/ocultar el botón
  document.addEventListener("scroll", function() {
    var scrollY = window.scrollY;
    var body = document.querySelector("body");
    
    if (scrollY > 200) {
      body.classList.add("scrolled");
    } else {
      body.classList.remove("scrolled");
    }
  });
</script>
</body>
</html>