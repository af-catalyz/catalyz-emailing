<?php
class comparexLandingForm_menu extends czContentObjectSubFormLanding {
    function configure()
    {
        parent::configure();
        $this->addTextField('title', 'Titre');
        $this->addUrlField('url', 'URL');
    }
}

?>