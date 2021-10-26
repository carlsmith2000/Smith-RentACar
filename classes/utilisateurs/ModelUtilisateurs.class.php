<?php
class ModelUtilisateurs extends Connection
{
    /** 
     * Cette fonction Permet d'enregistrer 
     * des utilisateurs dans la table utilisateurs
     */
    protected function enregistrerUtilisateurs($pseudo, $password){
        $sql = "INSERT INTO utilisateurs(pseudo, password) VALUES (?, ?)";
        $stm = $this->getConnection()->prepare($sql);
        return $stm->execute(
            [
                $pseudo, 
                $password
            ]
        );
    }

    /** 
     * Cette fonction Permet de recuperer toutes 
     * les Utilisateurs en ligne de la table Utilisareur
     */
    protected function getAllUtilisateurs()
    {
        $sql = "SELECT id_utilisateur, pseudo, statut FROM utilisateurs";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    /** 
     * Cette fonction Permet de recuperer les dix(10)
     * derniers des Utilisateurs
     */

    // protected function getLastUtilisateurMessages()
    // {
    //     $sql = "SELECT id_messagess FROM utilisateurs";
    //     $stm = $this->getConnection()->prepare($sql);
    //     $stm->execute();
    //     return $stm->fetchAll();
    // }

    /** 
     * Cette fonction Permet de rechercher et recuperer un utilisateurs  
     */
    protected function researchUtilisateursById($id)
    {
        $sql = "SELECT * FROM utilisateurs WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
        return $stm->fetchAll();
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

    protected function updateUtilisateursById($idUser, $pseudo, $password)
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

    protected function updateStatut($idUser, $statut){
        $sql = "UPDATE utilisateurs SET
            statut = ? 
        WHERE id_utilisateur = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $statut, 
                $idUser
            ]
        );
        return $stm->rowCount();
    }
}
