<?php

require_once('vendor/autoload.php');

session_start();

if(!isset($_SESSION['pname'])){
    $_SESSION['pname'] = "Unknown";
}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['pname'])){
    $_SESSION['pname'] = $_POST['pname'];
}

if(!isset($_SESSION['hive'])) {

    $hive = new Hive();
    $_SESSION['hive'] = $hive;


}else {

    $hive = $_SESSION['hive'];

}

if(isset($_GET['action'])){
    if($_GET['action'] == 'hit') {
        $hive->hit();
    }
}

if(isset($_GET['action'])){
    if($_GET['action'] == 'reset') {

        $hive = new Hive();
        $_SESSION['hive'] = $hive; 
    
    }
}




$hive->showStats();

?>
<br>
<a href="?action=hit">HIT</a>
<br>
<a href="?action=reset" <?php $_SESSION['pname']?> >RESET</a>
<br><br>
<form method = "POST">
<label for="pname">Set player name: </label>
<input type="text" name = "pname">
<input type="submit" value = "Set">
</form>
<br>

<p>Player name: <?php echo $_SESSION['pname'];