<?php
    class VueVoitures extends ModelVoitures{

        public function getAllVoiture(){
            return $this->getAllVoitures();
        }

        public function researchVoitureById($id){
            return (object)$this->researchVoituresById($id);
        }

        public function researchVoituresByMarques($marque){
            return  (object)$this->researchVoituresByMarque($marque);
        }

        public function researchVoituresByModels($model){
            return  (object)$this->researchVoituresByModel($model);
        }
    }
?>