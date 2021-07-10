<!-- Insérer le format du HTML -->
<?php
    echo
    "
    <html lang=\"fr\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"stylesheet\" href=\"css/main.css\"/>
        <title>Page Principale</title>
    </head>
    <body>
    ";
?>

<?php
    // établir la connexion à la BD avec affichage des résultats en UTF-8 
    $serveur = "localhost";
    $bd = "login";
    $login = "root";
    $mdp = "root";
    try {
        $sql = new PDO('mysql:host='.$serveur.';dbname='.$bd, $login, $mdp,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) ;
    }
    catch(PDOException $e) {
         echo "Erreur de connexion à la base de données " . $e->getMessage() ;
         die();
    }
    // récupérer le type d'opération en utilisant la méthode POST
    $operation = $_POST['type_operation'];
    if ($operation == 'Connecter'){
        $id = $_POST['id'];
        $mdp = $_POST['password'];
        // gérer les cas où les utilisateurs ne remplissent pas tous les champs
        if (empty($id) && empty($mdp)){
            echo "<h3> Veuillez remplir l'identifiant et le mot de passe, s'il vous plaît. </h3>";
        }
        elseif (empty($id)){
            echo "<h3> Veuillez remplir l'identifiant, s'il vous plaît. </h3>";
        }
        elseif (empty($mdp)){
            echo "<h3> Veuillez remplir le mot de passe, s'il vous plaît. </h3>";
        }

        // envoyer la requête et vérifier l'id et le password donné correspondent à une info dans la table Gestion_users
        else{
            $requete = $sql -> prepare("SELECT password FROM Gestion_users WHERE id=:iden");
            $requete->bindParam(':iden',$id);
            $resultat = $requete->execute();
            while($ligne = $requete -> fetch (PDO::FETCH_OBJ)){
                $mdp_retourne = $ligne->password;
            }
            // authentification réussie, diriger vers la page de recherche
            if ($mdp_retourne === $mdp){
                header('location:recherche.php');
            }
            // authentification échouée, proposer de réessayer
            else{
                echo "<h3> Votre identifiant ou mot de passe n'est pas correct. Veuillez réessayer. </h3>";
                echo "<h4><a href=\"login.php\"> Retourner à la page précédente </a></h4>";
            }

        }
    }
    
?>