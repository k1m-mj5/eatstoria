<?php

include '../class/order.php';

if(isset($_POST["order"])){
    $account_id = $_SESSION["account_id"];
    $rest_id = $_POST["rest_id"];
    $menu_id = $_POST["menu"];
    $quantity = $_POST["quantity"];
    $way = $_POST["way"];
    $contact_num = $_POST["contact"];
    $order_date = $_POST["date"];
    $order_time = $_POST["time"];
    $message = $_POST["message"];
    // var_dump($_POST);
    // exit;
    $order = new Order();
    $order -> addOrder($rest_id, $menu_id, $quantity, $way, $contact_num, $order_date, $order_time, $account_id, $message);
}

?>