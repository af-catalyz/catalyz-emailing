<?php
class elaulCampaign01Form extends czForm {
    public function configure()
    {
        parent::configure();

        //region baseline
        $this->widgetSchema['baseline'] = new sfWidgetFormTextarea(array(), array('label' => 'Base line', 'style' => 'width: 400px'));
        $this->validatorSchema['baseline'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('baseline', '');
        //endregion

        //region lien_1_title
        $this->widgetSchema['lien_1_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px'));
        $this->validatorSchema['lien_1_title'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('lien_1_title', '');
        //endregion

        //region lien_1_link
        $this->widgetSchema['lien_1_link'] = new czWidgetFormLink(array(), array('label' => false, 'style' => 'width: 400px'));
        $this->validatorSchema['lien_1_link'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('lien_1_link', '');
        //endregion

        //region lien_2_title
        $this->widgetSchema['lien_2_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px'));
        $this->validatorSchema['lien_2_title'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('lien_2_title', '');
        //endregion

        //region lien_2_link
        $this->widgetSchema['lien_2_link'] = new czWidgetFormLink(array(), array('label' => false, 'style' => 'width: 400px'));
        $this->validatorSchema['lien_2_link'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('lien_2_link', '');
        //endregion

        //region lien_3_title
        $this->widgetSchema['lien_3_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px'));
        $this->validatorSchema['lien_3_title'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('lien_3_title', '');
        //endregion

        //region lien_3_link
        $this->widgetSchema['lien_3_link'] = new czWidgetFormLink(array(), array('label' => false, 'style' => 'width: 400px'));
        $this->validatorSchema['lien_3_link'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('lien_3_link', '');
        //endregion

        //region edito
        $this->widgetSchema['edito'] = new sfWidgetFormTextarea(array(), array('label' => 'Edito', 'style' => 'width: 400px', 'rows' => 5));
        $this->validatorSchema['edito'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('edito', '');
        //endregion

        //region products_subform
        $this->widgetSchema['products_subform'] = new czWidgetFormSubForm(array(
                'fieldName' => 'products_subform',
                'formClass' => 'elaulCampaign01Form_products',
                'contentObjectClass' => 'campaign[content]',
                'title' => 'title',
                'label.add' => 'Ajouter un nouveau produit',
                ), array('label' => false)
            );
        $this->validatorSchema['products_subform'] = new czValidatorSubForm(array('formClass' => 'elaulCampaign01Form_products'));
        $this->getWidgetSchema()->setHelp('products_subform', '');
        //endregion

        //region catalog_title
        $this->widgetSchema['catalog_title'] = new sfWidgetFormTextarea(array(), array('label' => 'Titre', 'style' => 'width: 400px'));
        $this->validatorSchema['catalog_title'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('catalog_title', '');
        //endregion

        //region catalog_link
        $this->widgetSchema['catalog_link'] = new czWidgetFormLink(array(), array('label' => false, 'style' => 'width: 400px'));
        $this->validatorSchema['catalog_link'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('catalog_link', '');
        //endregion

	    	//region atouts_title
	    	$this->widgetSchema['atouts_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px'));
	    	$this->validatorSchema['atouts_title'] = new sfValidatorString(array('required' => false));
	    	$this->getWidgetSchema()->setHelp('atouts_title', '');
	    	//endregion

        //region atouts
        $this->widgetSchema['atouts'] = new czWidgetFormTextareaTinyMCE(array('height' => 300), array('label' => 'Contenu'));
        $this->validatorSchema['atouts'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('atouts', '');
        //endregion

        //region question_box
        $this->widgetSchema['question_box'] = new czWidgetFormTextareaTinyMCE(array('height' => 300), array('label' => 'Boite "Une Question"'));
        $this->validatorSchema['question_box'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('question_box', '');
        //endregion

	    	//region references_title
	    	$this->widgetSchema['references_title'] = new sfWidgetFormInput(array(), array('label' => 'Titre', 'style' => 'width: 400px'));
	    	$this->validatorSchema['references_title'] = new sfValidatorString(array('required' => false));
	    	$this->getWidgetSchema()->setHelp('references_title', '');
	    	//endregion

        //region references_content
        $this->widgetSchema['references_content'] = new czWidgetFormTextareaTinyMCE(array('height' => 300), array('label' => 'Introduction'));
        $this->validatorSchema['references_content'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('references_content', '');
        //endregion

        //region references_subform
        $this->widgetSchema['references_subform'] = new czWidgetFormSubForm(array(
                'fieldName' => 'references_subform',
                'formClass' => 'elaulCampaign01Form_reference',
                'contentObjectClass' => 'campaign[content]',
                'title' => 'title',
                'label.add' => 'Ajouter une référence',
                ), array('label' => false)
            );
        $this->validatorSchema['references_subform'] = new czValidatorSubForm(array('formClass' => 'elaulCampaign01Form_reference'));
        $this->getWidgetSchema()->setHelp('references_subform', '');
        //endregion

        //region bottom_introduction
        $this->widgetSchema['bottom_introduction'] = new sfWidgetFormTextarea(array(), array('label' => 'Introduction', 'style' => 'width: 400px', 'rows' => 5));
        $this->validatorSchema['bottom_introduction'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('bottom_introduction', '');
        //endregion

        //region bottom_content
        $this->widgetSchema['bottom_content'] = new czWidgetFormSubForm(array(
                'fieldName' => 'bottom_content',
                'formClass' => 'elaulCampaign01Form_bottom',
                'contentObjectClass' => 'campaign[content]',
                'title' => 'title',
                'label.add' => 'Ajouter un nouveau produit',
                ), array('label' => false)
            );
        $this->validatorSchema['bottom_content'] = new czValidatorSubForm(array('formClass' => 'elaulCampaign01Form_bottom'));
        $this->getWidgetSchema()->setHelp('bottom_content', '');
        //endregion

        //region footer
        $this->widgetSchema['footer'] = new czWidgetFormTextareaTinyMCE(array('height' => 300), array('label' => 'Contenu'));
        $this->validatorSchema['footer'] = new sfValidatorString(array('required' => false));
        $this->getWidgetSchema()->setHelp('footer', '');
        //endregion

        //region legals_top
        $this->addWysiwygField('legals_top','Mentions haut de page' );
        //endregion

        //region legals_bottom
        $this->addWysiwygField('legals_bottom','Mentions bas de page' );
        //endregion

        $this->widgetSchema->setNameFormat('campaign[content][%s]');
    }
}