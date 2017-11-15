<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start;
        if (empty($_SESSION['id_deck1']) OR empty($_SESSION['id_deck2'])) {
            header('location:index.php'); 
            exit();
        }
    }
    
    else{
        header('location:index.php'); 
        exit();
    }

    $p1 = unserialize($_SESSION['p1']);
    $p2 = unserialize($_SESSION['p2']);

    //Models
        $pm = new PlayerModel();
        $gm = new GameModel();
        $cm = new CardModel();
        $lm = new LibraryModel();

    //Current Player
        $current;

        $hand = explode($current->getPHand());


        foreach ($hand as $card) { 
            //Récupération des données de la carte.
                $lib_fk = $card->getCModFk();
                $attr = $lm->get($lib_fk);
            ?> 

            <div class="<?= $attr->getMType(); ?>">
                <p class="manaCost"><?= $attr->getMMana(); ?></p>
                <p class="cardLife"><?= $card->getCDef(); ?></p>
                <p class="atk"><?= $attr->getMAtk();  ?></p>
                <p class="description"><?= $attr->getMText(); ?></p>
            </div> 

            <?php
        }

 ?>