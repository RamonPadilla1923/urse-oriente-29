<?php include("conn.php"); ?>
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
                        <li><a href="index.php">Inicio</a></li>
						<li><a href="works.php">Centros de trabajo</a></li>
						<li><a href="info.php">Conócenos</a></li>
						<li><a href="programa.php">Programa</a>
					<ul>
					<li><a href="https://suenos.iea.edu.mx/infos/Presentacion-Los-Suenos-se-Construyen-en-el-Aula.pdf"  target="_blank">Los sueños se construyen en el aula</a></li>
						<li><a href="https://www.iea.gob.mx/IEA/sistema-educativo/Calendario-Escolar-2023-2024-BASICA.pdf"  target="_blank">Calendario Escolar</a></li>
						<li><a href="sueños.php">Otro</a></li>
					</ul>
				</li>
				<li><a href="contacto.php">Contacto</a></li>
					
		        	<?php 
		        		if(isset($_SESSION['user'])){
                            echo "<label style='margin-top:8px; margin-left:70px; font-size:15px; color: #E3F417;'>"; 
                            echo "Bienvenido ".$_SESSION['user'];
                            echo "<a href='logout.php' style='margin-left: 15px; color: #E3F417;'>Salir</a>";
                            echo "</label>";
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
	<div class="info-container text-center" style="margin-top: 10px; margin-bottom: 15px; width: 1150px; border: 1px solid #D8D5D5; " >
       
  <h4 style="color: #151859;">Resultados encontrados:</h4>
		
    </div>
	
	
	<div class="works">
		<?php 
		if (isset($_GET['search'])) {
			$nombre = urldecode($_GET['search']);
			//echo $nombre;
			$sql = "SELECT * FROM works WHERE nombre LIKE '%$nombre%'";
			$result = $conn->query($sql);

 			if ($result->num_rows > 0) {
            $count = 0;
            	while ($row = $result->fetch_assoc()) {
                	if ($count % 4 === 0) {
                    	echo '<div class="row">';
                	}
					echo '<div class="col-md-3">';
                		echo '<div class="card">';
	                		echo '<center>';
	                		echo '<img src="'.$row["image"].'" width="200" height="150" class="imgworkscard">';
	                		echo '</center>';
	                		echo '<h5 class="name_work card_title">' . $row["nombre"] . '</h5>'; 
	                		echo '<p class="card_text name_work">' .$row["direccion"] . '</p>';
	                		//echo '<a href="work.php?school=' . $row["nombre"] . '" class="btn btn-primary btnWorks">Ir</a>';
	                		$encrypted_id = base64_encode($row["id"]);
                        	echo '<a href="work.php?school=' . $encrypted_id . '" class="btn btn-primary btnWorks">Ir</a>';
							echo '<br>';
                		echo '</div>';
                		echo '<br>';
                	echo '</div>';
                	echo '<br>';echo '<br>';echo '<br>';

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
    }

        // Cierra la conexión
        $conn->close();
		?>
		<p><a class="link-opacity-100 linksworks" href="works.php">Ver más centros de trabajo</a></p>
		
	</div>
</div>

<br><br>
<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar{
             border-radius: 20px; 
			 margin-bottom: 20px;
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

		.info-container {
        margin-bottom: 5px;
        border: 1px solid #ECE1E1;
        width: 300px;
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