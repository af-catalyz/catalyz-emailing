

<table class="table table-striped table-condensed">
<tr>
	<th class="span3">Date</th>
	<th>Contact</th>
</tr>

<?php foreach ($pager->getResults() as/*(Contact)*/ $contact): ?>
	<?php echo '<tr>' ?>
		<?php printf('<td>%s</td>',$contact->getLatestClicks($url->getId())); ?>
		<?php printf('<td>%s</td>', html_entity_decode($contact->getFieldValue('FULL_NAME'))); ?>
	<?php echo '</tr>' ?>
<?php endforeach ?>
</table>

<?php if ($pager->haveToPaginate()): ?>

<?php
$route_prefix = "@campaign_statistics_show_clicks?id=".$url->getId();

echo '<div class="pagination pagination-right"><ul>';
printf('<li%s>%s</li>', $pager->getPage() != 1?'':' class="active"',link_to('&laquo;', $route_prefix.'&page='.$pager->getFirstPage()));


foreach ($pager->getLinks() as $page){
	printf('<li%s>%s</li>', $page == $pager->getPage()?' class="active"':'', link_to($page, $route_prefix.'&page='.$page));
}

printf('<li%s>%s</li>', $pager->getPage() != $pager->getLastPage()?'':' class="active"',link_to('&raquo;', $route_prefix.'&page='.$pager->getLastPage()));
echo '</ul></div>';

 ?>



<?php endif ?>

<p>	<?php echo link_to('Retour aux statistiques de la campagne','@campaign_statistics_show_links?slug='.$url->getCampaign()->getSlug(), array('class' => 'btn')) ?></p>