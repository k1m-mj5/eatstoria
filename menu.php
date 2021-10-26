<?php

include 'class/menu.php';

$rest_id = isset($_GET["id"]) ? $_GET["id"] : NULL;

$menu = new Menu();
echo "<select class='form-select' name='menu'>";
$menu->displayMenuAsOptions($rest_id);
echo "</select>";

?>