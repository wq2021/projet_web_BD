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
    $bd = "projet_final";
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

    // récupérer le type d'opération en utilisant la méthode GET
    // 5 opérations seront expliotées : Envoyer, Visualiser, Ajouter, Modifier et Supprimer
    // on effectue les clauses/requêtes sql différentes selon les opérations 
    $operation = $_GET['type_operation'];

    // si le type d'opération est 'Envoyer', on effectue une recherche des données.
    if ($operation == 'Envoyer'){
        // dans le moteur de recherche, on propose 4 paramètres : formation, secteur, annee et continent
        // les deux premiers ont été choisis par défaut (la première option dans le menu déroulant)
        // donc ils ont toujours de la valeur pour qu'on puisse les récupérer
        // mais les deux derniers sont vides par défaut, donc il faut considérer les cas où l'utilisateur
        // ne donne pas de valeur pour ces deux derniers paramètres

        $formation = $_GET['formation'];
        $secteur = $_GET['secteur'];

        // si les deux paramètres sont vides : on ne les met pas dans la requête sql
        if (empty($_GET['annee'] && empty($_GET['local']))){
            // fonction prepare(): définition de la requête
            $requete = $sql -> prepare("SELECT * FROM Info_Ville, Info_Etudiants, Info_Entreprises WHERE Info_Etudiants.entreprise = Info_Entreprises.nom_entreprise AND Info_Etudiants.ville_actuelle = Info_Ville.ville AND Info_Entreprises.secteur = :secteur_search AND Info_Etudiants.formation = :formation_search ORDER BY Info_Etudiants.numero_inscription" );
            // fonction bindParam(): définition et protection des paramètres
            $requete->bindParam(':secteur_search',$secteur);
            $requete->bindParam(':formation_search',$formation);
        }

        // si le paramètre 'annee' est vide: on ne le met pas dans la requête sql
        elseif (empty($_GET['annee'])){
            $local = $_GET['local'];
            $requete = $sql -> prepare("SELECT * FROM Info_Ville, Info_Etudiants, Info_Entreprises WHERE Info_Etudiants.entreprise = Info_Entreprises.nom_entreprise AND Info_Etudiants.ville_actuelle = Info_Ville.ville AND Info_Ville.continent = :continent_search AND Info_Entreprises.secteur = :secteur_search AND Info_Etudiants.formation = :formation_search ORDER BY Info_Etudiants.numero_inscription" );
            $requete->bindParam(':secteur_search',$secteur);
            $requete->bindParam(':formation_search',$formation);
            $requete->bindParam(':continent_search',$local);
        }

        // si le paramètre 'local' est vide: on ne le met pas dans la requête sql
        elseif (empty($_GET['local'])){
            $annee = $_GET['annee'];
            $requete = $sql -> prepare("SELECT * FROM Info_Ville, Info_Etudiants, Info_Entreprises WHERE Info_Etudiants.entreprise = Info_Entreprises.nom_entreprise AND Info_Etudiants.ville_actuelle = Info_Ville.ville AND Info_Entreprises.secteur = :secteur_search AND Info_Etudiants.formation = :formation_search AND Info_Etudiants.annee_obtention = :annee_search ORDER BY Info_Etudiants.numero_inscription" );
            $requete->bindParam(':secteur_search',$secteur);
            $requete->bindParam(':formation_search',$formation);
            $requete->bindParam(':annee_search',$annee);
        }

        // si tous les paramètres sont fournis : on propose une requête sql avec tous les params
        else{
            $annee = $_GET['annee'];
            $local = $_GET['local'];
            $requete = $sql -> prepare("SELECT * FROM Info_Ville, Info_Etudiants, Info_Entreprises WHERE Info_Etudiants.entreprise = Info_Entreprises.nom_entreprise AND Info_Etudiants.ville_actuelle = Info_Ville.ville AND Info_Ville.continent = :continent_search AND Info_Entreprises.secteur = :secteur_search AND Info_Etudiants.formation = :formation_search AND Info_Etudiants.annee_obtention = :annee_search ORDER BY Info_Etudiants.numero_inscription" );
            $requete->bindParam(':secteur_search',$secteur);
            $requete->bindParam(':formation_search',$formation);
            $requete->bindParam(':annee_search',$annee);
            $requete->bindParam(':continent_search',$local);
        }

        // execute(): exécuter la requête
        $resultat = $requete->execute();
        // rowCount(): récupérer le nombre de résultats
        $nb_resultats = $requete->rowCount();

        // avec le résultat obtenu, on discute les cas en fonction du nombre de résultats
        // si le nombre de résultat égale à 0 : on n'a pas trouvé de résultat
        // si le nombre de résultat n'est pas de 0 : on a trouvé le résultat -> on affiche le résultat
        if ($nb_resultats == 0){
            echo "<h3>Aucun résultat a été trouvé.</h3>";
            echo "<h4><a href=\"recherche.php\">Retourner à la recherche</a></h4>";
        }
        else{
            echo "<h3>Résultats : </h3>";
            echo "<h4><a href=\"recherche.php\">Retourner à la recherche</a></h4>";
            echo "<table>";
            echo "<table border=\"1\">
                    <thead>
                        <th>Numéro d'inscription</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Formation</th>
                        <th>Année d'obtention</th>
                        <th>Entreprise</th>
                        <th>Secteur</th>
                        <th>Ville Actuelle</th>
                        <th>Pays</th>
                        <th>Continent</th>
                    </thead>";
            while($ligne = $requete -> fetch (PDO::FETCH_OBJ)){
                echo
                "
                <tr>
                <td>{$ligne->numero_inscription}</td>
                <td>{$ligne->prenom}</td>
                <td>{$ligne->nom}</td>
                <td>{$ligne->formation}</td>
                <td>{$ligne->annee_obtention}</td>
                <td>{$ligne->entreprise}</td>
                <td>{$ligne->secteur}</td>
                <td>{$ligne->ville_actuelle}</td>
                <td>{$ligne->pays}</td>
                <td>{$ligne->continent}</td>
                </tr>
                ";
            }
            echo "</table>";
        }
        echo "</body></html>";
    }

    // si le type d'opération est 'Visualiser', on affiche toutes les données de la BD 
    if ($operation == 'Visualiser'){
        $requete = $sql -> prepare("SELECT * FROM Info_Ville, Info_Etudiants, Info_Entreprises WHERE Info_Etudiants.entreprise = Info_Entreprises.nom_entreprise AND Info_Etudiants.ville_actuelle = Info_Ville.ville ORDER BY Info_Etudiants.numero_inscription ;" );
        $resultat = $requete->execute();
        echo "<h4><a href=\"recherche.php\">Retourner à la recherche</a></h4>";
        echo "<table>";
        echo "<table border=\"1\">
                <thead>
                    <th>Numéro d'inscription</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Formation</th>
                    <th>Année d'obtention</th>
                    <th>Entreprise</th>
                    <th>Secteur</th>
                    <th>Ville Actuelle</th>
                    <th>Pays</th>
                    <th>Continent</th>
                </thead>";

        while($ligne = $requete -> fetch (PDO::FETCH_OBJ)){
            echo
            "
            <tr>
            <td>{$ligne->numero_inscription}</td>
            <td>{$ligne->prenom}</td>
            <td>{$ligne->nom}</td>
            <td>{$ligne->formation}</td>
            <td>{$ligne->annee_obtention}</td>
            <td>{$ligne->entreprise}</td>
            <td>{$ligne->secteur}</td>
            <td>{$ligne->ville_actuelle}</td>
            <td>{$ligne->pays}</td>
            <td>{$ligne->continent}</td>
            </tr>
            ";
        }
        echo "</table>";
        echo "</body></html>";
    }
    // si le type d'opération est 'Ajouter' 
    if ($operation == 'Ajouter'){
        $numero1 = $_GET['numero1'];

        // vérifier si le numéro d'inscription est dans la BD
        $requete_verification = $sql->prepare("SELECT * FROM Info_Etudiants WHERE Info_Etudiants.numero_inscription = :numero ");
        $requete_verification->bindParam(':numero',$numero1);
        $requete_verification->execute();
        $nb_resultats = $requete_verification->rowCount();

        // si le nombre de résultat n'égale pas à 0 => on trouve le résultat => le numéro est déjà inscrit
        if ($nb_resultats != 0){
            echo "<h3> Le numéro d'inscription {$numero1} existe déjà, veuillez changer un autre identifiant. </h3> ";
            echo "<h4><a href=\"recherche.php\">Retourner à la page précédente</a></h4>";
        }

        // si le nombre de résultat égale à 0 => on ne trouve pas de résultat => on peut insérer un nouvel adhérent
        else{
            $nom1 = $_GET['nom'];
            $prenom1 = $_GET['prenom'];
            $formation1 = $_GET['formation1'];
            $annee1 = $_GET['annee1'];
            $entreprise1 = $_GET['entreprise'];
            $secteur1 = $_GET['secteur1'];
            $ville1 = $_GET['ville'];
            $pays1 = $_GET['pays'];
            $local1 = $_GET['local1'];

            $requete1 = $sql->prepare("INSERT INTO Info_Etudiants(numero_inscription, prenom, nom, formation, annee_obtention, ville_actuelle, entreprise) VALUES(:num,:prenom, :nom, :formation, :annee_obtention, :ville_actuelle, :entreprise);");
            $requete2 = $sql->prepare("INSERT INTO Info_Entreprises(nom_entreprise, secteur) VALUES(:nom_entreprise,:secteur);");
            $requete3 = $sql->prepare("INSERT INTO Info_Ville(ville, pays, continent) VALUES(:ville,:pays,:continent);");
            $requete1->bindParam(':num', $numero1);
            $requete1->bindParam(':prenom', $prenom1);
            $requete1->bindParam(':nom', $nom1);
            $requete1->bindParam(':formation', $formation1);
            $requete1->bindParam(':annee_obtention', $annee1);
            $requete1->bindParam(':ville_actuelle', $ville1);
            $requete1->bindParam(':entreprise', $entreprise1);
            $requete2->bindParam(':nom_entreprise', $entreprise1);
            $requete2->bindParam(':secteur', $secteur1);
            $requete3->bindParam(':ville', $ville1);
            $requete3->bindParam(':pays', $pays1);
            $requete3->bindParam(':continent', $local1);
            
            $resultat2 = $requete2->execute();
            $resultat3 = $requete3->execute();
            $resultat1 = $requete1->execute();

            // vérifier si on a bien inséré ce nouvel adhérent avec la requête sql
            $requete_check = $sql->prepare("SELECT * FROM Info_Ville, Info_Etudiants, Info_Entreprises WHERE Info_Etudiants.entreprise = Info_Entreprises.nom_entreprise AND Info_Etudiants.ville_actuelle = Info_Ville.ville AND Info_Etudiants.numero_inscription = :neu");
            $requete_check->bindParam(':neu', $numero1);
            $resultat_check = $requete_check->execute();
            $nb_resultats_ajout_check = $requete_check->rowCount();

            // si le nombre de résultat n'égale pas à 0 => on a pu trouver le résultat => on a réussi à ajouter cet adhérent
            if ($nb_resultats_ajout_check != 0){
                echo "<h3>Vous avez réussi à ajouter un nouvel adhérent {$numero1} ! </h3>";
                echo "<h4><a href=\"recherche.php\">Retourner à la page précédente</a></h4>";
                echo "<table>";
                echo "<table border=\"1\">
                        <thead>
                            <th>Numéro d'inscription</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Formation</th>
                            <th>Année d'obtention</th>
                            <th>Entreprise</th>
                            <th>Secteur</th>
                            <th>Ville Actuelle</th>
                            <th>Pays</th>
                            <th>Continent</th>
                        </thead>";

                while($ligne = $requete_check -> fetch (PDO::FETCH_OBJ)){
                echo "<tr>
                        <td>{$ligne->numero_inscription}</td>
                        <td>{$ligne->prenom}</td>
                        <td>{$ligne->nom}</td>
                        <td>{$ligne->formation}</td>
                        <td>{$ligne->annee_obtention}</td>
                        <td>{$ligne->entreprise}</td>
                        <td>{$ligne->secteur}</td>
                        <td>{$ligne->ville_actuelle}</td>
                        <td>{$ligne->pays}</td>
                        <td>{$ligne->continent}</td>
                    </tr>
                    </table>
                    ";
                }
            }
        }
        echo "</body></html>";
    }

    // si le type d'opération est 'Modifier', on modifie les infos d'un adhérent
    if ($operation == 'Modifier'){

        // on vérifie l'existence de l'adhérent avec le numéro d'inscription
        $numero2 = $_GET['numero1'];
        $requete_verification = $sql->prepare("SELECT * FROM Info_Etudiants WHERE Info_Etudiants.numero_inscription = :numero ");
        $requete_verification->bindParam(':numero',$numero2);
        $requete_verification->execute();
        $nb_resultats = $requete_verification->rowCount();

        // le nombre de résultat est de 0 => on ne trouve aucun adhérent correspondant => la modification ne peut pas être effectuée
        if ($nb_resultats == 0){
            echo "<h3> Le numéro d'inscription {$numero2} n'existe pas dans notre réseau, veuillez changer un autre identifiant. </h3> ";
            echo "<h4><a href=\"recherche.php\">Retourner à la page précédente</a></h4>";
        }

        // le nombre de résultat est de 1 => on a trouvé un résultat => cet adhérent est dans le réseau => la modification peut être effectuée
        elseif ($nb_resultats == 1){
            $nom2 = $_GET['nom'];
            $prenom2 = $_GET['prenom'];
            $formation2 = $_GET['formation1'];
            $annee2 = $_GET['annee1'];
            $entreprise2 = $_GET['entreprise'];
            $secteur2 = $_GET['secteur1'];
            $ville2 = $_GET['ville'];
            $pays2 = $_GET['pays'];
            $local2 = $_GET['local1'];

            // On se rend compte que le tableau Étudiants a des clés étrangères en cascade 
            // avec le tableau Ville et Entreprises. Donc si on veut modifier les infos d'un adhérent,
            // il faut s'assurer que la nouvelle valeur de 'nom_entreprise' du tableau Entreprises
            // et la nouvelle valeur de 'ville' du tableau Ville existent dans le tableau Étudiant.
            // sinon il faut d'abord insérer une nouvelle entreprise et une nouvelle ville dans 
            // ces deux tableaux avant de changer les infos dans le tableau Étudiants

            // vérifie la nouvelle entreprise est bien dans le tableau Entreprises
            $requete_verification_entreprise = $sql->prepare("SELECT * FROM Info_Entreprises WHERE nom_entreprise = :entreprise;");
            $requete_verification_entreprise->bindParam(':entreprise',$entreprise2);
            $resultat_verification_entreprise = $requete_verification_entreprise->execute();
            $nb_resultats_entreprises = $requete_verification_entreprise->rowCount();

            // si elle n'existe pas, on l'ajoutera au tableau
            if ($nb_resultats_entreprises == 0){
                $requete_insertion_entreprise = $sql->prepare('INSERT INTO Info_Entreprises(nom_entreprise, secteur) VALUES(:nom_entreprise_insertion,:secteur_insertion);');
                $requete_insertion_entreprise->bindParam(':nom_entreprise_insertion',$entreprise2);
                $requete_insertion_entreprise->bindParam(':secteur_insertion',$secteur2);
                $resultat_insertion_entreprise = $requete_insertion_entreprise->execute();
            }

            // vérifie la nouvelle ville est bien dans le tableau Ville
            $requete_verification_ville = $sql->prepare("SELECT * FROM Info_Ville WHERE ville = :ville;");
            $requete_verification_ville->bindParam(':ville',$ville2);
            $resultat_verification_ville = $requete_verification_ville->execute();
            $nb_resultats_villes = $requete_verification_ville->rowCount();

            // si elle n'existe pas, on l'ajoutera au tableau
            if ($nb_resultats_villes == 0){
                $requete_insertion_ville = $sql->prepare('INSERT INTO Info_Ville(ville, pays, continent) VALUES(:ville,:pays,:continent);'); 
                $requete_insertion_ville->bindParam(':ville',$ville2);
                $requete_insertion_ville->bindParam(':pays',$pays2);
                $requete_insertion_ville->bindParam(':continent',$local2);
                $resultat_insertion_ville = $requete_insertion_ville->execute();
            }

            // mettre à jour les informations dans le tableau Étudiants
            $requete1 = $sql->prepare("UPDATE Info_Etudiants SET prenom = :prenom , nom = :nom , formation = :formation , annee_obtention = :annee , ville_actuelle = :ville , entreprise = :entreprise  WHERE numero_inscription = :numero ; ");
            $requete1->bindParam(':numero', $numero2);
            $requete1->bindParam(':prenom', $prenom2);
            $requete1->bindParam(':nom', $nom2);
            $requete1->bindParam(':formation', $formation2);
            $requete1->bindParam(':annee', $annee2);
            $requete1->bindParam(':ville', $ville2);
            $requete1->bindParam(':entreprise', $entreprise2);
            $resultat1 = $requete1->execute();

            // verifier que les infos sont bien modifiées dans la BD
            $requete_modi_check = $sql -> prepare("SELECT * FROM Info_Ville, Info_Etudiants, Info_Entreprises WHERE Info_Etudiants.entreprise = Info_Entreprises.nom_entreprise AND Info_Etudiants.ville_actuelle = Info_Ville.ville AND Info_Etudiants.numero_inscription = :nume;" );
            $requete_modi_check->bindParam(':nume', $numero2);
            $resultat_modi_check = $requete_modi_check->execute();

            // si le nombre de résultat est de 1 => modification réussie => affichage des infos modifiées
            if ($resultat_modi_check == 1) {
                echo "<h3>Vous avez réussi à modifier les informations de l'adhérent {$numero2} ! </h3>";
                echo "<h4><a href=\"recherche.php\">Retourner à la page précédente</a></h4>";
                echo "<table>";
                echo "<table border=\"1\">
                        <thead>
                            <th>Numéro d'inscription</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Formation</th>
                            <th>Année d'obtention</th>
                            <th>Entreprise</th>
                            <th>Secteur</th>
                            <th>Ville Actuelle</th>
                            <th>Pays</th>
                            <th>Continent</th>
                        </thead>";
                while($ligne = $requete_modi_check -> fetch (PDO::FETCH_OBJ)){
                    echo
                    "
                    <tr>
                    <td>{$ligne->numero_inscription}</td>
                    <td>{$ligne->prenom}</td>
                    <td>{$ligne->nom}</td>
                    <td>{$ligne->formation}</td>
                    <td>{$ligne->annee_obtention}</td>
                    <td>{$ligne->entreprise}</td>
                    <td>{$ligne->secteur}</td>
                    <td>{$ligne->ville_actuelle}</td>
                    <td>{$ligne->pays}</td>
                    <td>{$ligne->continent}</td>
                    </tr>
                    </table>
                    ";
                }
            }
        }     
    echo "</body></html>";   
    }

    // si le type d'opération est 'Supprimer', on supprime les infos d'un adhérent
    if ($operation == 'Supprimer'){
        $numero3 = $_GET['numero2'];
        // verifier si le numero donnée existe dans le réseau 
        $requete_verification = $sql->prepare("SELECT * FROM Info_Etudiants WHERE Info_Etudiants.numero_inscription = :numero;");
        $requete_verification->bindParam(':numero',$numero3);
        $resultat_verification = $requete_verification->execute();
        $nb_resultats = $requete_verification->rowCount();

        // si le nombre de résultat est de 0 => numero inexistant => impossible à supprimer
        if ($nb_resultats == 0){
            echo "<h3> Le numéro d'inscription {$numero3} n'existe pas dans notre réseau, veuillez changer un autre identifiant. </h3> ";
            echo "<h4><a href=\"recherche.php\">Retourner à la page précédente</a></h4>";
        }

        // si le nombre de résultat est de 0 => numero existant => pret à supprimer
        else{
            $requete_suppression = $sql->prepare("DELETE FROM Info_Etudiants WHERE numero_inscription = :numero ;");
            $requete_suppression->bindParam(':numero',$numero3);
            $requete_suppression->execute();

            // verifier si l'adhérent a été supprimé
            $requete_supprimer_check = $sql -> prepare("SELECT * FROM Info_Etudiants WHERE Info_Etudiants.numero_inscription = :numero;" );
            $requete_supprimer_check->bindParam(':numero', $numero3);
            $resultat_supprimer_check = $requete_supprimer_check->execute();
            $nb_resultats_suppression = $requete_supprimer_check->rowCount();

            // si le nombre de résultat est de 0 => numero inexistant => suppression réussie
            if ($nb_resultats_suppression == 0) {
                echo "<h3> Vous avez réussi à supprimer l'adhérant dont le numéro d'inscription est {$numero3}.</h3>";
                echo "<h4><a href=\"recherche.php\">Retourner à la page précédente</a></h4>";
            }
        }
    echo "</body></html>";
    }
?>

