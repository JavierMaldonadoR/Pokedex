<?php
function generaDatos(){
//conectar
$m = new MongoClient( "mongodb://root:root@ds019482.mlab.com:19482/pokemon");
// seleccionar una base de datos
$db = $m->pokemon;
// seleccionar una colección (equivalente a una tabla en una base de datos relacional)
$colección = $db->Pokedex;
// encontrar todo lo que haya en la colección
$cursor = $colección->find();
switch ($_GET['orden']) {
case 'numero':
$cursor->sort(array('numero' => 1));
break;
case 'nombre':
$cursor->sort(array('nombre' => 1));
break;
case 'tipo1':
$cursor->sort(array('tipos.0' => 1));
break;
case 'tipo2':
$cursor->sort(array('tipos.1' => 1));
break;
case 'evolucion':
$cursor->sort(array('evolucion' => 1));
break;
}
$json = array();

foreach($cursor as $item) {
$informacion = array(
'numero'     => $item['numero'],
'nombre'    => $item['nombre'],
'tipo1'    => $item['tipos'][0],
'tipo2'       => $item['tipos'][1],
'evolucion'  => $item['evolucion'],
);
array_push($json, $informacion);
}
return $json;
}
?>