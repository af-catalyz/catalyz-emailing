<?php $pager= /*(sfPropelPager)*/ $pager?>

<?php if ($pager->haveToPaginate()){
	if (!$sort) {
		$sort='A'; $column='LAST_NAME';
	}

	echo '<div class="pagination pagination-right"><ul>';
		printf('<li%s>%s</li>', $pager->getPage() != 1?'':' class="active"',link_to('&laquo;', $route_prefix.'?page='.$pager->getFirstPage().'&sort='.$sort.'&column='.$column));


		foreach ($pager->getLinks() as $page){
			printf('<li%s>%s</li>', $page == $pager->getPage()?' class="active"':'', link_to($page, $route_prefix.'?page='.$page.'&sort='.$sort.'&column='.$column));
		}

		printf('<li%s>%s</li>', $pager->getPage() != $pager->getLastPage()?'':' class="active"',link_to('&raquo;', $route_prefix.'?page='.$pager->getLastPage().'&sort='.$sort.'&column='.$column));
	echo '</ul></div>';
} ?>