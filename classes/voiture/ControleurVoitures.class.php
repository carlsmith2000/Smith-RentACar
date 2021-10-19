<?php
class ControleurVoitures extends ModelVoitures
{
    public function deleteVoitureById($id)
    {
        $this->deleteVoituresById($id);
    }

    public function enregistrerVoiture( $imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege)
    {
        $this->enregistrerVoitures(null, $imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege);
    }

    public function updateUtilisateurById($id, $imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege)
    {
        $this->updateVoituresById($id, $imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege);
    }
}
