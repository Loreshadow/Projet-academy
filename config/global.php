<!-- vardump globals -->
 <?php 
//  debug session 
//  if (!empty($_SESSION)) {
//     var_dump($_SESSION['user']);
// }
 ?>

<!-- mise en place des erreur de connexion ou de droit insuffisant -->
 <?php 
//  protection d'accès au pages sans connexion 
 if (!isset($_SESSION['user'])) {
    die('<h1 class="unconnect">Vous devez vous connecter pour accéder à cette page.</h1>'
        . '<a href="Connection.php" class="unconnect cta--error">Se connecter</a>'
        . '<style> .unconnect { color: white;};</style>');
}
 ?>