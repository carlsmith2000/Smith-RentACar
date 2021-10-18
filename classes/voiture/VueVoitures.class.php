<?php
    class VueVoitures extends ModelVoitures{

        public function getAllVoiture(){
            return $this->getAllVoitures();
        }

        public function researchUtilisateurById($id){
            return $this->researchVoituresById($id);
        }
    }
?>