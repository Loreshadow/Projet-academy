<?php include('config/environement.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Académie</title>
   <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
   <?php include('header.php') ?>
   <main>
      <section id="bestiary">
         <div class="bestiary-container">
            <div class="bestiary-heading">
               <h2>Consulter le bestiaire</h2>
            </div>
            <div class="bestiary-content">
               <p>Le bestiaire est un recueil de créatures magiques et fantastiques que vous pouvez rencontrer dans l'univers de l'Académie. Chaque créature possède des caractéristiques uniques, des pouvoirs et des faiblesses. Explorez les différentes catégories pour en apprendre davantage sur ces êtres fascinants.</p>
            </div>
            <div class="homepage-img">
               <div class="img-container-homepage">
                  <img src="assets/img/fantome.jpg" alt="">
               </div>
               <div class="img-container-homepage">
                  <img src="assets/img/succube.jpg" alt="">
               </div>
               <div class="img-container-homepage">
                  <img src="assets/img/harpie.jpg" alt="">
               </div>
            </div>
            <a href="Bestiaire.php">Consulter le Bestiaire</a>
         </div>
      </section>

      <!-- section codex -->
       <section id="codex-homepage">
         <div class="codex-homepage-container">
            <div class="codex-homepage-heading">
               <h2>Consulter le Codex</h2>
            </div>
            <div class="codex-homepage-content">
               <p>Le Codex est une collection de sorts et d'incantations que les étudiants de l'Académie peuvent apprendre et maîtriser. Chaque sort est classé par élément et peut être utilisé pour diverses applications magiques. Explorez les différents types de sorts pour enrichir vos connaissances en magie.</p>
            </div>
            <div class="homepage-img-codex">
               <div class="img-codex-homepage">
                  <img src="assets\img\bouclier_de_feu.webp" alt="">
               </div>
               <div class="img-codex-homepage">
                  <img src="assets\img\Elementaire de lumière.webp" alt="">
               </div>
               <div class="img-codex-homepage">
                  <img src="assets\img\Eclair.webp" alt="">
               </div>
            </div>
            <a href="Codex.php">Consulter le Codex</a>
         </div>
      </section>
   </main>
   <?php include('footer.php') ?>
</body>
</html>