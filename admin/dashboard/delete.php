<?php
require_once '../../core/init.php';
if (!Session::exists('email')) {
    header('Location: ../index.php');
}

$data = $user->deleteById('users', Input::get('id'));
if ($data) {
    header('Location: admin-table.php');
} else {
    echo "Error!";
}
