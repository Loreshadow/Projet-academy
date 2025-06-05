<?php include('config/environement.php') ?>
<?php 
if (!empty($_POST['name']) && !empty($_POST['password'])) {
    $usernom = htmlspecialchars($_POST['name']);
    $userpassword = htmlspecialchars($_POST['password']);

    $request = $bdd->prepare('SELECT * 
                              FROM user 
                              WHERE username = ?');
    $request->execute([$usernom]);

    $user = $request->fetch();

    if  ($user && password_verify($userpassword, $user['wordpass'])) {
        echo 'Connexion effectuée';
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nom' => $user['username'],
            'prenom' => $user['firstname']
        ];
        header('Location:index.php');
        exit();
    } else {
        echo 'Erreur lors de la connexion : utilisateur ou mot de passe incorrect';
    }
} else {
    echo 'Erreur lors de l\'initialisation : veuillez remplir tous les champs';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="inscription-head">
        <div class="heading-container">
            <div class="heading-logo-container">
                <img src="assets/img/academy-logo.png" alt="">
            </div>
            <div class="heading">
                <h2>Bienvenue Sur L'Académie de Magie</h2>
                <h1>"À Peu Près"</h1>
                <h2>l’excellence approximative.</h2>
            </div>
            <div class="connection-container">
                <a href="Inscription.php">S'inscrire</a>
            </div>
        </div>
    </header>
    <main>
        <section id="#form">
            <div class="form-container">
                <h2>Connectez vous</h2>
                <form action="Connection.php" class="inscription" method="post">
                    <div class="form-item">
                        <label for="name">Votre nom:</label>
                        <input type="text" name="name" placeholder="entrez votre nom ici">
                    </div>

                    <div class="form-item">
                        <label for="password">Votre mot de passe:</label>
                        <input type="password" name="password" placeholder="entrez votre prénom ici">
                    </div>
                    <div class="form-submit">
                        <button class="submit--primary">Se Connecter</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>