<?php include('config/environement.php') ?>

<?php 
$requestSelect = $bdd->prepare('SELECT best_name,descriptions,author,types FROM bestiary');
$requestSelect->execute();
$data = $requestSelect->fetchAll();
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
                    <li><a href="" class="type-items">Ajouter une créature</a></li>
                </ul>
            </div>
            <div class="bestiaire-content">
                <?php
                $filteredData = $data;
                if (isset($_GET['type']) && !empty($_GET['type'])) {
                    $type = htmlspecialchars($_GET['type']);
                    $filteredData = array_filter($data, function($item) use ($type) {
                        return $item['types'] === $type;
                    });
}
                if (empty($filteredData)) {
                    echo "<p>Aucun résultat trouvé.</p>";
                } else {
                    foreach ($filteredData as $row) {?>
                <div class='bestiaire-content'>
                    <h3><?= $row['best_name']?> </h3>
                    <p><?= $row['descriptions'] ?></p>
                    <p><strong>Auteur:</strong><?= $row['author'] ?> </p>
                    <p><strong>Type:</strong><?= $row['types'] ?></p>
                </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </section>
   </main>
</body>
</html>