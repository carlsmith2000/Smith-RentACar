<?php
    class ControleurMinichat extends ModelMiniChat{

        public function envoyerMessages($id_utilisateur, $messages, $dateDenvoi, $heureDenvoi){
            $this->evoyerMessage($id_utilisateur, $messages, $dateDenvoi, $heureDenvoi);
        }

        public function deleteMessages($id){
            $this->deleteMessage($id);
        }
        
    }
?>