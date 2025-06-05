<?php ob_start()?>
<?php 
if (!isset($_SESSION)) {
session_start();
}

$bdd = new PDO('mysql:host=mysql;dbname=academy;charset=utf8','root','root');
?>
