<?php
require_once(dirname(__FILE__) . '/../bootstrap/unit.php');

class CampaignTemplateImporterTest extends PHPUnit_Framework_TestCase {
    protected function setUp()
    {
		$this->importer = new CampaignTemplateImporter();
	}
	public function testSubformIsTransformed()
	{
		$content = '
<!-- cze:subform name="subform1" -->
	<!-- cze:field name="field1" label="Field 1" type="text" -->field 1<!-- /cze:field -->
<!-- /cze:subform -->';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(1, $fields);
		$this->assertCount(1, $fields['subform1']['fields']);
		$this->assertEquals('text', $fields['subform1']['fields']['field1']['type']);
	}
	public function testMissingNameInSubform()
	{
		$content = '<!-- cze:subform --><!-- /cze:subform -->';
		$updatedContent = $this->importer->execute($content);
		$errors = $this->importer->getErrors();
		$this->assertNotCount(0, $errors);
	}
//	public function testMissingFormInSubform()
//	{
//		$content = '<!-- cze:subform name="subform" --><!-- /cze:subform -->';
//		$updatedContent = $this->importer->execute($content);
//		$errors = $this->importer->getErrors();
//		$this->assertNotCount(0, $errors);
//	}
//	public function testUnknownFormInSubform()
//	{
//		$content = '<!-- cze:subform name="subform" form="fdqsndsiubdnqsiudbsqiudbqsuyqs" --><!-- /cze:subform -->';
//		$updatedContent = $this->importer->execute($content);
//		$errors = $this->importer->getErrors();
//		$this->assertNotCount(0, $errors);
//	}
	public function testSubformWith2FieldsIsTransformed()
	{
		$content = '
<!-- cze:subform name="subform1" -->
	<!-- cze:field name="field1" label="Field 1" type="text" -->field 1<!-- /cze:field -->
	<!-- cze:field name="field2" label="Field 2" type="text" -->field 2<!-- /cze:field -->
<!-- /cze:subform -->';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(1, $fields);
		$this->assertCount(2, $fields['subform1']['fields']);
		$this->assertEquals('text', $fields['subform1']['fields']['field1']['type']);
		$this->assertEquals('text', $fields['subform1']['fields']['field2']['type']);
	}
	public function testMultipleSubformsWithSameFieldNamesAreTransformed()
	{
		$content = '
<!-- cze:subform name="subform1" -->
	<!-- cze:field name="field1" label="Field 1" type="text" -->field 1<!-- /cze:field -->
	<!-- cze:field name="field2" label="Field 2" type="text" -->field 2<!-- /cze:field -->
<!-- /cze:subform -->

<!-- cze:subform name="subform2" -->
	<!-- cze:field name="field1" label="Field 1" type="text" -->field 1<!-- /cze:field -->
	<!-- cze:field name="field2" label="Field 2" type="text" -->field 2<!-- /cze:field -->
<!-- /cze:subform -->
';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(2, $fields);
		$this->assertCount(2, $fields['subform1']['fields'], 'subform1');
		$this->assertCount(2, $fields['subform2']['fields'], 'subform2');
		$this->assertEquals('text', $fields['subform1']['fields']['field1']['type']);
		$this->assertEquals('text', $fields['subform2']['fields']['field2']['type']);
	}
	public function testMultipleSubformsWithOtherFieldsAreTransformed()
	{
		$content = '
<!-- cze:subform name="subform1" -->
	<!-- cze:field name="field1" label="Field 1" type="text" -->field 1<!-- /cze:field -->
	<!-- cze:field name="field2" label="Field 2" type="text" -->field 2<!-- /cze:field -->
<!-- /cze:subform -->

	<!-- cze:field name="field1" label="Field 1" type="text" -->field 1<!-- /cze:field -->
	<!-- cze:field name="field2" label="Field 2" type="text" -->field 2<!-- /cze:field -->

<!-- cze:subform name="subform2" -->
	<!-- cze:field name="field1" label="Field 1" type="text" -->field 1<!-- /cze:field -->
	<!-- cze:field name="field2" label="Field 2" type="text" -->field 2<!-- /cze:field -->
<!-- /cze:subform -->
';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(4, $fields);
		$this->assertCount(2, $fields['subform1']['fields'], 'subform1');
		$this->assertCount(2, $fields['subform2']['fields'], 'subform2');
		$this->assertEquals('text', $fields['subform1']['fields']['field1']['type']);
		$this->assertEquals('text', $fields['subform2']['fields']['field2']['type']);
	}
	public function testUnknownFieldTypeIsTransformed()
	{
		$content = '<!-- cze:field name="field1" label="Field 1" type="misteriousType" -->...<!-- /cze:field -->';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(1, $fields);
		$this->assertEquals('misteriousType', $fields['field1']['type']);
		$this->assertEquals('Field 1', $fields['field1']['label']);
	}
	public function testMissingFieldTypeIsStoredAsTextType()
	{
		$content = '<!-- cze:field name="field1" -->...<!-- /cze:field -->';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(1, $fields);
		$this->assertEquals('text', $fields['field1']['type']);
	}
	public function testMissingLabelIsGuessedFromName()
	{
		$content = '<!-- cze:field name="field1" type="text" -->...<!-- /cze:field -->';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(1, $fields);
		$this->assertEquals('Field 1', $fields['field1']['label']);
	}
	public function testMissingLabelIsGuessedFromName2()
	{
		$content = '<!-- cze:field name="SomeSampleFieldName" type="text" -->...<!-- /cze:field -->';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(1, $fields);
		$this->assertEquals('Some sample field name', $fields['SomeSampleFieldName']['label']);
	}
	public function testMissingLabelIsGuessedFromName3()
	{
		$content = '<!-- cze:field name="SomeSampleFieldName123" type="text" -->...<!-- /cze:field -->';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(1, $fields);
		$this->assertEquals('Some sample field name 123', $fields['SomeSampleFieldName123']['label']);
	}
	public function testTextFieldTypeIsTransformed()
	{
		$content = '<!-- cze:field name="field1" label="Field 1" type="text" -->...<!-- /cze:field -->';
		$updatedContent = $this->importer->execute($content);

		$this->assertNotEquals($content, $updatedContent);
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(1, $fields);
		$this->assertEquals('text', $fields['field1']['type']);
		$this->assertEquals('Field 1', $fields['field1']['label']);
	}
	public function testCampaignTitleIsExtractedAndReplacedWithCampaignSubject()
	{
		$content = '<html><head><title>Campaign Template Test</title></head><body></body></html>';
		$updatedContent = $this->importer->execute($content, 'foo', 'bar');

		$this->assertEquals('Campaign Template Test', $this->importer->getTitle());
		$this->assertNotEquals($content, $updatedContent);
	}
	public function testCampaignImagePathAreUpdated()
	{
		$content = '<html><body><img src="image.jpg" /></body></html>';
		$updatedContent = $this->importer->execute($content, 'foo', 'bar');

		$this->assertContains('src="<?php echo CatalyzEmailing::getApplicationUrl() ?>/fooPlugin/images/bar/image.jpg"', $updatedContent);
	}
	public function testPictureFieldSizeAreGuessedFromContent()
	{
		$content = '<html><body><!-- cze:field name="field1" label="Field 1" type="picture" --><img src="image.jpg" width="150" height="200" /><!-- /cze:field --></body></html>';
		$updatedContent = $this->importer->execute($content, 'foo', 'bar');
		$fields = $this->importer->getFields();
		$this->assertEquals(150, $fields['field1']['mapper']->getWidth());
		$this->assertEquals(200, $fields['field1']['mapper']->getHeight());
	}
	public function testUrlFieldReplaceUrlInContent()
	{
		$content = '<html><body><!-- cze:field name="field1" label="Field 1" type="url" --><a href="#VALUE#">foo</a><!-- /cze:field --></body></html>';
		$updatedContent = $this->importer->execute($content, 'foo', 'bar');
		$this->assertContains('<?php if(isset($parameters["field1"])){ ?><a href="<?php echo czWidgetFormLink::displayLink($parameters["field1"]); ?>">foo</a><?php } ?>', $updatedContent);
	}
	public function testUrlFieldReplaceOtherFieldsInContent()
	{
		$content = '
<html><body>
<!-- cze:field name="title" type="text" --><!-- /cze:field -->
<!-- cze:field name="url" type="url" --><a href="#VALUE#">#VALUE(title)#</a><!-- /cze:field -->
</body></html>';
		$updatedContent = $this->importer->execute($content, 'foo', 'bar');
		$this->assertContains('<?php if(isset($parameters["url"])){ ?><a href="<?php echo czWidgetFormLink::displayLink($parameters["url"]); ?>"><?php echo $parameters["title"]; ?></a><?php } ?>', $updatedContent);
	}
	public function testX()
	{
		$content = '
<html><body>
<!-- cze:subform name="right_links" label="Liens" -->
                      <table width="272" align="center" cellspacing="0" cellpadding="0" border="0">
                     <tr valign="top">
                     	<td height="10" bgcolor="#ffffff"><img src="bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                     </tr>

                        	<tr valign="top">
                            <td width="16" bgcolor="#ffffff"><!-- cze:field name="url" type="url" label="Lien" --><a style="margin-top:5px; margin-right:5px;" href="#VALUE#" target="_blank"><img src="bullet_1.jpg" width="16" height="16" alt="" border="0" /></a><!-- /cze:field --></td>
                              	  <td width="8" bgcolor="#ffffff"><img src="bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                                <td width="272" bgcolor="#ffffff"><font face="Arial, sans-serif" style="text-transform:uppercase; line-height: 14px; font-size: 10px; color:#527461"><a style="color:#527461; text-decoration:none;" href="#VALUE(right_links.url)#" target="_blank"><!-- cze:field name="text" type="text" label="Libellé" --><!-- /cze:field --></a></font></td>
                            </tr>
                               <tr valign="top">
                   				 <td height="10" bgcolor="#ffffff"><img src="bg_white.jpg" width="1" height="1" alt="" border="0" /></td>
                  			  </tr>
                         </table>
                         <!-- /cze:subform -->
</body></html>';
		$updatedContent = $this->importer->execute($content, 'foo', 'bar');
		$fields = $this->importer->getFields();
		//print_r($fields);
		$this->assertCount(1, $fields);
		$this->assertCount(2, $fields['right_links']['fields']);
		$this->assertEquals('url', $fields['right_links']['fields']['url']['type']);
		$this->assertEquals('text', $fields['right_links']['fields']['text']['type']);
	}
}

?>