<?php
class ControleurLocations extends ModelLocations{

    public function enregistrerLocation($idLocataire, $idVoiture, $dateDebut,  $heureDebut, $dateFin, $heureFin, $pays)
    {
        $this->enregistrerLocations($idLocataire, $idVoiture, $dateDebut,  $heureDebut, $dateFin, $heureFin, $pays);
    }

    public function deleteLocationrById($id){
        $this->deleteLocationsById($id);
    }

    public function updateLocationById($id, $idLocataire, $idVoiture, $dateDebut, $dateFin){
        $this->updateLocationsById($id, $idLocataire, $idVoiture, $dateDebut, $dateFin);
    }
}
