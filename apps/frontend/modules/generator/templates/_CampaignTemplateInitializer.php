class <?php echo $ProjectName; ?><?php echo $TemplateName; ?>CampaignTemplateInitializer extends CampaignTemplateInitializer {
  function execute(Campaign $campaign, CampaignTemplate $template)
  {
    $result = array();
    // add your fields initialization here:
    // $result['fieldName'] = 'fieldValue';
    <?php foreach($fields as $fieldName => $fieldInfos){
	printf("\t\t// $result['%s'] = '';\n", $fieldName);
    } ?>
    $xml = czWidgetFormWizard::asXml($result);
    $campaign->setContent($xml);
  }
}