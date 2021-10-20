<?php
class ModelMiniChat extends Connection
{
    /**
     * Cette Fonction Permet D'envoyer un message
     */
    protected function evoyerMessage($id_utilisateur, $messages)
    {
        $sql = "INSERT INTO message(id_utilisateurs, messages)  VALUES (?, ?)";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id_utilisateur, $messages]);
    }

    
    /**
     * Cette Fonction Permet De recuperer tout les messages;
     */
    protected function getAlleMessage($id_utilisateur, $messages)
    {
        $sql = "SELECT * FROM message";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([]);
        return $stm->fetchAll();
    }
}
?>