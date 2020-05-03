<?php
require_once '../../core/init.php';
if (!Session::exists('email')) {
    header('Location: ../index.php');
}

$datas = $produk->getProduk('id', Input::get('id'));
$foto = $datas['foto'];

if (file_exists("../../produk_image/$foto")) {
    unlink("../../produk_image/$foto");
}

$data = $produk->deleteById('produk', Input::get('id'));
if ($data) {
    header('Location: produk-table.php');
} else {
    echo "Error!";
}
