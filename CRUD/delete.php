<?php
include("connect.php");
$id = $_GET['id'];
$conn->query("DELETE FROM `clientes` WHERE `clientes`.`id` = $id;");
header("location: clientes.php");