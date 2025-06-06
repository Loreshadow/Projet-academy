<?php include('config/environement.php') ?>

<?php 
    $requestSelect = $bdd->prepare('SELECT spell_name,element,author_id 
                                           FROM spell');
    $requestSelect->execute();
    $data = $requestSelect->fetchAll();
    $requestUser = $bdd->prepare('SELECT id,username 
                                         FROM user');
    $requestUser->execute();
    $userData = $requestUser->fetchAll();
    var_dump($userData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codex</title>
</head>
<body>
    <?php include('header.php');?>
    <div class="codex-container">
        <div>

            <ul class="codex-heading">
                <li><a href="codex.php" class="type-items">Tous</a></li>
                <li><a href="codex.php?spell=light" class="type-items">Lumière</a></li>
                <li><a href="codex.php?spell=eau" class="type-items">Eau</a></li>
                <li><a href="codex.php?spell=air" class="type-items">Air</a></li>
                <li><a href="codex.php?spell=feu" class="type-items">Feu</a></li>
                <li><a href="newCodex.php" class="type-items">Ajouter un sort</a></li>
            </ul>
        </div>
        <div class="bestiaire-container-content">
        <?php
            $filteredData = $data;
            if (isset($_GET['spell']) && !empty($_GET['spell'])) {
                $spell = $_GET['spell'];
                $filteredData = array_filter($data, function($item) use ($spell) {
                return $item['element'] === $spell;
                });
            }
            if (empty($filteredData)) {
                echo "<p>Aucun résultat trouvé.</p>";
            } else {
                foreach ($filteredData as $row) {?>
        <div class='bestiaire-content'>
            <h3><?= $row['spell_name']?> </h3>
            <p><?= $row['element'] ?></p>
            <p><strong>Auteur:</strong> <?php 
            if (isset($userData)){ 
                foreach ($userData as $user) {
                    if ($user['id'] == $row['author_id']) {
                        echo $user['username'];
                    }
                }
            } else {
                echo 'Auteur inconnu';
            }
            ?> </p>
        </div>
        <?php
            }
        } ?>
    </div>
</body>
</html>