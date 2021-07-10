<!DOCTYPE html>
<html lang="fr">
<!-- les métadonnées-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="query.js"></script>
    <!-- le titre de la page-->
    <title>Page de recherche</title>
</head>
<body>
    <!-- une section en tant qu'en-tête -->
    <header>
        <!-- un lien sur l'image (logo de l'inalco) -->
        <a href="http://www.inalco.fr/">
            <img src="img/logo.png" alt="logo_inalco" target="_blank"/>
        </a>
        <h1>L'Association des Anciens Inalcoliens en Master (AAIM)</h1>
        <h4>Une plate-forme pour les anciens étudiants du master de l'<a href="http://www.inalco.fr/" target="_blank">Inalco</a></h4>
    </header>

    <!-- une section possédant des liens de navigation -->
    <nav>
        <h3 class="froid">
            <a href="accueil.html">Accueil</a>
            <a href="formation.html">Formations en master</a>
            <a href="recherche.php">Recherche</a>
            <a href="contact.html">Contact</a>
            <a href="login.php">Déconnexion</a>
        </h3>
    </nav>

    <!-- une section à l’intérieur -->
    <section>
        <div>
            <h3>
                Effectuez une recherche sur notre réseau des anciens Inalcoliens !
            </h3>
        </div>
        <div>
            <!-- formulaire pour la recherche, méthode GET, interaction avec "interaction.php" -->
            <form method="GET" action="interaction.php">
                <!-- menu déroulant pour les choix de la formation -->
                <label for="formation">Formation :</label>
                <select name="formation">
                    <option value="Didactique des langues (DDL)">Didactique des langues (DDL)</option>
                    <option value="Langues, littératures, civilisations étrangères et régionales (LLCER)">Langues, littératures, civilisations étrangères et régionales (LLCER)</option>
                    <option value="Langues et sociétés">Langues et sociétés</option>
                    <option value="Management et Commerce international (MCI)">Management et Commerce international (MCI)</option>
                    <option value="Relations internationales (RI)">Relations internationales (RI)</option>
                    <option value="Sciences du langage (SDL)">Sciences du langage (SDL)</option>
                    <option value="Traitement automatique des langues (TAL)">Traitement automatique des langues (TAL)</option>
                    <option value="Traduction et Interprétation (TI)">Traduction et Interprétation (TI)</option>
                </select><br>
                
                <!-- entrée pour l'année d'obtention -->
                <label for="annee">Année d'obtention :</label>
                <input type="number" name="annee"><br>
                
                <!-- menu déroulant pour le secteur de travail -->
                <label for="secteur">Secteur de travail :</label>
                <select name="secteur">
                    <option value="Communication, Art">Communication, Art</option>
                    <option value="Agriculture, Artisanat">Agriculture, Artisanat</option>
                    <option value="Hôtellerie, Restauration">Hôtellerie, Restauration</option>
                    <option value="BTP (Bâtiment et des Travaux Publics)">BTP (Bâtiment et des Travaux Publics)</option>
                    <option value="Transport et Logistique">Transport et Logistique</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Industrie">Industrie</option>
                    <option value="Enseignement, Santé, Action sociale, culturelle, et sportive">Enseignement, Santé, Action sociale, culturelle, et sportive</option>
                    <option value="Gestion, Emplois administratifs de la fonction publique">Gestion, Emplois administratifs de la fonction publique</option>
                    <option value="Information, Télécommunication">Information, Télécommunication</option>
                    <option value="Banque, Assurance">Banque, Assurance</option>
                    <option value="Divers">Divers</option>    
                </select><br>
                
                <!-- choix unique (bouton radio) pour le secteur de travail -->
                <label for="local">Localisation (Continent):</label>
                <input type="radio" name="local" value="Europe">Europe
                <input type="radio" name="local" value="Asie">Asie
                <input type="radio" name="local" value="Amérique latine">Amérique latine
                <input type="radio" name="local" value="Amérique du nord">Amérique du nord
                <input type="radio" name="local" value="Océanie">Océanie
                <input type="radio" name="local" value="Afrique">Afrique<br>
                <input value="Envoyer" type="submit" id="Send" name="type_operation">
            </form>
            
            <!-- formulaire pour la visualisation, méthode GET, interaction avec "interaction.php" -->
            <form method="GET" action="interaction.php">
                <h3>Voulez-vous voir toutes les informations ? </h3>
                <input value="Visualiser" type="submit" id="Visualiser" name="type_operation">
            </form>
        </div>
    </section>

    <section>
        <div>
            <h3>
                Envie d'ajouter ou de modifier les informations sur un nouvel adhérent ? 
            </h3>
            <h4 class="centre">
                N'oubliez pas à remplir tous les champs !
            </h4>
            <!-- formulaire pour l'ajout/ la modification, méthode GET, interaction avec "interaction.php" -->
            <form method="GET" action="interaction.php">

                <!-- entrée pour le numéro d'inscription -->
                <label for="numero1">Numéro d'inscription (5 chiffres) : </label>
                <input type="number" name="numero1"><br>
                <!-- entrée pour le nom -->
                <label for="nom">Nom :</label>
                <input type="text" name="nom"><br>
                <!-- entrée pour le prénom -->
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom"><br>

                <!-- menu déroulant pour les choix de la formation -->
                <label for="formation1">Formation :</label> 
                <select name="formation1">
                    <option value="Didactique des langues (DDL)">Didactique des langues (DDL)</option>
                    <option value="Langues, littératures, civilisations étrangères et régionales (LLCER)">Langues, littératures, civilisations étrangères et régionales (LLCER)</option>
                    <option value="Langues et sociétés">Langues et sociétés</option>
                    <option value="Management et Commerce international (MCI)">Management et Commerce international (MCI)</option>
                    <option value="Relations internationales (RI)">Relations internationales (RI)</option>
                    <option value="Sciences du langage (SDL)">Sciences du langage (SDL)</option>
                    <option value="Traitement automatique des langues (TAL)">Traitement automatique des langues (TAL)</option>
                    <option value="Traduction et Interprétation (TI)">Traduction et Interprétation (TI)</option>
                </select><br>

                <!-- entrée pour l'année d'obtention -->
                <label for="annee1">Année d'obtention : </label>
                <input type="number" name="annee1"><br>
                <!-- entrée pour l'entreprise -->
                <label for="entreprise">Entreprise : </label>
                <input type="text" name="entreprise"><br>

                <!-- menu déroulant pour les choix du secteur -->
                <label for="secteur1">Secteur de travail :</label>
                <select name="secteur1">
                    <option value="Communication, Art">Communication, Art</option>
                    <option value="Agriculture, Artisanat">Agriculture, Artisanat</option>
                    <option value="Hôtellerie, Restauration">Hôtellerie, Restauration</option>
                    <option value="BTP (Bâtiment et des Travaux Publics)">BTP (Bâtiment et des Travaux Publics)</option>
                    <option value="Transport et Logistique">Transport et Logistique</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Industrie">Industrie</option>
                    <option value="Enseignement, Santé, Action sociale, culturelle, et sportive">Enseignement, Santé, Action sociale, culturelle, et sportive</option>
                    <option value="Gestion, Emplois administratifs de la fonction publique">Gestion, Emplois administratifs de la fonction publique</option>
                    <option value="Information, Télécommunication">Information, Télécommunication</option>
                    <option value="Banque, Assurance">Banque, Assurance</option>
                    <option value="Divers">Divers</option>    
                </select><br>

                <!-- entrée pour la localisation de la ville -->
                <label for="ville">Localisation (Ville):</label> 
                <input type="text" name="ville"><br>
                <!-- entrée pour la localisation du pays -->
                <label for="pays">Localisation (Pays): </label>
                <input type="text" name="pays"><br>
                
                <!-- menu déroulant pour les choix du continent -->
                <label for="local1">Localisation (Continent): </label>
                <select name="local1">
                    <option value="Europe">Europe</option>
                    <option value="Asie">Asie</option>
                    <option value="Amérique du nord">Amérique du nord</option>
                    <option value="Amérique latine">Amérique latine</option>
                    <option value="Afrique">Afrique</option>
                    <option value="Océanie">Océanie</option>
                </select><br>
                <input value="Ajouter" type="submit" id="Add" name="type_operation">
                <input value="Modifier" type="submit" id="Change" name="type_operation">
            </form>
        </div>
    </section>

    <section>
        <div>
            <h3>
                Vous souhaitez de supprimer les informations d'un adhérent ?
            </h3>
            <h4 class="centre">
                Nous vous conseillons de bien repérer le numéro d'inscription par notre moteur de recherche :)
            </h4>
            <!-- formulaire pour la suppression, méthode GET, interaction avec "interaction.php" -->
            <form method="GET" action="interaction.php">
                <!-- entrée pour le numéro d'inscription -->
                <label for="numero2">Numéro d'inscription :</label>
                <input type="number" name="numero2"><br>
                <input value="Supprimer" type="submit" id="Delete" name="type_operation">
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