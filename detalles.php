<!-- <?php

require 'config/database.php';
require 'config/config.php';
$db = new Database();
$con = $db->conectar();

$sql = $con-> prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

// DESCRIPCION --------------------------------------------------------

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == '') {
    echo 'Error al procesar tu petición';
    exit;
  } else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
  
    if($token == $token_tmp) {
  
     $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
     $sql->execute([$id]);
     if($sql->fetchColumn() > 0) {
        $sql = $con->prepare("SELECT nombre, descripcion, precio FROM productos WHERE id=? AND activo=1 LIMIT 1");
        $sql->execute([$id]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $precio = $row['precio'];
        $dir_images = 'img/menu/' . $id . '/';

        $rutaImg = $dir_images . 'principal.png'; 

        if(!file_exists($rutaImg)) {
            $rutaImg = 'img/menu/no-photo/principal.png';
        }

        $imagenes = array();
        $dir = dir($dir_images);

        while(($archivo = $dir->read()) != false) {
            if($archivo != 'principal.png' && (strpos($archivo, 'jpg') || strpos($archivo, 'png'))) {
                $imagenes[] = $dir_images . $archivo;
            }
        }
        $dir->close();
     }
  
    } else {
       echo 'Error al procesar tu petición';
       exit;
    }
  }
  

$sql = $con-> prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>




<!-- <section class="detalles">
    <div class="container">
     <div class="detalles__item">
            <div class="column column--50">
                <div class="img__detalles">
                    <img loading="lazy" src="<?php echo $rutaImg; ?>" alt="">
                </div>
            </div>
            <div class="column column--50">
            <div class="detalles__info">
                    <h1 class="max-titulo"><?php echo $nombre; ?></h1>
                    <h2 class="titulo"><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h2>
                    <p class="texto"><?php echo $descripcion; ?></p>
                    <div class="detalles__button">
                        <a href="index.php">Volver</a>
                    </div>
            </div>
            </div>
     </div>
    </div>
</section> -->