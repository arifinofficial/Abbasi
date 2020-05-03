<?php
require_once '../../core/init.php';
if (!Session::exists('email')) {
    header('Location: ../index.php');
}

$transaksi = new Transaksi();

$data = $transaksi->deleteById('pembelian', Input::get('id'));
if ($data) {
    header('Location: pos-tabel.php');
} else {
    echo "Error!";
}
