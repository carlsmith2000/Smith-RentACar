<?php
class ControleurUtilisateurs extends ModelUtilisateurs{
    public function deleteUtilisateurById($id){
        $this->deleteUtilisateursById($id);
    }

    public function updateUtilisateurById($idUser, $pseudo, $password, $message){
        $this->updateUtilisateursById($idUser, $pseudo, $password, $message);
    }
}
