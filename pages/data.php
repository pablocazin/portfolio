<?php

$host = 'localhost';
$db   = 'portfolio';
$user = 'admin';
$pass = 'admin'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

/* récupérer la liste des projets */
function getProjet(){
    global $pdo;
    $req = $pdo->prepare('SELECT * FROM projet');
    $req->execute();
    return $req->fetchAll();
}

function getComp(){
    global $pdo;
    $req = $pdo->prepare('SELECT * FROM comp');
    $req->execute();
    return $req->fetchAll();
}

function getTech(){
    global $pdo;
    $req = $pdo->prepare('SELECT * FROM tech');
    $req->execute();
    return $req->fetchAll();
}

function addComp($comp) {
    global $pdo;
    $sql = "INSERT INTO comp (comp_nom) VALUES (?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$comp]);
}

function addTechno($techno) {
    global $pdo;
    $sql = "INSERT INTO tech (tech_nom) VALUES (?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$techno]);
}

/* insérer les liens projet/compétences dans la table de liaison projet_comp */
function lierProjetComp($projet_id, $les_competences_du_projet) {
    global $pdo;
    foreach($les_competences_du_projet as $comp) {
        $sql = "INSERT INTO projet_comp (projet_id, comp_id) VALUES (?,?);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$projet_id, $comp]);
    }
}

/* insérer les liens projet/technos dans la table projet_tech */
function lierProjetTech($projet_id, $les_technos_du_projet) {
    global $pdo;
    foreach($les_technos_du_projet as $tech) {
        $sql = "INSERT INTO projet_tech (projet_id, tech_id) VALUES (?,?);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$projet_id, $tech]);
    }
}

/* inserer les éléments du projet dans la table projet */
function insertProjet(
    $projet_nom, $projet_img_carte, $projet_line,
    $projet_description, $projet_url, $projet_titre1, 
    $projet_titre2, $projet_titre3, $projet_screen1,
    $projet_screen2, $projet_screen3, $projet_text1,
    $projet_text2, $projet_text3, $projet_git, $projet_cdc,
    $les_competences_du_projet, $les_technos_du_projet)  
{
    global $pdo;
    $sql = "INSERT INTO projet (
    projet_nom, projet_img_carte, projet_line, projet_description,
    projet_url, projet_titre1, projet_titre2, projet_titre3,
    projet_screen1, projet_screen2, projet_screen3, projet_text1,
    projet_text2, projet_text3, projet_git, projet_cdc) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

    $stmt= $pdo->prepare($sql);
    $stmt->execute([
    $projet_nom, $projet_img_carte, $projet_line, $projet_description,
    $projet_url, $projet_titre1, $projet_titre2, $projet_titre3,
    $projet_screen1, $projet_screen2, $projet_screen3, $projet_text1,
    $projet_text2, $projet_text3, $projet_git, $projet_cdc
    ]);

    $projet_id = $pdo->lastInsertId();
    /*var_dump($les_competences_du_projet);
    var_dump($les_technos_du_projet);
    var_dump($projet_id);*/

    lierProjetComp($projet_id, $les_competences_du_projet);
    lierProjetTech($projet_id, $les_technos_du_projet);
}
?>

