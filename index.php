<?php
include 'classes/Hive.php';

session_start();

if(!isset($_SESSION['hive'])) {

    $hive = new Hive();
    $_SESSION['hive'] = $hive;

}else {

    $hive = $_SESSION['hive'];

}

if($_GET['action'] == 'hit') {

    $hive->hit();

}

if($_GET['action'] == 'reset') {

    $hive = new Hive();
    $_SESSION['hive'] = $hive;  

}

$hive->showStats();
?>
<a href="?action=hit">HIT</a>
<br>
<a href="?action=reset">RESET</a>