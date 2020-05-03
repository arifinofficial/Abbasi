<?php
require_once '../../core/init.php';
if (!Session::exists('email')) {
    header('Location: ../index.php');
}

$belanja = new Belanja();

$data = $belanja->deleteById('belanja', Input::get('id'));
if ($data) {
    header('Location: pembelian-tabel.php');
} else {
    echo "Error!";
}
