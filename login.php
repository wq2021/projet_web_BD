<!DOCTYPE html>
<html lang="fr">
<!-- l'entête -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css"/>
    <title>Page Login</title>
</head>
<body>
    <header>
        <a href="http://www.inalco.fr/" target="_blank">
            <img src="img/logo.png" alt="logo_inalco"/>
        </a>
        <h1>L'Association des Anciens Inalcoliens en Master (AAIM)</h1>
        <h4>Une plate-forme pour les anciens étudiants du master de l'<a href="http://www.inalco.fr/" target="_blank">Inalco</a></h4>
    </header>
    <nav>
        <h3 class="froid">
            <a href="accueil.html">Accueil</a>
            <a href="formation.html">Formations en master</a>
            <!-- <a href="recherche.php">Recherche</a> -->
            <a href="login.php">Login</a>
            <a href="contact.html">Contact</a>
            
        </h3>
    </nav>
    <section>
        <div>
            <h3>
                Connectez-vous !
            </h3>
            <form method="POST" action="login_inter.php"> 
                <label for="id">Identifiant :</label>
                <input type="number" name="id"><br>
                <label for="password">Mot de passe :</label>
                <input type="password" name="password"><br>
                <input value="Connecter" type="submit" id="Send" name="type_operation">
            </form>
        </div>
    </section>
    <footer>
        <hr>
        Copyright : Qi Wang <br>
        Contact: <a href="mailto:wq2021@outlook.com">wq2021@outlook.com</a>
    </footer>
    
</body>
</html>