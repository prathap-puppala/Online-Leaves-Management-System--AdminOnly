<?php
session_start();

unset($_SESSION['siteluser']);
session_destroy();
header("location:login.php");
?>
