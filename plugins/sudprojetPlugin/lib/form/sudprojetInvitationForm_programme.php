<?php
class sudprojetInvitationForm_programme extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();

       $this->addTextField('time', 'Heure');
       $this->addTextField('title', 'Titre');
       $this->addTextField('sub_title', 'Sous titre');

    }
}

?>