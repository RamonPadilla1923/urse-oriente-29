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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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

  body {
    background-color: #FAFAF3;
}

  .col {
    margin-top: 10px;
    margin-bottom:20px;
    width: 1150px;
    border-radius: 10px;
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
</style>
  
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
<br>
<div class="container" style="display: flex; justify-content: space-between;">
<?php 
		if (isset($_GET['school'])) {
	?>
	<?php 
		if(isset($_SESSION['user'])){		 
 	?>
	<button type="button" class="btn btn-primary newcenter" data-bs-toggle="modal" data-bs-target="#exampleModal">
  		Editar centro de trabajo
	</button>
	<?php 
		}
	?>
</div>

	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$id = $_POST["id"];
		    $nombre = $_POST["name"];
		    $direccion = $_POST["address"];
		    $inscritos = $_POST["inscritos"];
		    $clave = $_POST["clave"];

			if(isset($_POST['default'])){
	    		$defecto = 'imagenes/school.png';
	    		$sql = "UPDATE works SET nombre = '$nombre', direccion = '$direccion', inscritos = '$inscritos', clave = '$clave', image = '$defecto' WHERE id = $id";

				if ($conn->query($sql) === TRUE) {
?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
  						<div>
    						Registro actualizado <a href="works.php">Ir al centro de trabajo</a>
  						</div>
  						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
<?php 
		        } else {
?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						<div>
    						Error al actualizar, intenta de nuevo. <a href="works.php">Ir al centro de trabajo</a>
  						</div>
  						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
<?php
				}	
	    	} else {
				if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
		        	$nombreArchivo = $_FILES["foto"]["name"];
		        	$rutaTemporal = $_FILES["foto"]["tmp_name"];
		        	$rutaDestino = "imagenes/" . $nombreArchivo;
		        	
		        	if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
		            	//echo "La imagen se ha subido correctamente.";
		            	$tabla = "works";
		            	$columnaImagen = "image";
	
		    			// Actualizar los valores en la base de datos
		    			$sql = "UPDATE works SET nombre = '$nombre', direccion = '$direccion', inscritos = '$inscritos', clave = '$clave', image = '$rutaDestino' WHERE id = $id";

					    if ($conn->query($sql) === TRUE) {
?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<div>
    								Registro actualizado <a href="works.php">Ir al centro de trabajo</a>
  								</div>
  								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
<?php 
		            	} else {
?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<div>
    								Error al actualizar, intenta de nuevo. <a href="works.php">Ir al centro de trabajo</a>
  								</div>
  								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
<?php 
						}
					}
				}
			}
		}
	?>	

	

	<?php 
	$encrypted_id = $_GET['school'];
	$decrypted_id = base64_decode($encrypted_id);
	
		//$ide = urldecode($_GET['school']);
		$sql = "SELECT * FROM works WHERE id = '$decrypted_id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		// Procesar los datos obtenidos
			while ($row = $result->fetch_assoc()) {
				
							   
	?>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h1 class="modal-title fs-5" id="exampleModalLabel">Editar centro de trabajo</h1>
        			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      			</div>
      			<div class="modal-body">
        			<form action="work.php" method="POST" enctype="multipart/form-data">
        				<div class="mb-3">
        					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					  		<label for="name" class="form-label">Nombre</label>
					  		<input type="text" name="name" class="form-control" id="name" value="<?php echo $row['nombre']; ?>">
						</div>

						<div class="mb-3">
						  <label for="address" class="form-label">Direccion</label>
						  <input type="text" name="address" class="form-control" id="address" value="<?php echo $row['direccion']; ?>">
						</div>

						<div class="mb-3">
						  <label for="inscritos" class="form-label">Total de alumnos inscritos</label>
						  <input type="number" name="inscritos" class="form-control" id="inscritos" value="<?php echo $row['inscritos']; ?>">
						</div>

						<div class="mb-3">
						  <label for="clave" class="form-label">Clave</label>
						  <input type="text" name="clave" class="form-control" id="clave" value="<?php echo $row['clave']; ?>">
						</div>

						<div class="mb-3">
	  						<label for="formFile"class="form-label">Subir una imagen del centro de trabajo</label>
	  						<input class="form-control" type="file" id="formFile" name="foto" value="<?php echo $row['image']; ?>">
						</div>
						<label style="font-size: 12px; margin-left: 10px;">Puedes subir una foto por defecto si no tienes del centro de trabajo</label>
						<div class="form-check">
							<label class="form-check-label" for="flexRadioDefault1">Subir por defecto</label>
						 	<input class="form-check-input" type="radio" name="default" id="flexRadioDefault1">
						</div>

	      		</div>
		      			<div class="modal-footer">
		        			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        			<input type="submit" name="insertwork" class="btn btn-primary" value="Actualizar centro de trabajo">
		      			</div>
        			</form>
    		</div>
  		</div>
	</div>

	<div class="works">
        	<div class="container text-left" style="border:1px solid #ECE1E1; margin:auto; width: 100%; border-radius: 25px;">
				<div class="row align-items-start">
			    	<div class="col">
			    		<br>
						<form action="tu_script_de_procesamiento.php" method="post">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; height: 300px; width: 90%; margin: 0 auto;">

        <div style="width: 45%;">
            <label for="nombre_institucion" style="font-weight: bold; font-size: 18px;">Nombre de la institución:</label><br>
            <input type="text" id="nombre_institucion" name="nombre_institucion" value="<?php echo $row['nombre']; ?>" readonly style="width: 100%;">
            <br><br>

            <label for="direccion" style="font-weight: bold; font-size: 18px;">Dirección:</label><br>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>" readonly style="width: 100%;">
            <br><br>

            <label for="inscritos" style="font-weight: bold; font-size: 18px;">Total de alumnos inscritos:</label><br>
            <input type="text" id="inscritos" name="inscritos" value="<?php echo $row['inscritos']; ?>" readonly style="width: 100%;">
            <br><br>

            <label for="clave" style="font-weight: bold; font-size: 18px;">Clave:</label><br>
            <input type="text" id="clave" name="clave" value="<?php echo $row['clave']; ?>" readonly style="width: 100%;">
            <br><br>
        </div>

        <div style="width: 45%; height: 100%; border: 1px solid red;">
            <iframe 
                src="<?php echo $row['maps']; ?>" 
                width="100%" height="100%" 
                style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </div>
</form>

			    					
			      		<?php 
			      			 	}
							} else {
							    echo "0 resultados";
							}
						?>
			    	</div>
			  	</div>
			</div>
    	<?php
    		} 
		?>
	</div>
</div>

<div class="works">
		
		<p><a class="link-opacity-100 linksworks" href="index.php">Volver a Inicio</a></p>
	</div>
	<br><br>
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
</head>
<body>


 <footer>
	<p>
    <span style="color: #fff;">
        Gobierno del Estado de Aguascalientes 2022 - 2027
        <a class="" href="https://www.aguascalientes.gob.mx/avisodeprivacidad.pdf" style="color: #fff;">Aviso de Privacidad &copy; 2023</a>
    </span>
    </p>
 </footer>

</body>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


