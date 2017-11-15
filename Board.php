<?php require_once 'includes/board_data.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/board.css">
	<title>Wild Knight Fever</title>

</head>
<body>
    <main id="main">
        <img id="board" src="assets/images/board/board_manaless_fhd.png" alt="">

        <!-- Adversaire -->
            <section id="playerTop">
                <!-- Barre de mana adverse -->
                <div class="manaBar topMana">
                    <?php
                        for ($i = 1; $i <= 10; $i++) { 
                           if ($i < $mp) { 
                                echo '<div class="manaOn" id="manaTop'.$i.'"></div>';
                           }
                           else{
                                echo '<div class="manaOff" id="manaTop'.$i.'}"></div>';
                           }
                        }
                    ?>
                    <!-- mana à générer par php-->
                </div>
                <!-- Portrait du joueur adverse -->
                <div class="portrait topPortrait">
                    <?php ?>
                </div>
                <!-- Main du joueur adverse -->
                <div class="hand topHand">
                    <?php ?>
                </div>
                <!-- Terrain du joueur adverse -->
                <div class="field topField">
                    <?php ?>
                </div>
            </section>

        <!-- Joueur actuel -->
            <section id="playerBot">
                <!-- Terrain du joueur actuel -->
                <div class="field botField">
                    <?php ?>
                    <!-- Créatures à générer par php-->
                </div>
            <!-- Main du joueur actuel -->
            <div class="hand botHand">
                <?php

                ?>
            </div>

            <!-- Portrait du joueur actuel -->
            <div class="portrait botPortrait">
                <?php ?>
            </div>

            <!-- Mana du joueur actuel -->
            <div class="manaBar botMana">
                <?php 
                    for ($i = 1; $i <= 10; $i++) { 
                       if ($i <= $mp) { 
                            echo '<div class="manaOn" id="manaTop'.$i.'"></div>';
                       }
                       else{
                            echo '<div class="manaOff" id="manaTop'.$i.'}"></div>';
                       }
                    }
                ?>


            </div>
        </section>

    </main>

</body>
</html>
