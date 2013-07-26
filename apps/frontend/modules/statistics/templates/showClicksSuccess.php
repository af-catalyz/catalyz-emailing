

<table class="table table-striped table-condensed table_clicks">
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
printf('<li%s>%s</li>', $pager->getPage() != 1?'':' class="active"',link_to('&laquo;', $route_prefix.'&page='.$pager->getFirstPage(), array('class' => 'ajax_links')));


foreach ($pager->getLinks() as $page){
	printf('<li%s>%s</li>', $page == $pager->getPage()?' class="active"':'', link_to($page, $route_prefix.'&page='.$page, array('class' => 'ajax_links')));
}

printf('<li%s>%s</li>', $pager->getPage() != $pager->getLastPage()?'':' class="active"',link_to('&raquo;', $route_prefix.'&page='.$pager->getLastPage(), array('class' => 'ajax_links')));
echo '</ul></div>';

 ?>

<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$('.ajax_links').live('click',function(){
		var url = $(this).attr('href');

		$('#clickModal .modal-body').css('height' , $('#clickModal .modal-body').height()).empty();

		if(typeof(x)!='undefined'){ 	x.abort(); 	}
		x = $.ajax({
			type: "POST",
			url: url,
			success: function(html) {
				$('#clickModal .modal-body').append(html);
			}
		});

		return false;
	});

});

/* ]]> */
</script>

<?php endif ?>