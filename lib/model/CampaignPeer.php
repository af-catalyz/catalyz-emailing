<?php

/**
 * Skeleton subclass for performing query and update operations on the 'campaign' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * jeu. 03 mai 2012 11:26:43 CEST
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package lib.model
 */
class CampaignPeer extends BaseCampaignPeer {
    public static function retrieveBySlug($slug)
    {
        $criteria = new Criteria(CampaignPeer::DATABASE_NAME);
        $criteria->add(CampaignPeer::SLUG, $slug);

        $v = CampaignPeer::doSelectOne($criteria);

        return $v;
    }

    public static function getOtherSentCampaigns($mainCampaignId)
    {
        $criteria = new Criteria();
        $criteria->add(self::ID, $mainCampaignId, Criteria::NOT_EQUAL);
        $criteria->add(self::STATUS, Campaign::STATUS_COMPLETED);

        $result = array();
        foreach(self::doSelect($criteria) as $campaign) {
            $result[$campaign->getId()] = $campaign->getName();
        }
        return $result;
    }

    public static function getStatisticsChartScript($datas, $divId)
    {
        $datas = $datas->getRawValue();

        $temp = array();
        $labels = array_keys($datas);
        foreach ($labels as $label) {
            $temp[] = date('"d/m/Y"', $label);
        }
        $labels = implode(',', $temp);

        $values = array_values($datas);
        $values = implode(',', $values);

        $return = sprintf('$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: \'%s\',
                type: \'line\',
                marginBottom: 180
            },

            title: {
                text: \'Evolution du nombre de contacts dans le groupe\',
                x: -20 //center
            },

            xAxis: {
                categories: [%s],
                labels: {
                	rotation: 80,
                	y : 50
                }

            },

            yAxis: {
                title: {
                    text: \'Nb contacts\'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: \'#B4BA31\'
	}]
},

tooltip: {
	formatter: function() {
		return this.x +\': \'+ this.y +\' contacts\';
	}
},

legend: {
	enabled: false,
	layout: \'vertical\',
	align: \'right\',
	verticalAlign: \'top\',
	x: -10,
	y: 100,
	borderWidth: 0
},

series: [{
	name: \'Cumul\',
	data: [%s]
}]

});

});


});', $divId, $labels, $values);

        return $return;
    }
} // CampaignPeer