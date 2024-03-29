<?php 
session_start();
include("conn.php"); ?>
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
  <title>Tu Sitio Web</title>
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
    <label class="labelheader" style="color: #151859;" >UNIDAD REGIONAL DE SERVICIOS EDUCATIVOS "ORIENTE"</label>
</div>
		    <div class="col">
		    	<img src="imagenes/iea.png" class="imgheader" width="200" height="100">
		    </div>
	  	</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #151859;" style="margin-top: 10px;">
		<div class="container-fluid">
		    
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="nav">
			        
                        <li><a href="admin.php">Ingresar</a></li>
						<li><a href="index.php">Inicio</a></li>
						<li class="active"><a href="works.php">Centros de trabajo</a></li>
						<li><a href="info.php">Conócenos</a></li>
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

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$nombre = $_POST["name"];
	   	$direccion = $_POST["address"];
	   	$inscritos = $_POST["inscritos"];
	    $clave = $_POST["clave"];
	    
	    if(isset($_POST['default'])){
	    	$defecto = 'imagenes/school.png';
	    	$stmt->bind_param("sssss", $nombre, $direccion, $inscritos, $clave, $defecto);		
	    } else {
			if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
		        $nombreArchivo = $_FILES["foto"]["name"];
		        $rutaTemporal = $_FILES["foto"]["tmp_name"];
		        $rutaDestino = "imagenes/" . $nombreArchivo;

		        // Mover el archivo a la carpeta de destino
		        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
		            //echo "La imagen se ha subido correctamente.";
		            $tabla = "works";
		            $columnaImagen = "image";
		            
		            $sql = "INSERT INTO works (nombre, direccion, inscritos, clave, image) VALUES (?, ?, ?, ?, ?)";
		    		$stmt = $conn->prepare($sql);
		            
		            $stmt->bind_param("sssss", $nombre, $direccion, $inscritos, $clave, $rutaDestino);

		            // Ejecutar la consulta
		            if ($stmt->execute()) {
?>	
						<div class="alert alert-success alert-dismissible fade show" role="alert">
  							<div>
    							Registro Exitoso <a href="works.php">Ir al centro de trabajo</a>
  							</div>
  							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
<?php 
		            } else {
?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
  							<div>
    							Error al guardarlo, intenta de nuevo. <a href="works.php">Ir al centro de trabajo</a>
  							</div>
  							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
<?php
		               // echo "Error al guardar la ruta de la imagen en la base de datos: " . $conn->error;
		            }
		        } else {
?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
  							<div>
    							Error al subir la imagen, intenta de nuevo.
  							</div>
  							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
<?php
		        }
		    } else {
?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
  							<div>
    							Falta subir la imagen o selecciona la opción de subir imagen por defecto.
  							</div>
  							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
<?php
		    }
		}
	}

?>


<br><div class="info-container text-center" style="border: 1px solid #D8D5D5; width: 1150px; border-radius: 10px;" >
    <h4 style="color: #151859;">Centros de Trabajo Pertenecientes al U.R.S.E. Oriente</h4>
    </div>
	
	<?php 
		if(isset($_SESSION['user'])){
	?>
	<br><button type="button" class="btn btn-primary newcenter" data-bs-toggle="modal" data-bs-target="#exampleModal">
  		Agregar nuevo 
	</button>
	<br>
	
	
	
	<?php 
		}
	?>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo centro de trabajo</h1>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
        			<form action="works.php" method="POST" enctype="multipart/form-data">
        				<div class="mb-3">
					  		<label for="name" class="form-label">Nombre</label>
					  		<input type="text" name="name" class="form-control" id="name" placeholder="">
						</div>

						<div class="mb-3">
						  <label for="address" class="form-label">Direccion</label>
						  <input type="text" name="address" class="form-control" id="address" placeholder="">
						</div>

						<div class="mb-3">
						  <label for="inscritos" class="form-label">Total de alumnos inscritos</label>
						  <input type="number" name="inscritos" class="form-control" id="inscritos" placeholder="">
						</div>

						<div class="mb-3">
						  <label for="clave" class="form-label">Clave</label>
						  <input type="text" name="clave" class="form-control" id="clave" placeholder="">
						</div>

						<div class="mb-3">
	  						<label for="formFile"class="form-label">Subir una imagen del centro de trabajo</label>
	  						<input class="form-control" type="file" id="formFile" name="foto">
						</div>
						<label style="font-size: 12px; margin-left: 10px;">Puedes subir una foto por defecto si no tienes del centro de trabajo</label>
						<div class="form-check">
							<label class="form-check-label" for="flexRadioDefault1">Subir por defecto</label>
						 	<input class="form-check-input" type="radio" name="default" id="flexRadioDefault1">
						</div>

	      		</div>
		      			<div class="modal-footer">
		        			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        			<input type="submit" name="insertwork" class="btn btn-primary" value="Insertar centro de trabajo">
		      			</div>
        			</form>
    		</div>
  		</div>
	</div>

	<div class="works">
		<?php 
			$sql = "SELECT * FROM works";
			$result = $conn->query($sql);

 			if ($result->num_rows > 0) {
            $count = 0;
            	while ($row = $result->fetch_assoc()) {
                	if ($count % 4 === 0) {
                    	echo '<div class="row">';
                	}
					echo '<div class="col-md-3">';
                    echo '<div class="card" style="height:350px; position:relative; display: flex; flex-direction: column; justify-content: space-between;">';

                    // Centrar la imagen horizontalmente
                    echo '<img src="' . $row["image"] . '" width="220" height="140" class="imgworkscard mx-auto">';

                    echo '<h5 class="name_work card_title">' . $row["nombre"] . '</h5>';
                    echo '<p class="card_text name_work">' . $row["direccion"] . '</p>';

                    $encrypted_id = base64_encode($row["id"]);

                    echo '<div style="margin-top: auto; text-align: center;">';  // Añadido text-align: center
					echo '<a href="work.php?school=' . $encrypted_id . '" class="btn btn-primary btnWorks" style="width: 110px; padding: 10px; margin-bottom:20px;" >Ir</a>';
                    echo '</div>';

                    echo '</div>';
                    echo '<br>';
                    echo '</div>';
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';

                	// Cierra la fila de Bootstrap después de 4 columnas
                	if ($count % 4 === 3) {
                    	echo '</div>';
                	}
                	$count++;
            	}

            // Cierra la fila de Bootstrap si el número total de registros no es divisible por 4
            if ($count % 4 !== 0) {
                echo '</div>';
            }
        } else {
            echo "No se encontraron registros.";
        }

        // Cierra la conexión
        $conn->close();
		?>
		
	</div>
</div>
<div class="works">
		
		0
	</div>
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
<footer>
	<p>
    <span style="color: #fff;">
        Gobierno del Estado de Aguascalientes 2022 - 2027
        <a class="" href="https://www.aguascalientes.gob.mx/avisodeprivacidad.pdf" style="color: #fff;">Aviso de Privacidad &copy; 2023</a>
    </span>
    </p>
</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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