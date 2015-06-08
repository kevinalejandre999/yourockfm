<?php
if (isset($_POST['prog_img'])) {
    $archivo = $_POST['prog_img'];
    if (file_exists("../../img/prog-img/$archivo")) {
        unlink("../../img/prog-img/$archivo");
        echo 1;
    } else {
        echo 0;
    }
}
if (isset($_POST['cond_img'])) {
    $archivo = $_POST['cond_img'];
    if (file_exists("../../img/prog-img/$archivo")) {
        unlink("../../img/prog-img/$archivo");
        echo 1;
    } else {
        echo 0;
    }
}
?>
