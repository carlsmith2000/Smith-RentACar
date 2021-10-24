<?php
class ModelMiniChat extends Connection
{
    /**
     * Cette Fonction Permet D'envoyer un message
     */
    protected function evoyerMessage($id_utilisateur, $messages, $dateDenvoi, $heureDenvoi)
    {
        $sql = "INSERT INTO message(id_utilisateurs, message, dateDenvoi, heureDenvoi)  VALUES (?, ?, ?, ?)";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id_utilisateur, $messages, $dateDenvoi, $heureDenvoi]);
    }


    /**
     * Cette Fonction Permet De recuperer tout les messages et le personne qui l'ont envoyés;
     */
    protected function getAlleMessage()
    {
        $sql = "SELECT  `message`.`id_utilisateurs`, `utilisateurs`.`pseudo`, `message`.`message`, `message`.   `dateDenvoi`, `message`.`heureDenvoi` 
        FROM `message` 
            INNER JOIN `utilisateurs` 
            ON `utilisateurs`.`id_utilisateur` = `message`.`id_utilisateurs` 
        ORDER BY `message`.`dateDenvoi`, `message`.`heureDenvoi` ASC; ";

        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([]);
        return $stm->fetchAll();
    }

    protected function canConnect($pseudo, $password)
    {
        $sql = "SELECT id_utilisateur, pseudo FROM utilisateurs WHERE pseudo = ? AND password = ?";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$pseudo, $password]);
        return [
            'utilisateur' => $stm->fetch(),
            'userFind' => $stm->rowCount()
        ];
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
