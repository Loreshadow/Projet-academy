<?php include('config/environement.php') ?>
<?php 
if (isset($_SESSION['user'])) {
    $author_id = ($_SESSION['user']['id']);
    if (!empty($_POST['spell_name']) && !empty($_POST['elements'])) {
        $spell_name = htmlspecialchars($_POST['spell_name']);
        $element = htmlspecialchars($_POST['elements']);

        $requestCreate = $bdd->prepare('INSERT INTO spell (spell_name,element,author_id)
                                                VALUES (?,?,?)');
        $dataCreate = $requestCreate->execute(array($spell_name,$element,$author_id));

        echo '<p>Sort ajouté avec succès</p>';
        // header('Location:codex.php');
    }
} elseif (!isset($_SESSION['user'])) {
    die('<h1 class="unconnect">Vous devez vous connecter pour accéder à cette page.</h1>'
        . '<a href="Connection.php" class="unconnect cta--error">Se connecter</a>'
        . '<style> .unconnect { color: white;};</style>');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('header.php') ?>
    <div class="form-container-codex">
        <form action="newCodex.php" method="post" class="form-codex">
            <div class="form-item-codex">
                <input type="text" name="spell_name" placeholder="entrez le nom du sort" class="input-codex">
            </div>

            <div class="form-item-codex">
                <label for="elements">Type de sort:</label>
                <select name="elements" id="elements" required>
                    <option value="light">Lumière</option>
                    <option value="eau">Eau</option>
                    <option value="air">Air</option>
                    <option value="feu">Feu</option>
                </select>
            </div>

            <div class="form-submit-codex">
                <button type="submit" class="submit--best">Ajouter</button> 
            </div>
        </form>
    </div>
</body>
</html>