<?php include('config/environement.php') ?>

<?php 
$requestSelect = $bdd->prepare('SELECT id, best_name,descriptions,author,types,img 
                                       FROM bestiary');
$requestSelect->execute();
$data = $requestSelect->fetchAll();
$requestUser = $bdd->prepare('SELECT id,username 
                                      FROM user');
$requestUser->execute();
$userData = $requestUser->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestiaire</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   <?php include('header.php') ?>
   <main>
    <section id="bestiaire">
        <div class="bestiaire-container">
            <div>
                <ul class="bestiaire-heading">
                    <li><a href="Bestiaire.php" class="type-items">Tous</a></li>
                    <li><a href="Bestiaire.php?type=aquatique" class="type-items">Aquatique</a></li>
                    <li><a href="Bestiaire.php?type=demoniaque" class="type-items">Démoniaque</a></li>
                    <li><a href="Bestiaire.php?type=mort-vivant" class="type-items">Mort vivant</a></li>
                    <li><a href="Bestiaire.php?type=mi-bete" class="type-items">Mi-bête</a></li>
                    <li><a href="newBestiary.php" class="type-items">Ajouter une créature</a></li>
                </ul>
            </div>
            <div class="bestiaire-container-content">
                <?php
                $filteredData = $data;
                if (isset($_GET['type']) && !empty($_GET['type'])) {
                    $type = htmlspecialchars($_GET['type']);
                    $filteredData = [];
                    foreach ($data as $item) {
                        if ($item['types'] === $type) {
                            $filteredData[] = $item;
                        }
                    }
                }
                if (empty($filteredData)) {
                    echo "<p>Aucun résultat trouvé.</p>";
                } else {
                    foreach ($filteredData as $row) { ?>
                        <div class='bestiaire-content'>
                            <div class="best-img-container">
                                <img src="assets/img/<?= $row['img']?>" alt="">
                            </div>
                            <h3><?= $row['best_name'] ?> </h3>
                            <p><?= $row['descriptions'] ?></p>
                            <p><strong>Auteur:</strong> <?php 
                                $auteur = 'Auteur inconnu';
                                if (isset($userData)){ 
                                    foreach ($userData as $user) {
                                        if ($user['id'] == $row['author']) {
                                            $auteur = $user['username'];
                                            break;
                                        }
                                    }
                                }
                                echo $auteur;
                            ?> </p>
                            <p><strong>Type:</strong> <?= $row['types'] ?></p>
                            <?php
                            // Affiche les boutons si l'utilisateur connecté est l'auteur
                            if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $row['author']) { ?>
                                <div class="bestiaire-actions">
                                    <a href="editBestiary.php?id=<?= $row['id'] ?>" class="btn btn-edit">Modifier</a>
                                    <a href="deleteBestiary.php?id=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Supprimer ce monstre ?');">Supprimer</a>
                                </div>
                            <?php } ?>
                        </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </section>
   </main>
    <?php include('footer.php') ?>
</body>
</html>