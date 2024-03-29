<?php 

	$servername = "localhost"; // Cambia esto si tu base de datos no está en el servidor local
	$username = "root"; // Reemplaza con el nombre de usuario de tu base de datos
	$password = ""; // Reemplaza con la contraseña de tu base de datos
	$dbname = "residencias"; // Reemplaza con el nombre de la base de datos que deseas usar

	// Crear la conexión
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Verificar si la conexión se estableció correctamente
	if ($conn->connect_error) {
	    die("Error en la conexión: " . $conn->connect_error);
	}
	
?>	