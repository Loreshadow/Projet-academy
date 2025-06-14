<?php include('config/environement.php') ?>
<?php 
if (isset($_FILES['fileimg'])) {
    $fullImgName = $_FILES['fileimg']['name'];
    $tmpImgName = $_FILES['fileimg']['tmp_name'];

    $filename = pathinfo($fullImgName)[('filename')];
    $uniqueName = uniqid($filename);
    $fileExt = pathinfo($fullImgName)[('extension')];
    $allowedExt = ['jpg', 'jpeg', 'png'];
    if (in_array($fileExt, $allowedExt)) {
    move_uploaded_file($tmpImgName, 'assets/img/'.$uniqueName . '.' . $fileExt);
    } else {
    echo'<p>Mauvais type d\'extension</p>';
    }
}
?>
<?php 
if (isset($_SESSION['user'])) {
    $user_id = ($_SESSION['user']['id']);
    if (!empty($_POST['best_name']) && !empty($_POST['descriptions']) && !empty($_POST['types']) && !empty($_FILES['fileimg'])) {
        $best_name = htmlspecialchars($_POST['best_name']);
        $descriptions = htmlspecialchars($_POST['descriptions']);
        $types = htmlspecialchars($_POST['types']);
        $fileimg = $uniqueName . '.' . $fileExt;

        $requestCreate = $bdd->prepare('INSERT INTO bestiary (best_name,descriptions,author,types,img)
                                                VALUES (?,?,?,?,?)');
        $dataCreate = $requestCreate->execute(array($best_name,$descriptions,$user_id,$types,$fileimg));

        echo '<p>Créature ajouté avec succès</p>';
        // header('Location:Bestiaire.php');
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
    <div class="form-container-bestiary">
        <form action="newBestiary.php" method="post" class="form-bestiary" enctype="multipart/form-data">
            <div class="form-item-best">
                <input type="text" name="best_name" placeholder="entrez le nom de la créature" class="input-best">
            </div>

            <div class="form-item-best">
                <input type="text" name="descriptions" placeholder="une description" class="input-best">
            </div>

            <div class="form-item-best">
                <label for="types">Votre spécialisations:</label>
                <select name="types" id="types" required>
                    <option value="aquatique">Aquatique</option>
                    <option value="demoniaque">Démoniaque</option>
                    <option value="mort-vivant">Mort vivant</option>
                    <option value="mi-bete">Mi-bête</option>
                </select>
            </div>

            <div class="form-item-best">
                <label for="fileimg">Ajouter une image:</label>
                <input type="file" name="fileimg">
            </div>

            <div class="form-submit-best">
                <button type="submit" class="submit--best">Ajouter</button> 
            </div>
        </form>
    </div>
    <?php include('footer.php') ?>
</body>
</html>