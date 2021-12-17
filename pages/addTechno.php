<?php include 'data.php';

if(isset($_POST['techno']) && $_POST['techno'] !== "") {
    $techno = $_POST['techno'];
    addTechno($techno);
    header('location: formulaire.php');
}
?>