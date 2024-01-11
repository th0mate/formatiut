<?php

use App\FormatIUT\Configuration\Configuration;
use App\FormatIUT\Modele\Repository\EtudiantRepository;
use App\FormatIUT\Modele\Repository\FormationRepository;
$entreprise = (new \App\FormatIUT\Modele\Repository\EntrepriseRepository())->getObjectParClePrimaire(\App\FormatIUT\Lib\ConnexionUtilisateur::getNumEntrepriseConnectee());

?>

<div class="mainCatalogue">

    <div class="descCatalogue">

        <div class="wrap">
            <img src="../ressources/images/vueCatalogueEtu.png" alt="image de bienvenue">
            <h3 class="titre">Catalogue des Offres</h3>
            <h4 class="titre">Retrouvez ici toutes les offres de stage et d'alternance disponibles sur Format'IUT !</h4>
        </div>

        <div class="tips">
            <img src="../ressources/images/astuces.png" alt="astuces">
            <div>
                <h4 class="titre">Astuces :</h4>
                <h5 class="titre">Triez les offres par leur type grâce aux filtres, et recherchez avec plus de détails
                    avec
                    la barre de recherche</h5>
            </div>
        </div>

        <div class="wrapForm">

            <h3 class="titre">Options de tri :</h3>

            <form>
                <?php

                $_GET["etat"] = $_REQUEST["etat"] ?? "Tous";
                $_GET["type"] = $_REQUEST["type"] ?? "Tous";

                echo '<input type="submit" name="type" value="Tous" class="inputOffre" ';
                if ($type == "Tous") echo 'id="typeActuel" disabled';
                echo '><input type="submit" name="type" value="Stage" class="stage" ';
                if ($type == "Stage") echo 'id="typeActuel" disabled';
                echo '><input type="submit" name="type" value="Alternance" class="alternance" ';
                if ($type == "Alternance") echo 'id="typeActuel" disabled';
                echo '>';
                echo '<input type="hidden" name="etat" value="' . $_REQUEST["etat"] . '">'
                ?>
                <input type="hidden" name="controleur" value="EntrMain">
                <input type="hidden" name="action" value="afficherMesOffres">
            </form>
            <form>
                <?php
                echo '<input type="submit" name="etat" value="Tous" class="inputOffre" ';
                if ($etat == "Tous") echo 'id="etatActuel" disabled';
                echo '><input type="submit" name="etat" value="Dispo" class="stage" ';
                if ($etat == "Dispo") echo 'id="etatActuel" disabled';
                echo '><input type="submit" name="etat" value="Assigné" class="alternance" ';
                if ($etat == "Assigné") echo 'id="etatActuel" disabled';
                echo '>';
                echo '<input type="hidden" name="type" value="' . $_REQUEST["type"] . '">'
                ?>
                <input type="hidden" name="controleur" value="EntrMain">
                <input type="hidden" name="action" value="afficherMesOffres">

            </form>

        </div>

    </div>

    <div class="wrapMosaique">
        <h2 class="titre rouge">Liste des offres de Stage et d'Alternance :</h2>

        <div class="mosaique">
            <?php
            $data = $listeOffres;

            if ($data == null) {
                echo '<div class="erreurGrid"> <img src="../ressources/images/erreur.png" alt="erreur"> <h3 class="titre" id="rouge">Aucune offre ne correspond à vos critères</h3></div>';
            } else {

                for ($i = 0; $i < count($data); $i++) {
                    $offre = $data[$i];
                    $offre = (new \App\FormatIUT\Modele\Repository\FormationRepository())->getObjectParClePrimaire($offre);
                    $red = "";
                    $entreprise = (new \App\FormatIUT\Modele\Repository\EntrepriseRepository())->getObjectParClePrimaire($offre->getIdEntreprise());
                    $n = 2;
                    $row = intdiv($i, $n);
                    $col = $i % $n;
                    if (($row + $col) % 2 == 0) {
                        $red = "demi";
                    }
                    echo '<a href="?controleur=EtuMain&action=afficherVueDetailOffre&idFormation=' . $offre->getIdFormation() . '" class="offre ' . $red . '">
            <img src="' . Configuration::getUploadPathFromId($entreprise->getImg()) . '" alt="pp entreprise">
           <div>
           <h3 class="titre rouge">' . htmlspecialchars($entreprise->getNomEntreprise()) . '</h3>
           <h4 class="titre">' . htmlspecialchars($offre->getNomOffre()) . '</h4>
           <h4 class="titre">' . htmlspecialchars($offre->getTypeOffre()) . '</h4>
           <h5 class="titre">' . htmlspecialchars($offre->getSujet()) . '</h5>
           <div><img src="../ressources/images/equipe.png" alt="candidats"> <h4 class="titre">';

                    $nb = (new EtudiantRepository())->nbPostulations($offre->getidFormation());
                    if ($nb == 0) {
                        echo "Aucun";
                    } else {
                        echo $nb;
                    }

                    echo " candidat";
                    if ($nb > 1) {
                        echo "s";
                    }
                    echo
                    '</h4> </div>
            </div>
            </a>';
                }
            }

            ?>
        </div>

    </div>

</div>
