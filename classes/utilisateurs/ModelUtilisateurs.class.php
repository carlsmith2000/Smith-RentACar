<?php
class ModelUtilisateurs extends Connection
{
    /** 
     * Cette fonction Permet d'enregistrer 
     * des utilisateurs dans la table utilisateurs
     */
    protected function enregistrerUtilisateurs($pseudo, $message){
        $sql = "INSERT INTO utilisateurs VALUES (null, ?, ?)";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $pseudo, 
                $message
            ]
        );
        }

    /** 
     * Cette fonction Permet de recuperer toutes 
     * les Utilisateurs de la table Utilisareur
     */
    protected function getAllUtilisateurs()
    {
        $sql = "SELECT * FROM utilisateurs";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    /** 
     * Cette fonction Permet de recuperer les dix(10)
     * derniers des Utilisateurs
     */

    protected function getLastTenMessage()
    {
        $sql = "SELECT messages FROM utilisateurs";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    /** 
     * Cette fonction Permet de rechercher et recuperer un utilisateurs  
     */
    protected function researchUtilisateursById($id)
    {
        $sql = "SELECT * FROM utilisateurs WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
        return COUNT($stm->fetchAll()) > 0;
    }

    /** 
     * Cette fonction Permet de supprimer un utilisateurs  
     */
    protected function deleteUtilisateursById($id)
    {
        $sql = "DELETE utilisateurs WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
    }

    /** 
     * Cette fonction Permet de Modifier un utilisateurs  
     */

    protected function updateUtilisateursById($idUser, $pseudo,   $message)
    {
        $sql = "UPDATE utilisateurs SET
            pseudo = ?, 
            password = ? 
        WHERE idUser = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $pseudo, 
                $idUser
            ]
        );
    }
}
