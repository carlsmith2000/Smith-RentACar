<?php
class ControleurLoctaire extends ModelLocataires{
    public function deleteTenetById($id){
        $this->deleteTenetsById($id);
    }

    public function updateTenetById($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $pays){
        $this->updateTenetById($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $pays);
    }
}
