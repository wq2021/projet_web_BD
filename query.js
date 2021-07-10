// charger le DOM du document et accéder aux noeuds du document
// exemple d'instruction : $("sélecteur").méthode(paramètres);
$(document).ready(function(){

    // les blocs suivants présentent les opérations en fonction des différents évènements du clic (click)
    // il s'agit de la récupération des valeurs du formulaire et de l'affichage d'une boîte d'alerte (alert)
    
    // voici les méthodes différentes qu'on a utilisées pour extraire les informations du formulaire :
    // .text() : récupérer le contenu du texte
    // .val() : récupérer la valeur d’une zone de texte
    // $("input[name='local']:checked").val() : récupérer la valeur d’un bouton radio 
    // $("select[name='formation']:enabled").val() : récupérer la valeur d’un menu déroulant

    $("#Send").click(function envoi1() {
        var affichage = 
        "Voici les informations que vous avez choisies pour la recherche:" + "\n\n"
        + $("label[for='formation']").text() + " " + $("select[name='formation']:enabled").val() + "\n"
        + $("label[for='annee']").text() + " " + $("input[name='annee']").val() + "\n"
        + $("label[for='secteur']").text() + " " + $("select[name='secteur']:enabled").val() + "\n"
        + $("label[for='local']").text() + " " + $("input[name='local']:checked").val() + "\n\n"
        ;
        alert(affichage);
    })

    $("#Add").click(function envoi2() {
        var affichage = 
        "Voici les informations que vous avez insérées pour l'ajout:" + "\n\n"
        + $("label[for='numero1']").text() + " " + $("input[name='numero1']").val() + "\n"
        + $("label[for='nom']").text() + " " + $("input[name='nom']").val() + "\n"
        + $("label[for='prenom']").text() + " " + $("input[name='prenom']").val() + "\n"
        + $("label[for='formation1']").text() + " " + $("select[name='formation1']:enabled").val() + "\n"
        + $("label[for='annee1']").text() + " " + $("input[name='annee1']").val() + "\n"
        + $("label[for='entreprise']").text() + " " + $("input[name='entreprise']").val() + "\n"
        + $("label[for='secteur1']").text() + " " + $("select[name='secteur1']:enabled").val() + "\n"
        + $("label[for='ville']").text() + " " + $("input[name='ville']").val() + "\n"
        + $("label[for='pays']").text() + " " + $("input[name='pays']").val() + "\n"
        + $("label[for='local1']").text() + " " + $("select[name='local1']:enabled").val() + "\n\n"
        ;
        alert(affichage);
    })

    $("#Change").click(function envoi3() {
        var affichage = 
        "Voici les informations que vous avez insérées pour la modification:" + "\n\n"
        + $("label[for='numero1']").text() + " " + $("input[name='numero1']").val() + "\n"
        + $("label[for='nom']").text() + " " + $("input[name='nom']").val() + "\n"
        + $("label[for='prenom']").text() + " " + $("input[name='prenom']").val() + "\n"
        + $("label[for='formation1']").text() + " " + $("select[name='formation1']:enabled").val() + "\n"
        + $("label[for='annee1']").text() + " " + $("input[name='annee1']").val() + "\n"
        + $("label[for='entreprise']").text() + " " + $("input[name='entreprise']").val() + "\n"
        + $("label[for='secteur1']").text() + " " + $("select[name='secteur1']:enabled").val() + "\n"
        + $("label[for='ville']").text() + " " + $("input[name='ville']").val() + "\n"
        + $("label[for='pays']").text() + " " + $("input[name='pays']").val() + "\n"
        + $("label[for='local1']").text() + " " + $("select[name='local1']:enabled").val() + "\n\n"
        ;
        alert(affichage);
    })

    $("#Delete").click(function envoi4() {
        var affichage = 
        "Voici l'identifiant que vous voulez supprimer :" + "\n\n"
        + $("label[for='numero2']").text() + " " + $("input[name='numero2']").val() + "\n\n"
        ;
        alert(affichage);
    })
});








