<?php
class ControleurLocations extends ModelLocations{

    public function enregistrerLocation($idLocataire, $imm, $dateDebut,  $heureDebut, $dateFin, $heureFin, $pays)
    {
        $this->enregistrerLocations($idLocataire, $imm, $dateDebut,  $heureDebut, $dateFin, $heureFin, $pays);
    }

    public function deleteLocationrById($id){
        $this->deleteLocationsById($id);
    }

    public function updateLocationById($id, $idLocataire, $imm, $dateDebut, $dateFin){
        $this->updateLocationsById($id, $idLocataire, $imm, $dateDebut, $dateFin);
    }
}
