<?php
$para      = 'daniel7solis@gmail.com';
$titulo = 'El título';
$mensaje = 'Hola';
$cabeceras = 'From: daniel7solisr@gmail.com';

mail($para, $titulo, $mensaje, $cabeceras);
?>