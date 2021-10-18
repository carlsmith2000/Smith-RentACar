<?php
    class VueLocataires extends ModelLocataires{

        public function getAllTenant(){
            return $this->getAllTenants();
        }

        public function researchTenetById($id){
            return $this->researchTenetsById($id);
        }
    }
?>