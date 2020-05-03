<?php
require_once '../../core/init.php';

$produkClass = new Produk();

$productStock = $produkClass->getProduk('id', Input::get('id'));

echo '<pre>';
// var_dump();
// print_r($productStock['qty']);
echo '</pre>';
// die;

if (isset($_SESSION['cart_admin'][Input::get('id')])) {
    if ($_SESSION['cart_admin'][Input::get('id')] + Input::get('qty') > $productStock['qty']) {
        echo '<script>alert("Tidak bisa order melebihi stok barang!"); window.location.href="pos.php"</script>';
    } else {
        $_SESSION['cart_admin'][Input::get('id')] += Input::get('qty');
        header('Location: pos.php');
    }
} else {
    if (Input::get('qty') > $productStock['qty']) {
        echo '<script>alert("Tidak bisa order melebihi stok barang!"); window.location.href="pos.php"</script>';
    } else {
        $_SESSION['cart_admin'][Input::get('id')] = Input::get('qty');
        header('Location: pos.php');
    }
}
