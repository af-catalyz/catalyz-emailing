<?php
class comparexLandingForm_menu extends czContentObjectSubFormLanding {
    function configure()
    {
        parent::configure();
        $this->addTextField('title', 'Titre', array('style' => 'width: 400px;'));
        $this->addUrlField('url', 'URL');
    }
}

?>