<?php

namespace App\FormatIUT\Lib\AffichagesRecherche;

use App\FormatIUT\Configuration\Configuration;

class ProfRecherche extends AbstractAffichage
{

    function getTitreRouge()
    {
        return htmlspecialchars(parent::getObjet()->getPrenomProf()) . ' ' . htmlspecialchars(parent::getObjet()->getNomProf());
    }

    function getLienAction()
    {
        //return '?action=afficherDetailProf&controleur=' . Configuration::getControleurName() . '&loginProf=' . parent::getObjet()->getLoginProf();
    }

    function getTitres()
    {
        $titres = '<h4 class="titre">';
        if (parent::getObjet()->isEstAdmin()) {
            $titres.= 'Administrateur';
        } else {
            $titres.= 'Professeur';
        }
        $titres.= '</h4>
        <h5 class="titre">' . htmlspecialchars(parent::getObjet()->getMailUniversitaire()) . '</h5>';
        return $titres;
    }

    function getImage()
    {
        return Configuration::getUploadPathFromId(parent::getObjet()->getImg());
    }
}