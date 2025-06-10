<?php
include('environement.php');

// Vérifier si utilisateur connecté
if (!isset($_SESSION['user']['id'])) {
    die('connectez vous !');
}

// Récupérer l'id du film
$filmId = $_GET['id'] ?? null;
if (!$filmId) {
    die('film non présent');
}

// Récupérer la fiche film et vérifier que l'utilisateur est bien le créateur
$request = $bdd->prepare('SELECT * FROM fiche_film WHERE id = ?');
$request->execute([$filmId]);
$film = $request->fetch();

if (!$film) {
    die('pas de film');
}

if ($film['user_id'] != $_SESSION['user']['id']) {
    die('non autorisé a modifier ce film');
}

// Si formulaire envoyé, traiter la modification
if (!empty($_POST['title']) && !empty($_POST['real']) && !empty($_POST['type']) && !empty($_POST['duration']) && !empty(['synop'])) {
    $titre = htmlspecialchars($_POST['title']);
    $real = htmlspecialchars($_POST['real']);
    $genre = htmlspecialchars($_POST['type']);
    $duree = htmlspecialchars($_POST['duration']);
    $synopsis = htmlspecialchars($_POST['synop']);

    if ($titre && $real && $genre && $duree && $synopsis) {
        $update = $bdd->prepare('UPDATE fiche_film SET titre = ?, realisateur = ?, genre = ?, duree = ?, synopsis = ? WHERE id = ?');
        $update->execute([$titre, $real, $genre, $duree, $synopsis, $filmId]);

        header('Location: fiche-film.php?film=' . $filmId);
        exit;
    } else {
        $error = "Tous les champs doivent être remplis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Modifier Film</title>
</head>
<body>
    <h1>Modifier la fiche du film</h1>
    <?php if (!empty($error)) echo '<p style="color:red;">'.$error.'</p>'; ?>
    <form method="post">
        <label>Titre : <input type="text" name="title" value="<?php echo $film['titre']; ?>" /></label><br />
        <label>Réalisateur : <input type="text" name="real" value="<?php echo $film['realisateur']; ?>" /></label><br />
        <label>Genre : <input type="text" name="type" value="<?php echo $film['genre']; ?>" /></label><br />
        <label>Durée : <input type="number" name="duration" value="<?php echo $film['duree']; ?>" /></label><br />
        <label>Synopsis :<br />
            <textarea name="synop" rows="5" cols="40"><?php echo $film['synopsis']; ?></textarea>
        </label><br />
        <button type="submit">Modifier</button>
    </form>
    <p><a href="fiche-film.php?film=<?php echo $filmId; ?>">Retour à la fiche</a></p>
</body>
</html>