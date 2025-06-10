<?php include('config/environement.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Aucun monstre sélectionné.');
}

$id = intval($_GET['id']);

$request = $bdd->prepare('SELECT author FROM bestiary WHERE id = ?');
$request->execute([$id]);
$monster = $request->fetch();

if (!$monster) {
    die('Monstre introuvable.');
}

if (!isset($_SESSION['user']) || $_SESSION['user']['id'] != $monster['author']) {
    die('Accès refusé.');
}

$delete = $bdd->prepare('DELETE FROM bestiary WHERE id = ?');
$delete->execute([$id]);

header('Location: Bestiaire.php');
exit;