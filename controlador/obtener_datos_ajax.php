<?php 
require_once "./../modelo/venta.php";

$data=new venta;
$array_data=array();
$data1=$data->getdatav();

foreach ($data1 as $array_js  ){
    $array_data[]=array("dia"=>$array_js['dia'],
    "monto"=>$array_js['monto'],
    "cantMesas"=>$array_js['cantMesas']);
}

echo  json_encode($array_data);



?>