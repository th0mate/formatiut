<head>
    <link rel="stylesheet" href="../ressources/css/styleVueMesOffres.css">
</head>
<body>
<div id="center">

    <div class="presentation">

        <div class="texteGauche">

            <h3>CONSULTEZ TOUTES VOS OFFRES</h3>
            <p>Consultez et gérez toutes vos offres en quelques clics.</p>

            <form>
                <?php
                echo '<input type="submit" name="type" value="Tous" class="offre" ';
                if ($type == "Tous") echo 'id="typeActuel" disabled';
                echo '><input type="submit" name="type" value="Stage" class="stage" ';
                if ($type == "Stage") echo 'id="typeActuel" disabled';
                echo '><input type="submit" name="type" value="Alternance" class="alternance" ';
                if ($type == "Alternance") echo 'id="typeActuel" disabled';
                echo '>';
                ?>
                <input type="hidden" name="controleur" value="EntrMain">
                <input type="hidden" name="action" value="MesOffres">
            </form>
        </div>

        <div class="imageDroite">
            <img src="../ressources/images/recherchezOffres.png" alt="illustration consult">
        </div>

    </div>

    <div class="offresEntr">
        <div class="contenuOffresEntr">
                <?php
                if (!empty($listeOffres)) {
                    foreach ($listeOffres as $offre) {
                        echo "<a href='?controleur=EntrMain&action=afficherVueDetailOffre&idOffre=" . $offre->getIdOffre() . "' class='wrapOffres'>";
                        echo "<h3>" .$offre->getNomOffre() . " - " . $offre->getTypeOffre() . "</h3>";
                        echo "L'offre " . $offre->getNomOffre() . " du " . date_format($offre->getDateDebut(), 'd-M-Y') . " au " . date_format($offre->getDateFin(), 'd-M-Y') . " pour " . $offre->getSujet();
                        echo "<br> " . $offre->getDetailProjet();
                        echo "</a>";
                    }
                } else {
                    echo "Vous n'avez aucune offre";
                } ?>
        </div>
    </div>
</div>
</body>
