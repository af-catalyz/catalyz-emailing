<?php
require_once(dirname(__FILE__) . '/../bootstrap/unit.php');

class CampaignSpyFilterTest extends PHPUnit_Framework_TestCase {
    protected $filter;
    protected $root_url;
    protected function setUp()
    {
		$this->root_url = 'http://local.catalyz-emailing.com/';

    	// Create a stub for the SomeClass class.
    	$stub = $this->getMockBuilder('CampaignLinkSerializer')
                     ->disableOriginalConstructor()
                     ->getMock();

    	// Create a map of arguments to return values.
    	$map = array(
          array('http://www.google.com', '1'),
        );

    	// Configure the stub.
    	$stub->expects($this->any())
             ->method('getCampaignLinkId')
             ->will($this->returnValueMap($map));

        $this->filter = new CampaignSpyFilter($stub, $this->root_url);
    }
    public function testTransformSimpleUrl()
    {
        $content = '<a href="http://www.google.com">google</a>';
        $content .= '<a href="http://www.google.com">google</a>';

        $result = $this->filter->execute($content);
    	        $this->assertNotEquals($content, $result);

    	if(preg_match_all('/<a[^>]*href="([^"]+)"[^>]*>/', $result, $matches)){
    		$this->assertCount(2, $matches);
    		$this->assertEquals(sprintf('%s/campaign/link/key/#EMAIL#-1-1', $this->root_url), $matches[1][0]);
    		$this->assertEquals(sprintf('%s/campaign/link/key/#EMAIL#-1-2', $this->root_url), $matches[1][1]);
    	}else{
    		$this->fail('No links found in transformed content');
    	}

    }
    public function testExtractLinksSimpleUrl()
    {
        $content = '<a href="http://www.google.com">google</a>';

        $result = $this->filter->getLinkList($content);
        $this->assertCount(1, $result);
    }
    public function testExtractLinksUrlWithAnchor()
    {
        $content = '<a href="http://www.google.com#anchor">google</a>';

        $result = $this->filter->getLinkList($content);
        $this->assertCount(1, $result);
        $this->assertEquals(array_shift($result), 'http://www.google.com#anchor');
    }
	public function testExtractLinksExcludeSkype()
	{
		$content = '<a href="skype:shordeaux">google</a>';

		$result = $this->filter->getLinkList($content);

		$this->assertCount(0, $result);
	}
	public function testExtractLinksExcludeMailto()
	{
		$content = '<a href="mailto:sh@catalyz.fr">google</a>';

		$result = $this->filter->getLinkList($content);

		$this->assertCount(0, $result);
	}
	public function testExtractLinksExcludeJavascript()
    {
        $content = '<a href="javascript://void(0)">google</a>';

        $result = $this->filter->getLinkList($content);

        $this->assertCount(0, $result);
    }
	public function testExtractRelativeAssetLinks()
	{
		$content = '<a href="/uploads/assets/foo.pdf">google</a>';

		$result = $this->filter->getLinkList($content);
		$this->assertCount(1, $result);
		$this->assertEquals(array_shift($result), '/uploads/assets/foo.pdf', 'bla bla 1');

		$result = $this->filter->execute($content);

		$this->assertEquals($result,  sprintf('<a href="%s/campaign/link/key/#EMAIL#-0-1">google</a>', $this->root_url), 'bla bla 2	');

	}

	public function testExtractRelativeAssetLinksWithAnchors()
	{
		$content = '<a href="/uploads/assets/foo.pdf#page=2">google</a>';

		$result = $this->filter->getLinkList($content);
		$this->assertCount(1, $result);
		$this->assertEquals(array_shift($result), '/uploads/assets/foo.pdf#page=2');

		$result = $this->filter->execute($content);
		$this->assertEquals($result, sprintf('<a href="%s/campaign/link/key/#EMAIL#-0-1">google</a>', $this->root_url));

	}


}

?>