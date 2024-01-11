<?php

namespace App\FormatIUT\Service;

use App\FormatIUT\Controleur\ControleurEtuMain;
use App\FormatIUT\Modele\DataObject\Convention;
use App\FormatIUT\Modele\Repository\ConventionRepository;
use App\FormatIUT\Modele\Repository\EntrepriseRepository;
use App\FormatIUT\Modele\Repository\EtudiantRepository;
use App\FormatIUT\Modele\Repository\FormationRepository;
use App\FormatIUT\Modele\Repository\VilleRepository;
use DateTime;

class ServiceConvention
{
    /**
     * @return void permet à l'étudiant connecté de créer sa convention
     * @throws Exception
     */
    public static function creerConvention(): void
    {
        if ($_REQUEST['idOff'] != "aucune") {
            if ($_REQUEST['codePostalEntr'] > 0 && $_REQUEST['siret'] > 0) {
                $entrepriseVerif = (new EntrepriseRepository())->getObjectParClePrimaire($_REQUEST['siret']);
                if (isset($entrepriseVerif)) {
                    $offreVerif = (new FormationRepository())->getObjectParClePrimaire($_REQUEST['idOff']);
                    if ($entrepriseVerif->getSiret() == $offreVerif->getIdEntreprise()) {
                        $villeEntr = (new VilleRepository())->getVilleParIdVilleEntr($entrepriseVerif->getSiret());
                        if ((trim($entrepriseVerif->getNomEntreprise()) == trim($_REQUEST['nomEntreprise'])) && (trim($entrepriseVerif->getAdresseEntreprise()) == trim($_REQUEST['adresseEntr'])) && (trim($villeEntr->getNomVille()) == trim($_REQUEST['villeEntr'])) && ($villeEntr->getCodePostal() == $_REQUEST['codePostalEntr'])) {
                            if ($offreVerif->getDateDebut() == $_REQUEST['dateDebut'] && $offreVerif->getDateFin() == $_REQUEST['dateFin']) {
                                $offreVerif->setAssurance($_REQUEST['assurance']);
                                $offreVerif->setDateCreationConvention($_REQUEST['dateCreation']);
                                $offreVerif->setDateTransmissionConvention($_REQUEST['dateCreation']);
                                $offreVerif->setAssurance($_REQUEST['assurance']);
                                (new FormationRepository())->modifierObjet($offreVerif);
                                ControleurEtuMain::redirectionFlash("afficherAccueilEtu", "success", "Convention créée");
                            } else {
                                ControleurEtuMain::redirectionFlash("afficherAccueilEtu", "success","Erreur sur les dates");
                            }
                        } else {
                            ControleurEtuMain::redirectionFlash("afficherAccueilEtu", "success","Erreur sur les informations de l'entreprise");
                        }
                    } else {
                        ControleurEtuMain::redirectionFlash("afficherAccueilEtu", "success","L'entreprise n'a jamais créé cette offre");
                    }
                } else {
                    ControleurEtuMain::redirectionFlash("afficherAccueilEtu", "success","Erreur l'entreprise n'existe pas");
                }
            } else {
                ControleurEtuMain::redirectionFlash("afficherAccueilEtu", "success","Erreur nombre(s) négatif(s) présent(s)");
            }
        } else {
            ControleurEtuMain::redirectionFlash("afficherAccueilEtu", "success","Aucune offre est liée à votre convention");
        }
    }


}