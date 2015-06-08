<?php
if (isset($_FILES['prog_img'])) {
    $archivo = $_FILES['prog_img'];
    $nombre = "{$archivo['name']}";
    if (move_uploaded_file($archivo['tmp_name'], "../../img/prog-img/".$nombre)) {
        echo 1;
    } else {
        echo 0;
    }
}
if (isset($_FILES['cond_img'])) {
    $archivo = $_FILES['cond_img'];
    $nombre = "{$archivo['name']}";
    if (move_uploaded_file($archivo['tmp_name'], "../../img/prog-img/".$nombre)) {
        echo 1;
    } else {
        echo 0;
    }
}
?>
