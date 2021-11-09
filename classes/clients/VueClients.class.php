<?php
    class VueClients extends ModelClients{

        public function getAllTenant(){
            return $this->getAllTenants();
        }

        public function researchTenetById($id){
            return (object)$this->researchTenetsById($id);
        }
        public function maxIdClient(){
            return (object)$this->maxId();
        }
    }
?>