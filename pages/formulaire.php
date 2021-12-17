<?php include 'debug.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleSheets/formulaire.css">
    <title>Formulaire Portfolio</title>
</head>
<body>
    <div class="form-container">
        <form enctype="multipart/form-data" action="add.php" method="post">

            <label for="projet_nom">nom du projet</label>
            <input type="text" name="projet_nom" id="projet_nom" required>

            <label for="projet_img_carte">image de la carte</label>
            <input type="file" name="projet_img_carte" id="projet_img_carte" required>

            <label for="projet_line">phrase catchy</label>
            <input type="text" name="projet_line" id="projet_line" required>

            <label for="projet_description">description du projet</label>
            <input type="text" name="projet_description" id="projet_description" required>

            <label for="projet_url">lien vers le projet</label>
            <input type="url" name="projet_url" id="projet_url">

            <label for="projet_git">lien vers le git</label>
            <input type="url" name="projet_git" id="projet_git">

            <label for="projet_titre1">titre du premier screen</label>
            <input type="text" name="projet_titre1" id="projet_titre1" required>

                <label for="projet_screen1">premier screen</label>
                <input type="file" name="projet_screen1" id="projet_screen1" required>

                    <label for="projet_text1">text relatif au premier screen</label>
                    <textarea id="projet_text1" name="projet_text1"
                            rows="5" cols="33" required>
                    </textarea>

            <label for="projet_titre2">titre du deuxieme screen</label>
            <input type="text" name="projet_titre2" id="projet_titre2">

                <label for="projet_screen2">deuxieme screen</label>
                <input type="file" name="projet_screen2" id="projet_screen2">

                    <label for="projet_text2">text relatif au deuxieme screen</label>
                    <textarea id="projet_text2" name="projet_text2"
                            rows="5" cols="33">
                    </textarea>

            <label for="projet_titre3">titre du troisieme screen</label>
            <input type="text" name="projet_titre3" id="projet_titre3">

                <label for="projet_screen3">troisieme screen</label>
                <input type="file" name="projet_screen3" id="projet_screen3">

                    <label for="projet_text3">text relatif au troisieme screen</label>
                    <textarea id="projet_text3" name="projet_text3"
                            rows="5" cols="33">
                    </textarea>

            <label for="projet_cdc">cahier des charges .pdf</label>
            <input type="file" name="projet_cdc" id="projet_cdc">


            
            <?php include 'data.php';
            $tech_array = getTech();
            foreach($tech_array as $tech) { ?>
                <label for="<?php echo "t" . $tech["id"]?>"><?php echo $tech["tech_nom"]?></label>
                <input type="checkbox" 
                    name="<?php echo "t" . $tech["id"]?>" 
                    id="<?php echo "t" . $tech["id"]?>" 
                    value="<?php echo $tech["id"]?>"
                >
            <?php }?>

            <?php 
            $comp_array = getComp();
            foreach($comp_array as $comp) { ?>
                <label for="<?php echo "c" . $comp["id"]?>"><?php echo $comp["comp_nom"]?></label>
                <input type="checkbox" 
                name="<?php echo "c" . $comp["id"]?>" 
                id="<?php echo "c" . $comp["id"]?>" 
                value="<?php echo $comp["id"]?>"
            >
            <?php }?>

            <input type="submit" value="envoyer">

        </form>
    </div>

    <div class="form-container">
        <form action="addTechno.php" method="post">
            <label for="techno">Ajouter une techno</label>
            <input type="text" name="techno" id="techno" required>
            <input type="submit" value="envoyer">
        </form>
    </div>

    <div class="form-container">
    <form action="addComp.php" method="post">
        <label for="comp">Ajouter une compétences</label>
            <input type="text" name="comp" id="comp" required>
            <input type="submit" value="envoyer">
        </form>
    </div>
</body>
</html>