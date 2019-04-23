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

# Como vamos a centrar  necesitamos sacar antes las anchuras y alturas
$anchuraOriginal = imagesx($original);
$alturaOriginal = imagesy($original);
$alturaMarcaDeAgua = imagesy($marcaDeAgua);
$anchuraMarcaDeAgua = imagesx($marcaDeAgua);
# En dónde poner la marca de agua sobre la original
$centroHorizontalDeOriginal = floor($anchuraOriginal / 2);
$centroHorizontalDeMarcaDeAgua = floor($anchuraMarcaDeAgua / 2);
$centroVerticalDeOriginal = floor($alturaOriginal / 2);
$centroVerticalDeMarcaDeAgua = floor($alturaMarcaDeAgua / 2);
$centroHorizontal = $centroHorizontalDeOriginal - $centroHorizontalDeMarcaDeAgua;
$centroVertical = $centroVerticalDeOriginal - $centroVerticalDeMarcaDeAgua;

$xOriginal = $centroHorizontal;
$yOriginal = $centroVertical;
# Desde dónde comenzar a cortar la marca de agua (si son 0, se comienza desde el inicio)
$xMarcaDeAgua = 0;
$yMarcaDeAgua = 0;
# Hasta dónde poner la marca de agua sobre la original
$alturaMarcaDeAgua = $alturaMarcaDeAgua - $yMarcaDeAgua;
$anchuraMarcaDeAgua = $anchuraMarcaDeAgua - $xMarcaDeAgua;
imagecopy($original, $marcaDeAgua, $xOriginal, $yOriginal, $xMarcaDeAgua, $yMarcaDeAgua, $anchuraMarcaDeAgua, $alturaMarcaDeAgua);


/**
 * Para poner varias marcas de agua simplemente cambia
 * las coordenadas y llama a imagecopy las veces necesarias
 * 
 */


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


/**
 * Cuando estés satisfecho con el resultado llama a imagepng
 */
# Imprimir y liberar recursos
header('Content-Type: image/png');
imagepng($original);
imagedestroy($original);
imagedestroy($marcaDeAgua);