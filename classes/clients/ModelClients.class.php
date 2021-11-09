<?php
class ModelClients extends Connection
{

    /** 
     * Cette fonction Permet de recuperer toutes 
     * les voitures de la table clients
     */
    protected function enregistrerClients($nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $adresse, $codeConnexion)
    {
        $sql = "INSERT INTO clients VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $nomComplet,
                $age, 
                $cin,
                $dateExpirationPermis,
                $numero,
                $mail,
                $adresse,
                $codeConnexion
            ]
        );
    }

    /** 
     * Cette fonction Permet de recuperer toutes 
     * les client de la table clients
     */
    protected function getAllTenants()
    {
        $sql = "SELECT * FROM clients";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    
   /** 
     * Cette fonction Permet de retourner le dernier id de la table client
     */
    protected function maxId(){
        $sql = "SELECT max(id_client) as maxId FROM clients";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([]);
        return ["maxId"=>$stm->fetch()];
    }
    /** 
     * Cette fonction Permet de rechercher et recuperer un Locataire  
     */
    protected function researchTenetsById($code)
    {
        $sql = "SELECT * FROM clients WHERE codeConnexion = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$code]);
        return [
            'found'=>$stm->rowCount(),
            'clientFound'=>$stm->fetch()
        ];
    }



    /** 
     * Cette fonction Permet de supprimer un Locataire  
     */
    protected function deleteTenetsById($id)
    {
        $sql = "DELETE clients  WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
    }

    /** 
     * Cette fonction Permet de Modifier un Locataire  
     */
    protected function updateTenetsById($id, $nomComplet, $age, $cin, $dateExpirationPermis, $numero, $mail, $adresse)
    {
        $sql = "UPDATE clients SET
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
                $age,
                $cin,
                $dateExpirationPermis,
                $numero,
                $mail,
                $adresse,
                $id
            ]
        );
    }
}
