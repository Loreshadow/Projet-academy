<?php include('config/environement.php') ?>
<?php 
if (isset($_SESSION['user'])) {
    echo 'Vous êtes déjà connecté';
    session_unset();
    header('Location:Connection.php');
}
?>

