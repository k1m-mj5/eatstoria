<?php

include '../class/menu.php';

if(isset($_POST["addmenu"])){
    $id = $_POST["rest_id"];
    $menu_title = $_POST["menu"];
    $price = $_POST["price"];
    $description = $_POST["menudescription"];
    // var_dump($_POST);
    // exit;
    $menu = new Menu();
    $menu->Addmenu($id, $menu_title, $price, $description);
}

?>