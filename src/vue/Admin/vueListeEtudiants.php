<div id="center">
    <div class="gauche">
        <h3 class="titre">Étudiants Enregistrés :</h3>

        <div class="wrapEtudiants">
            <?php
            if (sizeof($listeEtudiants) > 0) {
                foreach ($listeEtudiants as $etudiant) {
                    echo"
                    <a class='etudiant' href=?action=afficherDetailEtudiant&numEtu=" . $etudiant['etudiant']->getNumEtudiant() . "&controleur=AdminMain>
                            <div class='etudiantGauche'>
                               <img src='data:image/jpeg;base64," . base64_encode($etudiant['etudiant']->getImg()) . "' alt='etudiant'>
                            </div>
                            <div class='etudiantDroite'>
                                <h3 class='titre'>" . $etudiant['etudiant']->getPrenomEtudiant() . " " . $etudiant['etudiant']->getNomEtudiant() . " - "; if ($etudiant['etudiant']->getGroupe() != ""){echo $etudiant['etudiant']->getGroupe()  . " - " . $etudiant['etudiant']->getParcours(); } else {echo "Des informations sont manquantes";} echo "</h3>
                                ";
                            if ($etudiant["aUneFormation"]) {
                                echo "<div id='valide' class='statutEtu'><img src='../ressources/images/success.png' alt='valide'><p>A une formation validée</p></div>";
                            } else {
                                echo "<div id='nonValide' class='statutEtu'><img src='../ressources/images/warning.png' alt='valide'><p>Aucun stage/alternance</p></div>";
                            }
                            echo "
                            </div>
                        </a>
                    
                    ";
                }
            }
            ?>
        </div>
    </div>

    <div class="droite">
        <img src="../ressources/images/adminRemove.png" alt="admin">
        <h3 class="titre" id="rouge">Gestion des Étudiants de la Base de Données</h3>
        <h4 class="titre">Consultez le statut de chaque étudiant en un coup d'oeil</h4>
        <p>Cliquez sur un étudiant pour voir ses détails</p>
    </div>


</div>