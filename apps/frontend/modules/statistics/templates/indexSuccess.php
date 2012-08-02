<?php include_partial('statistics/header', array('campaign' => $campaign)); ?>


    <div class="tabbable">

     <?php include_partial('statistics/menu', array('campaign' => $campaign)); ?>

    <div class="tab-content">

    <div class="tab-pane active" id="1">

	    <?php

			//region cibles
			printf('<div class="span2 well"><center><h1><a href="%3$s">%1$s</a></h1>contact%2$s cibl&eacute;%2$s<br /><br /></center></div>',
				$prepared_target_count,$prepared_target_count>1?'s':'', url_for('@campaign_statistics_targets?slug='.$campaign->getSlug()));
			//endregion

			//region ouverture
			echo '<div class="span2 well alert-info"><center><h1>';
			if ($view_count == 0) {
				echo '0';
			}else{
				printf('<a href="%s">%s</a>', url_for('@campaign_statistics_views?slug='.$campaign->getSlug()), $view_count);
			}

			printf('</h1>ouverture%s <a rel="tooltip-campaign-comment" href="#" data-original-title="Cette valeur est une valeur estimative, les logiciels de messagerie récents bloquent l\'affichage par défaut des images empéchant de savoir si l\'email a été consulté ou non."><i class="icon-question-sign"></i></a>',
				 $view_count>1?'s':'');
			if ($sent_count) {
				printf('<br />(%0.1f%%)', $sent_count?(100 * $view_count / $sent_count):0);
			}else{
				echo '<br /><br />';
			}
			echo '</center></div>';
			//endregion

			//region clic
			echo '<div class="span2 well alert-success"><center><h1>';
			if ($click_count == 0) {
				echo '0';
			}else{
				printf('<a href="%s">%s</a>',url_for('@campaign_statistics_show_links?slug='.$campaign->getSlug()),	$click_count);
			}

			printf('</h1>clic%s <a rel="tooltip-campaign-comment" href="#" data-original-title="Nombre de contacts ayant clické sur au moins un lien de la campagne."><i class="icon-question-sign"></i></a>',
				 $click_count>1?'s':'');
			if ($click_count) {
				printf('<br />(%0.1f%%)', $sent_count?(100 * $click_count / $sent_count):0);
			}else{
				echo '<br /><br />';
			}
			echo '</center></div>';
			//endregion

			//region désinscription
			echo '<div class="span2 well alert-danger"><center><h1>';
			if ($unsubscribe_count == 0) {
				echo '0';
			}else{
				printf('<a href="%s">%s</a>', url_for('@campaign_statistics_unsubscribe?slug='.$campaign->getSlug()), $unsubscribe_count);
			}
			printf('</h1>désinscription%s <a rel="tooltip-campaign-comment" href="#" data-original-title="Nombre de contacts ayant clické sur le lien de désinscription de cette campagne."><i class="icon-question-sign"></i></a>',
				$unsubscribe_count>1?'s':'');
			if ($unsubscribe_count) {
				printf('<br />(%0.1f%%)', $sent_count?(100 * $unsubscribe_count / $sent_count):0);
			}else{
				echo '<br /><br />';
			}
			echo '</center></div>';
			//endregion

			//region erreur
			echo '<div class="span1 well alert-danger"><center><h1>';
			if ($failed_count == 0) {
				echo '0';
			}else{
				printf('<a href="%s">%s</a>', url_for('@campaign_statistics_return_errors?slug='.$campaign->getSlug()),$failed_count);
			}
			printf('</h1>erreur%s',$failed_count>1?'s':'');
			if ($failed_count) {
				printf('<br />(%0.1f%%)', $sent_count?(100 * $failed_count / $sent_count):0);
			}else{
				echo '<br /><br />';
			}
			echo '</center></div>';
			//endregion

			echo '<div class="clear"></div>';

			//region taux d'ouverture
			printf('<div class="span2 well"><center><h2>%0.2f%%</h2>taux d\'ouverture  <a rel="tooltip-campaign-comment" href="#" data-original-title="Nb ouvertures / Nb total envois réussis."><i class="icon-question-sign"></i></a></center></div>', $taux_ouverture);
			//endregion

			//region taux de clics
			printf('<div class="span2 well"><center><h2>%0.2f%%</h2>taux de clics  <a rel="tooltip-campaign-comment" href="#" data-original-title="Nb clics / Nb total envois réussis."><i class="icon-question-sign"></i></a></center></div>',$taux_clicks);
			//endregion

			//region taux de réactivité
			printf('<div class="span2 well"><center><h2>%0.2f%%</h2>taux de réactivité <a rel="tooltip-campaign-comment" href="#" data-original-title="Nb clics / Nb ouvertures."><i class="icon-question-sign"></i></a></center></div>', $reactivite);
			//endregion

			echo '<div class="clear"></div>';

			printf('<div id="graph" style="height: 400px;"></div><script type="text/javascript">/* <![CDATA[ */ %s /* ]]> */</script>', html_entity_decode($campaign->getStatisticsOverviewScript()) )
			 ?>
    </div>
	</div>
</div>