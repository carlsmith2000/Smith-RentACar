<?php
    class VueMiniChat extends ModelMiniChat{

        public function alleMessage(){
            return $this->getAlleMessage();
        }

        public function canConnectUser($pseudo, $password){
            return (object)$this->canConnect($pseudo, $password);
        }
        
    }
?>