<?php


/**
 * Skeleton subclass for performing query and update operations on the 'contact_group' table.
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
 * @package    lib.model
 */
class ContactGroupPeer extends BaseContactGroupPeer {
	public static function retrieveBySlug($slug)
	{
		$criteria = new Criteria(ContactGroupPeer::DATABASE_NAME);
		$criteria->add(ContactGroupPeer::SLUG, $slug);

		$v = ContactGroupPeer::doSelectOne($criteria);

		return $v;
	}

	static function getContactsDetails()
	{
		//region valid contacts
		$valid_contacts = array();
		$sql = 'SELECT ' . ContactContactGroupPeer::CONTACT_GROUP_ID . ' AS group_id,
			COUNT(' . ContactPeer::ID . ') AS total
			FROM ' . ContactContactGroupPeer::TABLE_NAME . '
			JOIN ' . ContactPeer::TABLE_NAME . '
			ON ' . ContactContactGroupPeer::CONTACT_ID . ' = ' . ContactPeer::ID . '
			WHERE ' . ContactPeer::STATUS . ' = ' . Contact::STATUS_NEW . '
			GROUP BY ' . ContactContactGroupPeer::CONTACT_GROUP_ID;



		$connection = Propel::getConnection();
		$statement = $connection->prepare($sql);
		$statement->execute();

		while($rs = $statement->fetch(PDO::FETCH_ASSOC)){
			$valid_contacts[$rs['group_id']] = $rs['total'];
		}
		//endregion

		//region all contact
		$all_contacts = array();
		$sql = 'SELECT ' . ContactContactGroupPeer::CONTACT_GROUP_ID . ' AS group_id,
			COUNT(' . ContactPeer::ID . ') AS total
			FROM ' . ContactContactGroupPeer::TABLE_NAME . '
			JOIN ' . ContactPeer::TABLE_NAME . '
			ON ' . ContactContactGroupPeer::CONTACT_ID . ' = ' . ContactPeer::ID . '
			GROUP BY ' . ContactContactGroupPeer::CONTACT_GROUP_ID;

		$connection = Propel::getConnection();
		$statement = $connection->prepare($sql);
		$statement->execute();

		while($rs = $statement->fetch(PDO::FETCH_ASSOC)){
			$all_contacts[$rs['group_id']] = $rs['total'];
		}
		//endregion

		$temp = array();
		foreach ($all_contacts as $group_id => $nb_element) {
			$valid = false;
			if (!empty($valid_contacts[$group_id])) {
				$valid = $valid_contacts[$group_id];
			}
			$temp[$group_id] = array('all' => $nb_element, 'valid' => $valid);
		}

		return $temp;
	}

	public static function getChartScript($datas, $divId){
		$datas = $datas->getRawValue();

		$temp = array();
		$labels = array_keys($datas);
		foreach ($labels as $label){
			$temp[]= date('"d/m/Y"', $label);
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

	public static function getGroups($onlyActive = true){
		$groupCriteria = new Criteria();
		$groupCriteria->addAscendingOrderByColumn(ContactGroupPeer::NAME);
		if ($onlyActive) {
			$groupCriteria->add(ContactGroupPeer::IS_ARCHIVED, FALSE);
		}
		$a_groups = ContactGroupPeer::doSelect($groupCriteria);

		$groups = array();
		$temp = array();
		foreach ($a_groups as /*(ContactGroup)*/$group){
			$temp[$group->getColor()][]=$group;
		}

		krsort($temp);
		$groups = array();
		foreach ($temp as /*(ContactGroup)*/$elements){
			foreach ($elements as /*(ContactGroup)*/$group){
				$groups[$group->getId()] = sprintf('%s %s', $group->getColoredName(), $group->getCommentPopup());
			}
		}

		return $groups;
	}

} // ContactGroupPeer
