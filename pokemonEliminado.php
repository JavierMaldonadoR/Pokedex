<?php
	// conectar
	$m = new MongoClient( "mongodb://root:root@ds019482.mlab.com:19482/pokemon");
	// seleccionar una base de datos
	$db = $m->pokemon;
	// seleccionar una colección (equivalente a una tabla en una base de datos relacional)
	$coleccion = $db->Pokedex;

	$id = (int) $_GET['id'];
	$editQuery = array('numero' => $id);
	$coleccion->remove($editQuery);

	header('Location: Pokedex.php?accion=3');
 ?>