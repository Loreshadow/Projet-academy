<?php include('config/environement.php') ?>
<?php include('config/global.php')?>
<?php 

$connectUser = $_SESSION['user'];
$_SESSION['user'] = [
    'id' => $connectUser['id'],
    'nom' => $connectUser['nom'],
    'prenom' => $connectUser['prenom'],
    'role_id' => $connectUser['role_id']
];

if (!isset($_SESSION['user'])) {
    die('<h1 class="unconnect">Vous devez vous connecter pour accéder à cette page.</h1>'
        . '<a href="Connection.php" class="unconnect cta--error">Se connecter</a>'
        . '<style> .unconnect { color: white;};</style>');
}
?>
<?php 
?>
<link rel="stylesheet" href="assets/css/style.css">
<header class="header-layout">
    <div class="header-container">
        <div class="header-logo-container">
            <img src="assets/img/academy-logo.png" alt="">
        </div>
        <div class="header">
            <h1>L'Académie "À Peu Près".</h1>
            <p>Bienvenue, <?php echo $connectUser['nom'] ?> !</p>
        </div>
            <nav>
                <ul class="navbar">
                    <li class="menu-item-cont"><a href="index.php" class="menu-item">Accueil</a></li>
                    <li class="menu-item-cont"><a href="Bestiaire.php" class="menu-item">Bestiaire</a></li>
                    <li class="menu-item-cont"><a href="codex.php" class="menu-item">Codex</a></li>
                    <li class="menu-item-cont"><a href="Disconect.php" class="menu-item">Se déconnecter</a></li>
                </ul>
            </nav>
        </div>
</header>
