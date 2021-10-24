<?php
class ControleurClients extends ModelClients
{

    public  function enregistrerClient($nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $adresse, $codeConnexion)
    {
        $this->enregistrerClients($nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $adresse, $codeConnexion);
    }

    public function deleteTenetById($id)
    {
        $this->deleteTenetsById($id);
    }

    public function updateTenetById($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $adresse, $codeConnexion)
    {
        $this->updateTenetById($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $adresse, $codeConnexion);
    }
}
