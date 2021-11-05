<?php
class ModelLocations extends Connection
{
    /** 
     * Cette fonction Permet d'enregistrer 
     * un Locations de la table Locations
     */
    protected function enregistrerLocations($idLocataire, $idVoiture, $dateDebut, $dateFin, $pays)
    {
        $sql = "INSERT INTO locations(id_client, id_voiture, dateDebut, dateFin, pays) VALUES(?, ?, ?, ?, ?)";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $idLocataire,
                $idVoiture,
                $dateDebut,
                $dateFin,
                $pays
            ]
        );
    }

    /** 
     * Cette fonction Permet de recuperer toutes 
     * les Locations de la table Locations
     */
    protected function getAllLocations()
    {
        $sql = "SELECT * FROM locations";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    /** 
     * Cette fonction Permet de rechercher et recuperer une Locations  
     */
    protected function researchLocationsById($id)
    {
        $sql = "SELECT * FROM locations WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
        return COUNT($stm->fetchAll()) > 0;
    }

    /** 
     * Cette fonction Permet de supprimer une Locations  
     */
    protected function deleteLocationsById($id)
    {
        $sql = "DELETE locations WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
    }

    /** 
     * Cette fonction Permet de Modifier un utilisateurs  
     */

    protected function updateLocationsById($id, $idLocataire, $idVoiture, $dateDebut, $dateFin)
    {
        $sql = "UPDATE utilisateurs SET
            idLocataire = ?, 
            idVoiture = ?,
            dateDebut = ?,
            dateFin = ?
        WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $idLocataire,
                $idVoiture,
                $dateDebut,
                $dateFin,
                $id
            ]
        );
    }
}
