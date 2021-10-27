<?php

include '../class/order.php';

$order = new Order();

if(isset($_POST["edit"])){
    $account_id = $_SESSION["account_id"];
    $order_id = $_POST["order_id"];
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

    $order -> EditOrder($order_id, $rest_id, $menu_id, $quantity, $way, $contact_num, $order_date, $order_time, $account_id, $message);
}

?>