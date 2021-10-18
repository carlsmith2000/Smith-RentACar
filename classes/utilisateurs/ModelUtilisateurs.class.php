<?php
class ModelUtilisateurs extends Connection
{
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

    protected function updateUtilisateursById($idUser, $pseudo, $password, $message)
    {
        $sql = "UPDATE utilisateurs SET
            pseudo = ?, 
            password = ? 
        WHERE idUser = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $pseudo, 
                $password,
                $idUser
            ]
        );
    }
}
