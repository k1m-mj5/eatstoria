<?php

include '../class/menu.php';

$menu = new Menu();

if(isset($_POST["editmenu"])){
    $rest_id = $_POST["rest_id"];
    $id = $_POST["menu_id"];
    $menu_title = $_POST["editmenutitle"];
    $price = $_POST["editprice"];
    $description = $_POST["editdescription"];
    
    $menu -> editMenu($id, $menu_title, $price, $description,$rest_id);
}

?>