<?php include('config/environement.php') ?>
<?php 
if (!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['wordpass']) && !empty($_POST['email']) && !empty($_POST['spell'])) {
    $nom = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['firstname']);
    $password = htmlspecialchars($_POST['wordpass']);
    $cryptedPassword = password_hash($password,PASSWORD_ARGON2I);
    $spell = htmlspecialchars($_POST['spell']);
    $email = htmlspecialchars($_POST['email']);

    $requestCreate = $bdd->prepare('INSERT INTO user(username,firstname,email,wordpass,spell)
                                                VALUES(?,?,?,?,?)');
    $dataCreate = $requestCreate->execute(array($nom,$prenom,$email,$cryptedPassword,$spell));

    echo $nom .' '.$prenom.' '.$password.'   '.$cryptedPassword;
    header('location:connexion.php');
}
var_dump($_SESSION['user'])
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
                <a href="Connection.php">Se Connecter</a>
            </div>
        </div>
    </header>
    <main>
        <section id="#form">
            <div class="form-container">
                <h2>Inscrivez vous !</h2>
                <form action="Inscription.php" class="inscription" method="post">
                    <div class="form-item">
                        <label for="name">Votre nom:</label>
                        <input type="text" name="name" placeholder="entrez votre nom ici" required>
                    </div>

                    <div class="form-item">
                        <label for="firstname">Votre prénom:</label>
                        <input type="text" name="firstname" placeholder="entrez votre prénom ici" required>
                    </div>

                    <div class="form-item">
                        <label for="email">Votre email:</label>
                        <input type="email" name="email" placeholder="entrez votre email ici" required>
                    </div>

                    <div class="form-item">
                        <label for="wordpass">Votre mot de passe:</label>
                        <input type="mot de passe" name="wordpass" placeholder="entrez votre prénom ici" required>
                    </div>

                    <div class="form-item">
                        <label for="spell">Votre spécialisations:</label>
                        <select name="spell" id="spell" required>
                            <option value="light">Lumière</option>
                            <option value="water">Eau</option>
                            <option value="air">Air</option>
                            <option value="fire">Feu</option>
                        </select>
                        
                    </div>
                    <div class="form-submit">
                        <button class="submit--primary">S'inscrire</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>