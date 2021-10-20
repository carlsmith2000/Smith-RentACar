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
     * Cette Fonction Permet De recuperer tout les messages et le personne qui l'ont envoyés;
     */
    protected function getAlleMessage()
    {
        $sql = "SELECT * 
        FROM `utilisateurs` 
        INNER JOIN `message` 
        ON `utilisateurs`.`id_utilisateur` = `message`.`id_utilisateurs`;";

        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([]);
        return $stm->fetchAll();
    }

    /**
     * Cette Fonction Permet De supprimer tout un messages ;
     */
    protected function deleteMessage($id)
    {
        $sql = " DELETE message FROM message WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
    }
}
