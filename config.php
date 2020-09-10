<?php

/*Racine du site*/
define("ROOT", (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/vtc');

/*Mon URL avec son action*/
define("URL", explode("/", filter_var($_GET['action'], FILTER_SANITIZE_URL)));
