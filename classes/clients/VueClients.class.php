<?php
    class VueClients extends ModelClients{

        public function getAllTenant(){
            return $this->getAllTenants();
        }

        public function researchTenetById($id){
            return $this->researchTenetsById($id);
        }
    }
?>