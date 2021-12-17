<?php include 'data.php';

if(isset($_POST['comp']) && $_POST['comp'] !== "") {
    $comp = $_POST['comp'];
    addComp($comp);
    header('location: formulaire.php');
}
?>