<?php
class sudprojetInvitationForm_article extends czContentObjectSubForm {
    function configure()
    {
        parent::configure();

       $this->addTextField('title', 'Titre');
       $this->addPictureField('illustration', 'Illustration', 150, 69);
       $this->addTextareaField('content', 'Contenu');

    }
}

?>