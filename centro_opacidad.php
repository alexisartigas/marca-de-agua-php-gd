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
$porcentajeOpacidad = 15; # Porcentaje


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
# Usar imagecopymerge en lugar de imagecopy
# La diferencia es que al final se indica el porcentaje
imagecopymerge($original, $marcaDeAgua, $xOriginal, $yOriginal, $xMarcaDeAgua, $yMarcaDeAgua, $anchuraMarcaDeAgua, $alturaMarcaDeAgua, $porcentajeOpacidad);

# Imprimir y liberar recursos
header('Content-Type: image/png');
imagepng($original);
imagedestroy($original);
imagedestroy($marcaDeAgua);