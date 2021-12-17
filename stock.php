<!-- ACCUEIL, PORTES DU SITE -->
<div class="door left-door pf-col">
            <p><span>P</span><span>a</span><span>b</span><span>l</span><span>o</span></p>
            <p><span>C</span><span>a</span><span>z</span><span>i</span><span>n</span></p>
            <!-- bouton ouverture -->
            <div class="pf" id="door-button"><img src="images/cross-svgrepo-com.svg"></div>
        </div>
        <div class="door right-door pf">
            <div>
                <p>développeur</p>
                <p>passionné</p>
            </div>
        </div>





        <?php include 'data.php';

        $projet_array = getProjet();
        foreach($projet_array as $projet) { ?>

            <div class="project-card">
                <div class="project-image">
                    PROJET_img
                </div>
                <div class="project-info">
                    <p><?php echo $projet["projet_nom"];?></p>
                    <p><?php echo $projet["projet_line"];?></p>
                </div>
            </div>

        <?php } ?>