<?php 

	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];

	$fecha_nacimiento = $_POST['dia_nacimiento'];
	$fecha_nacimiento .= "/";
	$fecha_nacimiento .= $_POST['mes_nacimiento'];
	$fecha_nacimiento .= "/";
	$fecha_nacimiento .= $_POST['anyo_nacimiento'];

	$direccion = $_POST['direccion'];
	$direccion .= " ";
	$direccion .= $_POST['codigo_postal'];
	$direccion .= " ";
	$direccion .= $_POST['ciudad'];
	$direccion .= " ";
	$direccion .= $_POST['pais'];

	$email = $_POST['email'];

	$telefono = $_POST['prefijo'];
	$telefono .= $_POST['telefono'];

	$nombre_usuario = $_POST['nombre_usuario'];
	$contraseña = $_POST['contraseña'];

	$info_adicional = $_POST['info_adicional'];

	if (!($iden = mysql_connect("127.0.0.1", "javiercela", ""))) {
		die("Errore: non e' possibile collegarsi al server.");
	}
		

	if (!(mysql_select_db("tweb", $iden))) {
		die("Errore: non esiste la db.");
	}

	$sentencia = "SELECT * FROM usuarios WHERE nombre_usuario = '";
	$sentencia .= $nombre_usuario;
	$sentencia .= "'";

	$verificar = mysql_query($sentencia, $iden);

	if ($verificar) {
		die("Errore: c'e' gia' un'altro utente con questo nome. Segli un'altro nome di utente per favore.");
	}

	$insertar = "INSERT INTO usuarios(nome, cognome, data_nascita, indirizzo, email, telefono, informazione, nome_utente, password, valutazione) VALUES (";
	$insertar .= $nombre;
	$insertar .= ", ";
	$insertar .= $apellidos;
	$insertar .= ", ";
	$insertar .= $direccion;
	$insertar .= ", ";
	$insertar .= $telefono;
	$insertar .= ", ";
	$insertar .= $info_adicional;
	$insertar .= ", ";
	$insertar .= $nombre_usuario;
	$insertar .= ", ";
	$insertar .= $contraseña;
	$insertar .= ", 0.0)";

	$verificar = mysql_query($insertar, $iden);

	if (!$verificar) {
		die("Errore: non e' possibile registrare il nuovo utente.");
	}

	mysql_free_result($verificar);

	mysql_close($iden);

?>