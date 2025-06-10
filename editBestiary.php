<?php include('config/environement.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Aucun monstre sélectionné.');
}

$id = $_GET['id'];

$request = $bdd->prepare('SELECT * FROM bestiary WHERE id = ?');
$request->execute([$id]);
$monster = $request->fetch();

if (!$monster) {
    die('Monstre introuvable.');
}

if (!isset($_SESSION['user']) || $_SESSION['user']['id'] != $monster['author']) {
    die('Accès refusé.');
}

if (!empty($_POST)) {
    $name = htmlspecialchars($_POST['best_name']);
    $desc = htmlspecialchars($_POST['descriptions']);
    $type = htmlspecialchars($_POST['types']);

    $update = $bdd->prepare('UPDATE bestiary SET best_name=?, descriptions=?, types=? WHERE id=?');
    $update->execute([$name, $desc, $type, $id]);
    header('Location: Bestiaire.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une créature</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include('header.php'); ?>
<main>
    <h2>Modifier la créature</h2>
    <form method="post" class="form-editBestiary">
        <div class="form-item-bestEdit">
            <label for="best_name">Nom:</label>
            <input type="text" name="best_name" value="<?= htmlspecialchars($monster['best_name']) ?>" required>
        </div>

        <div class="form-item-bestEdit"></div>
            <label for="descriptions">Descriptions:</label>
            <textarea name="descriptions" required><?= htmlspecialchars($monster['descriptions']) ?></textarea>
        </div>
        <div class="form-item-bestEdit">
            <label for="types">Type</label>
            <input type="text" name="types" value="<?= htmlspecialchars($monster['types']) ?>" required>
        </div>
        <div class="formt-item-bestSubmit">
            <button type="submit">Enregistrer</button>
        </div>
    </form>
</main>
<?php include('footer.php'); ?>
</body>
</html>