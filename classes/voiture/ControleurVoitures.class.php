<?php
class ControleurVoitures extends ModelVoitures
{
    public function deleteVoitureById($id)
    {
        $this->deleteVoituresById($id);
    }

    public function enregistrerVoiture($id, $imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege)
    {
        $this->enregistrerVoitures($id, $imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege);
    }

    public function updateUtilisateurById($id, $imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege)
    {
        $this->updateVoituresById($id, $imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege);
    }
}
