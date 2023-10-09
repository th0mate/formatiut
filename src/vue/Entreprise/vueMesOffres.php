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
                    echo "<div class='partieGauche'>";
                    echo "<h3>" . $offre->getNomOffre() . " - " . $offre->getTypeOffre() . "</h3>";
                    echo "<p> Du " . date_format($offre->getDateDebut(), 'd/m/Y') . " au " . date_format($offre->getDateFin(), 'd/m/Y') . " pour " . $offre->getSujet() . "</p>";
                    echo "<p>" . $offre->getDetailProjet() . "</p>";
                    echo "</div>";
                    echo "<div class='partieDroite'>";
                    echo "<div class='divInfo' id='wrapLogo'>";
                    echo "<img src='../ressources/images/logo_CA.png' alt='logo'>";
                    echo "</div>";
                    echo "<div class='divInfo' id='nbPostu'>";
                    echo "<img src='../ressources/images/recherche-demploi.png' alt='postulations'>";
                    echo "<p>";
                    $nb=(new \App\FormatIUT\Modele\Repository\EtudiantRepository())->nbPostulation($offre->getIdOffre());
                    echo $nb." postulation";
                    if ($nb>1) echo "s";
                    echo "</p>";
                    echo "</div>";
                    echo "<div class='divInfo' id='statutOffre'>";
                    echo "<img src='../ressources/images/verifier.png' alt='statut'>";
                    echo "<p>Offre validée</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</a>";
                }
            } else {
                echo "Vous n'avez aucune offre";
            } ?>
        </div>
    </div>
</div>
</body>
