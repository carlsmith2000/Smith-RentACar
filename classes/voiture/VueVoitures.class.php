<?php
    class VueVoitures extends ModelVoitures{

        public function getAllVoiture(){
            return $this->getAllVoitures();
        }

        public function researchUtilisateurById($id){
            return $this->researchVoituresById($id);
        }

        public function researchVoituresByMarques($marque){
            return $this->researchVoituresByMarque($marque);
        }

        public function researchVoituresByModels($model){
            return $this->researchVoituresByModel($model);
        }
    }
?>