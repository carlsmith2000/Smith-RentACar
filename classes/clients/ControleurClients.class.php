<?php
class ControleurClients extends ModelClients
{

    public  function enregistrerClient($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $pays)
    {
        $this->enregistrerClients($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $pays);
    }

    public function deleteTenetById($id)
    {
        $this->deleteTenetsById($id);
    }

    public function updateTenetById($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $pays)
    {
        $this->updateTenetById($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $pays);
    }
}
