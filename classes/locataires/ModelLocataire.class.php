<?php
class ModelLocataires extends Connection
{

    /** 
     * Cette fonction Permet de recuperer toutes 
     * les voitures de la table locataires
     */
    protected function getAllTenants()
    {
        $sql = "SELECT * FROM locataires";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    /** 
     * Cette fonction Permet de rechercher et recuperer un Locataire  
     */
    protected function researchTenetsById($id)
    {
        $sql = "SELECT * FROM locataires WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
        return COUNT($stm->fetchAll()) > 0;
    }

    /** 
     * Cette fonction Permet de supprimer un Locataire  
     */
    protected function deleteTenetsById($id)
    {
        $sql = "DELETE locataires  WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
    }

    /** 
     * Cette fonction Permet de Modifier un Locataire  
     */
    protected function updateTenetsById($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $pays)
    {
        $sql = "UPDATE locataires SET
            nomComplet = ?, 
            age = ?, cin = ?, 
            dateExpirationPermis = ?, 
            numero = ?, 
            mail = ?, 
            pays = ?
        WHERE id = ? ";

        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $nomComplet, 
                $age, $cin, 
                $dateExpirationPermis, 
                $numero, 
                $mail, 
                $pays,
                $id
            ]
        );
    }
}
