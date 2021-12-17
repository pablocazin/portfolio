<?php
include 'data.php';
include 'debug.php';

if(
    isset($_POST['projet_nom']) && $_POST['projet_nom'] !== "" &&
    isset($_POST['projet_line']) && $_POST['projet_line'] !== "" &&
    isset($_POST['projet_description']) && $_POST['projet_description'] !== "" &&
    isset($_POST['projet_url']) && $_POST['projet_url'] !== "" &&
    isset($_POST['projet_git']) && $_POST['projet_git'] !== "" &&
    isset($_POST['projet_titre1']) && $_POST['projet_titre1'] !== "" &&
    isset($_POST['projet_screen1']) && $_POST['projet_screen1'] !== "" &&
    isset($_POST['projet_text1']) && $_POST['projet_text1'] !== "" &&
    isset($_POST['projet_titre2']) && $_POST['projet_titre2'] !== "" &&
    isset($_POST['projet_screen2']) && $_POST['projet_screen2'] !== "" &&
    isset($_POST['projet_text2']) && $_POST['projet_text2'] !== "" &&
    isset($_POST['projet_titre3']) && $_POST['projet_titre3'] !== "" &&
    isset($_POST['projet_screen3']) && $_POST['projet_screen3'] !== "" &&
    isset($_POST['projet_text3']) && $_POST['projet_text3'] !== "" &&
    isset($_POST['projet_cdc']) && $_POST['projet_cdc'] !== "" 
)
{
    $projet_nom = $_POST['projet_nom'];

    var_dump(isset($_FILES['projet_img_carte']));
    var_dump($_FILES);

    if(isset($_FILES['projet_img_carte'])){
        $tmpName = $_FILES['projet_img_carte']['tmp_name'];
        $name = $_FILES['projet_img_carte']['name'];
        $size = $_FILES['projet_img_carte']['size'];
        $error = $_FILES['projet_img_carte']['error'];

    /*  explode permets de découper une chaîne de caractère en plusieurs morceaux à partir d’un délimiteur */
        $tabExtension = explode('.', $name);
    /*  strtolower permets de mettre en minuscule tout une chaîne de caractère, 
        end récupere le derniere élément d'un tableau */
        $extension = strtolower(end($tabExtension));

        move_uploaded_file($tmpName, './upload/'.$name);

        //Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        /*if(in_array($extension, $extensions)){
            move_uploaded_file($tmpName, './upload/'.$name);
        }
        else{
            echo "Mauvaise extension";
        }*/

        echo "fait";
    }

    $projet_line = $_POST['projet_line'];
    $projet_description = $_POST['projet_description'];
    $projet_url = $_POST['projet_url'];
    $projet_titre1 = $_POST['projet_titre1'];
    $projet_titre2 = $_POST['projet_titre2'];
    $projet_titre3 = $_POST['projet_titre3'];
    $projet_screen1 = $_POST['projet_screen1'];
    $projet_screen2 = $_POST['projet_screen2'];
    $projet_screen3 = $_POST['projet_screen3'];
    $projet_text1 = $_POST['projet_text1'];
    $projet_text2 = $_POST['projet_text2'];
    $projet_text3 = $_POST['projet_text3'];
    $projet_git = $_POST['projet_git'];
    $projet_cdc = $_POST['projet_cdc'];

    /* $les_competences_du_projet contient les checkboxs validées */
    $comp_array = getComp();
    $les_competences_du_projet = [];

    foreach($comp_array as $comp) {
        if(isset($_POST["c" . $comp["id"]])) {
            array_push($les_competences_du_projet, $comp["id"]);
        }
    }

    /* $les_technos_du_projet contient les checkboxs validées */
    $tech_array = getTech();
    $les_technos_du_projet = [];
    foreach($tech_array as $tech) {
        if(isset($_POST["t" . $tech["id"]])) {
            array_push($les_technos_du_projet, $tech["id"]);
        }
    }

    /*insertProjet(
        $projet_nom, $projet_img_carte, $projet_line,
        $projet_description, $projet_url, $projet_titre1, 
        $projet_titre2, $projet_titre3, $projet_screen1,
        $projet_screen2, $projet_screen3, $projet_text1,
        $projet_text2, $projet_text3, $projet_git, $projet_cdc,
        $les_competences_du_projet, $les_technos_du_projet
    );*/


    /*header('Location: ../index.php');
    exit();*/
}  else {
    echo "Erreur, page introuvable..";
}
?>





 

