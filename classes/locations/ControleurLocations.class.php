<?php
class ControleurLocations extends ModelLocations{

    public function enregistrerLocations($id, $idLocataire, $imm, $dateDebut, $dateFin){
        $this->enregistrerLocations($id, $idLocataire, $imm, $dateDebut, $dateFin);
    }

    public function deleteLocationrById($id){
        $this->deleteLocationsById($id);
    }

    public function updateLocationById($id, $idLocataire, $imm, $dateDebut, $dateFin){
        $this->updateLocationsById($id, $idLocataire, $imm, $dateDebut, $dateFin);
    }
}
