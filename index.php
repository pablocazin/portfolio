<?php
include 'debug.php';
include 'data.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Pablo Cazin</title>
</head>

<body>

    <!-- ACCUEIL, PORTES DU SITE -->
    <div class="door left-door pf-col">
        <p><span>P</span><span>a</span><span>b</span><span>l</span><span>o</span></p>
        <p><span>C</span><span>a</span><span>z</span><span>i</span><span>n</span></p>
        <!-- bouton ouverture -->
        <div class="pf" id="door-button">
            <img src="images/cross-svgrepo-com.svg">
        </div>
    </div>
    <div class="door right-door pf">
        <div>
            <p>développeur</p>
            <p>passionné</p>
        </div>
    </div>

    <!-- ACCUEIL, PORTES DU SITE -->
    <div class="header">
        <!-- titre, header de la page-->
        <div class="header-title">
            <p>Développeur</p>
            <p>passionné</p>

        </div>
        <!-- boutons du header -->
        <div class="pf-col header-buttons">
            <!-- bouton fermeture-->
            <div class="pf door-button-page"><img src="images/cross-svgrepo-com.svg"></div>
            <!-- bouton about -->
            <div class="pf door-button-page"><img src="images/utilisateur.png"></div>
        </div>
    </div>
    <div id="main-title">Mes projets</div>
    <div class="filter-container pf-col">
        <div class="filter-select">
            <p class="filtrer">filtrer</p>
            <p class="trier">trier</p>
        </div>
        <!-- div des catégories onclick-->
        <div class="filtrer-box">
            <?php include 'pages/data.php';
            $tech_array = getTech();
            foreach ($tech_array as $tech) { ?>
                <div><?php echo $tech["tech_nom"]; ?></div>
            <?php } ?>

        </div>
        <div class="trier-box">
            <?php
            $comp_array = getComp();
            foreach ($comp_array as $comp) { ?>
                <div><?php echo $comp["comp_nom"]; ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="project-list">

        <?php
        $projet_array = getProjet(); ?>
        <?php foreach ($projet_array as $projet) { ?>
            <div class="project-card">
                <div class="project-image">
                    <img src="<?php echo $projet["projet_img_carte"]; ?>">
                </div>
                <div class="project-info">
                    <p><?php echo $projet["projet_nom"]; ?></p>
                    <p><?php echo $projet["projet_line"]; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- ajouter un bouton back to top-->
    <button id="top-button">back to top</button>
    <script src='app.js'></script>
</body>

</html>