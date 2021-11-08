<?php
class ControleurLocations extends ModelLocations{

    public function enregistrerLocation($idLocataire, $idVoiture, $dateDebut, $dateFin, $pays, $prixT)
    {
        $this->enregistrerLocations($idLocataire, $idVoiture, $dateDebut,  $dateFin,  $pays, $prixT);
    }

    public function deleteLocationrById($id){
        $this->deleteLocationsById($id);
    }

    public function updateLocationById($id, $idLocataire, $idVoiture, $dateDebut, $dateFin){
        $this->updateLocationsById($id, $idLocataire, $idVoiture, $dateDebut, $dateFin);
    }
}
