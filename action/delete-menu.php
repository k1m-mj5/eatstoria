<?php

include '../class/menu.php';

$menu_id = $_GET['menu_id'];
$rest_id = $_GET['rest_id'];

$menu = new Menu();

$menu->delete_menu($menu_id,$rest_id);


?>