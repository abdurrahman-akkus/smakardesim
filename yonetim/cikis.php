<?php 
session_start();
$_SESSION ["girisKontrol"] = 0;
unset($_SESSION["username"]);
header("Location: index.php?info=sessiondestroyed");

session_destroy();


?>