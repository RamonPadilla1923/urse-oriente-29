<?php 
session_start();
include("conn.php"); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>IEA | URSE ORIENTE</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagenes/logo.png" type="image/png">

    <style>
        /* Otros estilos */
        body {
            background-color: #FAFAF3;
        }

        .col {
            margin-top: 10px;
            margin-bottom: 20px;
            width: 1150px;
            border-radius: 10px;
        }

        /* Estilos específicos para el menú desplegable */
        .navbar {
            border-radius: 20px;
            position: relative;
            z-index: 2; /* Ajusta este valor según sea necesario */
        }
    </style>
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

<div class="container-fluid">
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="nav">
			        
					<li><a href="admin.php">Ingresar </a></li>
          <li class="active"><a href="index.php">Inicio</a></li>
						<li><a href="works.php">Centros de trabajo</a></li>
						<li><a href="info.php">Conócenos </a></li>
						<li><a href="sueños.php">Programa</a>
					<ul>
          <li><a href="https://suenos.iea.edu.mx/infos/Presentacion-Los-Suenos-se-Construyen-en-el-Aula.pdf"  target="_blank">Los sueños se construyen en el aula</a></li>
          <a href="https://www.iea.gob.mx/IEA/sistema-educativo/Calendario-Escolar-2023-2024-BASICA.pdf" target="_blank">Calendario Escolar</a></li>
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
		      	<form class="d-flex ms-auto" method="GET" action="buscador.php">
        <input class="form-control me-2" type="text" name="search" placeholder="Buscar centro de trabajo" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
		    </div>
	  	</div>
	</nav>

  <style>
    #carousel-container {
      max-height: 450px;
      max-width: 950px;
     
      margin: auto;
      overflow: hidden;
      position: relative;
    }

    #image-carousel {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .carousel-image {
      width: 100%;
      height: auto;
    }

    #prevBtn, #nextBtn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 50px;
      cursor: pointer;
      opacity: 0; /* Inicialmente invisibles */
      background: transparent;
      border: none;
      color: white; /* Color del icono */
      transition: opacity 0.3s ease;
    }

    #prevBtn:hover, #nextBtn:hover {
      background: rgba(255, 255, 255, 0.5); /* Color de fondo al pasar el mouse */
    }

    #prevBtn {
      left: 10px;
    }

    #nextBtn {
      right: 10px;
    }

    #carousel-container:hover #prevBtn,
    #carousel-container:hover #nextBtn {
      opacity: 1; /* Se vuelven visibles al pasar el mouse sobre el contenedor */
    }

    .info-container {
    margin-top: 10px;
    margin-bottom: 15px;
    border: 1px solid #ECE1E1;
    width: 1150px;
    border-radius: 10px;
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





<div id="carousel-container">
  <div id="image-carousel">
    <img class="carousel-image" src="imagenes/img.jpeg" alt="Imagen 1">
    <img class="carousel-image" src="imagenes/sueños.jpg" alt="Imagen 3">
  </div>

  <button id="prevBtn" onclick="prevImage()">&#10094;</button>
  <button id="nextBtn" onclick="nextImage()">&#10095;</button>
</div>

<script>
  let currentIndex = 0;
  const totalImages = document.querySelectorAll('.carousel-image').length;

  function showImage(index) {
    const carousel = document.getElementById('image-carousel');
    carousel.style.transform = `translateX(${-index * 100}%)`;
  }

  function nextImage() {
    currentIndex = (currentIndex + 1) % totalImages;
    showImage(currentIndex);
  }

  function prevImage() {
    currentIndex = (currentIndex - 1 + totalImages) % totalImages;
    showImage(currentIndex);
  }

  setInterval(nextImage, 4000);
</script>

	<div class="works">
  <div class="info-container text-center" style="margin-top: 10px; margin-bottom: 15px; border: 1px solid #D8D5D5; width: 1150px; border-radius: 10px;" >
       
  <h4 style="color: #151859;">Algunos Centros de Trabajo</h4>
		
    </div>
		<div class="container text-center">
  			<div class="row align-items-start">
  				<?php 
  					$sql = "SELECT * FROM works limit 4";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // Procesar los datos obtenidos
					    while ($row = $result->fetch_assoc()) {
				?>
							<div class="col">
    <div class="card" style="height: 400px; position: relative;">
        <br>
        <img src="<?php echo $row['image']; ?>" class="card-img-top imgworks" width="220" height="120">
        <div class="card-body" align="left">
            <h5 class="card-title"><?php echo $row["nombre"]; ?></h5>
            <p class="card-text"><?php echo $row["direccion"]; ?></p>
        </div>
        <div style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); text-align: center;">
            <?php
            $encrypted_id = base64_encode($row["id"]);
            echo '<a href="work.php?school=' . $encrypted_id . '" class="btn btn-primary btnWorks" style="width: 110px; padding: 10px; margin-bottom:20px;" >Ir</a>';

            //echo $encrypted_id;                        
            ?>
        </div>
    </div>
</div>

				<?php
					    }
					} else {
					    echo "0 resultados";
					}

					// Cerrar la conexión cuando hayas terminado de usarla
					$conn->close();
  				?>
  			</div>
		</div>
		<p><a class="link-opacity-100 linksworks" href="works.php">Ver más centros de trabajo</a></p> 
	</div>
	<br><br>
	<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83763.99482214487!2d-102.32973147291798!3d21.900675175425146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429f20be5993719%3A0x2d440240195e4631!2sUnidad%20Regional%20de%20Servicios%20Educativos%20ORIENTE!5e0!3m2!1ses!2smx!4v1697143104323!5m2!1ses!2smx" width="1120" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

	</div>
	<br><br>
	<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar{
            border-radius: 20px; 
        }

        .contenedor {
            min-height: 100vh;
            background-color: #3498db; /* Fondo azul */
            color: #fff; /* Texto blanco */
            padding: 20px;
            box-sizing: border-box;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #151859; /* Fondo azul más oscuro para el pie de página */
        }
        .col {
        margin-top: 10px;
        margin-bottom:20px;
        width: 1150px;
        border-radius: 10px;
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



