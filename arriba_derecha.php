<?php
/**
 * Ejemplos de cómo poner marcas de agua con PHP y GD
 * 
 * @author parzibyte
 */
$rutaImagenOriginal = __DIR__ . "/codigo.png";
$rutaMarcaDeAgua = __DIR__ . "/marca.png";

$original = imagecreatefrompng($rutaImagenOriginal);
$marcaDeAgua = imagecreatefrompng($rutaMarcaDeAgua);

# Necesitamos sacar antes las anchuras y alturas
$anchuraOriginal = imagesx($original);
$alturaMarcaDeAgua = imagesy($marcaDeAgua);
$anchuraMarcaDeAgua = imagesx($marcaDeAgua);


# En dónde poner la marca de agua sobre la original
$xOriginal = $anchuraOriginal - $anchuraMarcaDeAgua;
$yOriginal = 0;


# Desde dónde comenzar a cortar la marca de agua (si son 0, se comienza desde el inicio)
$xMarcaDeAgua = 0;
$yMarcaDeAgua = 0;


# Hasta dónde poner la marca de agua sobre la original
$alturaMarcaDeAgua = $alturaMarcaDeAgua - $yMarcaDeAgua;
$anchuraMarcaDeAgua = $anchuraMarcaDeAgua - $xMarcaDeAgua;
imagecopy($original, $marcaDeAgua, $xOriginal, $yOriginal, $xMarcaDeAgua, $yMarcaDeAgua, $anchuraMarcaDeAgua, $alturaMarcaDeAgua);

# Imprimir y liberar recursos
header('Content-Type: image/png');
imagepng($original);
imagedestroy($original);
imagedestroy($marcaDeAgua);