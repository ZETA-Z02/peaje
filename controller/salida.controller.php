<?php 
session_start();

session_destroy();
echo 'funciona';

header("location: ../index.html"); 
?>
