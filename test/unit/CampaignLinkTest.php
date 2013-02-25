<?php
require_once(dirname(__FILE__) . '/../bootstrap/unit.php');

class CampaignLinkTest extends PHPUnit_Framework_TestCase {
    protected function setUp()
    {
		$this->campaign = new Campaign();
    	$this->campaign->setName('a campaign');
    	$this->campaign_link = new CampaignLink();
    	$this->campaign_link->setCampaign($this->campaign);
	}
	public function testTrackedUrlWithoutGoogleAnalyticsTrackingReturnsSame()
	{
		$this->campaign->setGoogleAnalyticsEnabled(false);
		$this->campaign_link->setUrl('http://www.google.com');
		$this->assertEquals($this->campaign_link->getTrackedUrl(), $this->campaign_link->getUrl());
	}
	public function testTrackedUrlWithHashIsKept()
	{
		$this->campaign->setGoogleAnalyticsEnabled(true);
		$this->campaign->setGoogleAnalyticsSource('source');
		$this->campaign->setGoogleAnalyticsContent('content');
		$this->campaign->setGoogleAnalyticsMedium('medium');
		$this->campaign->setGoogleAnalyticsCampaignContent('campaign');
		$this->campaign_link->setUrl('http://www.google.com#anchor');
		$result = $this->campaign_link->getTrackedUrl();
		$this->assertNotEquals($result, $this->campaign_link->getUrl());

		$parts = parse_url($result);
		$this->assertEquals($parts['fragment'], 'anchor');
	}
	public function testTrackedUrlWithDynamicValuesAreKept()
	{
		$this->campaign->setGoogleAnalyticsEnabled(true);
		$this->campaign->setGoogleAnalyticsSource('source');
		$this->campaign->setGoogleAnalyticsContent('content');
		$this->campaign->setGoogleAnalyticsMedium('medium');
		$this->campaign->setGoogleAnalyticsCampaignContent('campaign');

		$this->campaign_link->setUrl('http://www.google.com/foo/bar?key=#SPY_KEY#&email=#EMAIL##anchor');

		$result = $this->campaign_link->getTrackedUrl();
		$this->assertNotEquals($result, $this->campaign_link->getUrl());

		$parts = $this->campaign_link->parse_url($result);
		$this->assertEquals($parts['fragment'], 'anchor');
		$this->assertTrue(strpos($result, 'key=#SPY_KEY#') > 0);
		$this->assertTrue(strpos($result, 'email=#EMAIL#') > 0);

	}

	public function testCampaignLinkRouter()
	{
		$this->campaign->setGoogleAnalyticsEnabled(true);
		$this->campaign->setGoogleAnalyticsSource('source');
		$this->campaign->setGoogleAnalyticsContent('content');
		$this->campaign->setGoogleAnalyticsMedium('medium');
		$this->campaign->setGoogleAnalyticsCampaignContent('campaign');

		$this->campaign_link->setUrl('http://www.google.com/foo/bar?key=#SPY_KEY##anchor');

		$email = 'foo@bar.com';

		$cdm = new CampaignDeliveryManager($this->campaign);
		$result = $cdm->replaceMacrosForEmail($this->campaign_link->getTrackedUrl(), $email);
		$url_parts = parse_url($result);
		$this->assertEquals($url_parts['fragment'], 'anchor');

	}


	public function testGoogleAnalyticsTermsContainsHashDoesNotCorruptLinkAnchor()
	{
		$this->campaign->setGoogleAnalyticsEnabled(true);
		$this->campaign->setGoogleAnalyticsSource('source');
		$this->campaign->setGoogleAnalyticsContent('content');
		$this->campaign->setGoogleAnalyticsMedium('medium');
		$this->campaign->setGoogleAnalyticsCampaignContent('campaign');

		$this->campaign_link->setGoogleAnalyticsTerm('foo#bar');
		$this->campaign_link->setUrl('http://www.google.com/foo/bar?key=#SPY_KEY##anchor');

		$email = 'foo@bar.com';

		$cdm = new CampaignDeliveryManager($this->campaign);
		$result = $cdm->replaceMacrosForEmail($this->campaign_link->getTrackedUrl(), $email);
		$url_parts = parse_url($result);
		$this->assertEquals($url_parts['fragment'], 'anchor');

	}
}

?>