<?php

session_start();

if(isset($_SESSION["idpetugas"])) {

$_SESSION = array();

session_destroy();
}
header("Location: http://localhost/app_perpus/login/index.php");
?>