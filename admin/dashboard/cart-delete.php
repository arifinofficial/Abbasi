<?php
require_once '../../core/init.php';
$idCart = Input::get('id');
unset($_SESSION["cart_admin"]["$idCart"]);
header('Location: pos.php');
