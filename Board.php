<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/board.css">
	<title>Knight Fever</title>

</head>
<body>
    <main id="main">
        <img id="board" src="assets/images/board/board_manaless_fhd.png" alt="">

        <!-- Adversaire -->
        <section id="playerTop">
            <!-- Barre de mana adverse -->
            <div class="manaBar topMana">
                <?php ?>
                <!-- mana à générer par php-->
                <div class="manaOff" id="manaTop1"></div>
                <div class="manaOff" id="manaTop2"></div>
                <div class="manaOff" id="manaTop3"></div>
                <div class="manaOff" id="manaTop4"></div>
                <div class="manaOff" id="manaTop5"></div>
                <div class="manaOff" id="manaTop6"></div>
                <div class="manaOff" id="manaTop7"></div>
                <div class="manaOff" id="manaTop8"></div>
                <div class="manaOff" id="manaTop9"></div>
                <div class="manaOff" id="manaTop10"></div>
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
                <div class="creature" id="creatureBot1">
                    <p class="manaCostShadow">5</p>
                    <p class="manaCost">5</p>
                    <p class="cardLife">7</p>
                    <p class="atk">4</p>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="creature" id="creatureBot2">
                    <p class="manaCostShadow">5</p>
                    <p class="manaCost">5</p>
                    <p class="cardLife">7</p>
                    <p class="atk">4</p>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="creature" id="creatureBot3">
                    <p class="manaCostShadow">5</p>
                    <p class="manaCost">5</p>
                    <p class="cardLife">7</p>
                    <p class="atk">4</p>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="creature" id="creatureBot4">
                    <p class="manaCostShadow">5</p>
                    <p class="manaCost">5</p>
                    <p class="cardLife">7</p>
                    <p class="atk">4</p>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="creature" id="creatureBot5">
                    <p class="manaCostShadow">5</p>
                    <p class="manaCost">5</p>
                    <p class="cardLife">7</p>
                    <p class="atk">4</p>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="creature" id="creatureBot6">
                    <p class="manaCostShadow">5</p>
                    <p class="manaCost">5</p>
                    <p class="cardLife">7</p>
                    <p class="atk">4</p>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="creature" id="creatureBot7">
                    <p class="manaCostShadow">5</p>
                    <p class="manaCost">5</p>
                    <p class="cardLife">7</p>
                    <p class="atk">4</p>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="creature" id="creatureBot8">
                    <p class="manaCostShadow">5</p>
                    <p class="manaCost">5</p>
                    <p class="cardLife">7</p>
                    <p class="atk">4</p>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="creature" id="creatureBot9">
                    <p class="manaCostShadow">5</p>
                    <p class="manaCost">5</p>
                    <p class="cardLife">7</p>
                    <p class="atk">4</p>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
            <!-- Main du joueur actuel -->
            <div class="hand botHand">
                <?php ?>
            </div>
            <!-- Portrait du joueur actuel -->
            <div class="portrait botPortrait">
                <?php ?>
            </div>
            <!-- Mana du joueur actuel -->
            <div class="manaBar botMana">
                <?php ?>
                <!-- mana à générer par php-->
                <div class="manaOn" id="manaBot1"></div>
                <div class="manaOn" id="manaBot2"></div>
                <div class="manaOn" id="manaBot3"></div>
                <div class="manaOn" id="manaBot4"></div>
                <div class="manaOn" id="manaBot5"></div>
                <div class="manaOn" id="manaBot6"></div>
                <div class="manaOn" id="manaBot7"></div>
                <div class="manaOff" id="manaBot8"></div>
                <div class="manaOff" id="manaBot9"></div>
                <div class="manaOff" id="manaBot10"></div>
            </div>
        </section>

    </main>

</body>
</html>
