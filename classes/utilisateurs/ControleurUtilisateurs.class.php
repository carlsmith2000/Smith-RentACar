<?php
class ControleurUtilisateurs extends ModelUtilisateurs{
    
    public function enregistrerUtilisateur($idUser, $pseudo, $message){
        $this->enregistrerUtilisateurs($idUser, $pseudo, $message);
    }

    public function deleteUtilisateurById($id){
        $this->deleteUtilisateursById($id);
    }

    public function updateUtilisateurById($idUser, $pseudo,    $message){
        $this->updateUtilisateursById($idUser, $pseudo, $message);
    }

    public function updateStatuts($idUser, $statut){
        return $this->updateStatut($idUser, $statut);
    }
}
