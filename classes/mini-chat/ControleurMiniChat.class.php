<?php
    class ControleurMinichat extends ModelMiniChat{

        public function envoyerMessages($id_utilisateur, $messages){
            $this->evoyerMessage($id_utilisateur, $messages);
        }

        public function deleteMessages($id){
            $this->deleteMessage($id);
        }
        
    }
?>