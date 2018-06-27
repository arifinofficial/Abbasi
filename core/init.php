<?php

session_start();

spl_autoload_register(function ($class) {
    require_once '../class/' . $class . '.php';
});

$user = new User();
