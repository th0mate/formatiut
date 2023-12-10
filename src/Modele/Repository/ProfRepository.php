<?php

namespace App\FormatIUT\Modele\Repository;

use App\FormatIUT\Modele\DataObject\AbstractDataObject;
use App\FormatIUT\Modele\DataObject\Prof;

class ProfRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "Profs";
    }

    protected function getNomsColonnes(): array
    {
        return array("loginProf", "nomProf", "prenomProf", "mailUniversitaire", "estAdmin", "img_id");
    }

    protected function getClePrimaire(): string
    {
        return "loginProf";
    }

    public function construireDepuisTableau(array $dataObjectTableau): AbstractDataObject
    {
        $estAdmin=false;

        return new Prof(
            $dataObjectTableau["loginProf"],
            $dataObjectTableau["nomProf"],
            $dataObjectTableau["prenomProf"],
            $dataObjectTableau["mailUniversitaire"],
            $dataObjectTableau["estAdmin"],
            $dataObjectTableau["img_id"]
        );
    }

    public function estProf(string $login): bool
    {
        $sql = "SELECT COUNT(*) FROM " . $this->getNomTable() . " WHERE loginProf=:Tag";
        $pdoStetement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $values = array("Tag" => $login);
        $pdoStetement->execute($values);
        $count = $pdoStetement->fetch();
        if ($count > 0) return true;
        else return false;
    }
    public function getParNom(String $nomProf): ?Prof{
        $sql="SELECT * FROM ".$this->getNomTable(). " WHERE nomProf=:Tag";
        $pdoStatement=ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $values=array("Tag"=>$nomProf);
        $pdoStatement->execute($values);
        $prof=$pdoStatement->fetch();
        if (!$prof){
            return null;
        }else{
            return $prof;
        }
    }
}
