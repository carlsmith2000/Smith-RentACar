<?php
    class VueUtilisateurs extends ModelUtilisateurs{

        public function getAllUtilisateur(){
            return $this->getAllUtilisateurs();
        }

        public function researchUtilisateurById($id){
            return $this->researchUtilisateursById($id);
        }
    }
?>