<?php
require_once '../../core/init.php';
if (!Session::exists('email')) {
    header('Location: ../index.php');
}

$customer = new Customer();

$data = $customer->deleteById('customer', Input::get('id'));
if ($data) {
    header('Location: customer-tabel.php');
} else {
    echo "Error!";
}
