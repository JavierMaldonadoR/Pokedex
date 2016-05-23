<?php
// conectar
$m = new MongoClient( "mongodb://root:root@ds019482.mlab.com:19482/pokemon");
// seleccionar una base de datos
$db = $m->pokemon;
// seleccionar una colección (equivalente a una tabla en una base de datos relacional)
$colección = $db->Pokedex;

$numero = (int) $_GET['id'];
$nombre = $_POST['nombre'];
$tipo1 = $_POST['tipo1'];
$tipo2 = $_POST['tipo2'];
$evolucion = $_POST['evolucion'];
$imagen = $_POST['imagen'];

$newdata = array('$set' => array("nombre" => $nombre,
                                 "tipos.0" => $tipo1,
                                 "tipos.1" => $tipo2,
                                 "evolucion" => $evolucion,
                                 "imagen" => $imagen));
$colección->update(array("numero" => $numero), $newdata);

header('Location: Pokedex.php?accion=2');