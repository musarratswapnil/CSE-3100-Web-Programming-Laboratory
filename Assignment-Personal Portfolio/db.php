<?php

session_start();
error_reporting(0);
$db = mysqli_connect('localhost:3307', 'root', '', 'portfolio') or die ("database not connected!");
 
?>