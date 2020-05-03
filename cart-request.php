<?php 
require_once 'core/init.php';

$id_produk = Input::get('id');

if (isset($_SESSION['cart'][Input::get('id')])) {
    $_SESSION['cart'][Input::get('id')] += 1;
} else {
    $_SESSION['cart'][Input::get('id')] = 1;
}

header('Location: product.php');
