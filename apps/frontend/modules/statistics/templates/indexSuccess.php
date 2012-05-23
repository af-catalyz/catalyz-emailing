<?php include_partial('statistics/header', array('campaign' => $campaign)); ?>


    <div class="tabbable">
        <a class="btn pull-right" data-toggle="modal" href="#dialog-campaign-test">Créer une relance</a>

		<ul class="nav nav-tabs">
	    <?php
	    	echo '<li class="active"><a href="#1" data-toggle="tab">Vue d\'ensemble </a></li>';
	    	printf('<li><a href="%s">Cibles</a></li>', url_for('@campaign_statistics_targets?slug='.$campaign->getSlug()));
	    	printf('<li><a href="%s">Ouvertures</a></li>', url_for('@campaign_statistics_views?slug='.$campaign->getSlug()));
	    	printf('<li><a href="%s">Clicks</a></li>', url_for('@campaign_statistics_show_links?slug='.$campaign->getSlug()));
				echo '<li><a href="#2" data-toggle="tab">D&eacute;sinscriptions</a></li><li><a href="#3" data-toggle="tab">Erreurs</a></li>';
				printf('<li><a href="%s">Configuration des destinataires</a></li>', url_for('@campaign_statistics_show_browser?slug='.$campaign->getSlug()));
				printf('<li><a href="%s">Message</a></li>', url_for('@campaign_statistics_message?slug='.$campaign->getSlug()));
			?>
		</ul>
    <div class="tab-content">

    <div class="tab-pane active" id="1">

	    <?php

			//region cibles
			printf('<div class="span2 well"><center><h1><a href="">%1$s</a></h1>contact%2$s cibl&eacute;%2$s<br /><br /></center></div>',$prepared_target_count,$prepared_target_count>1?'s':'');
			//endregion

			//region ouverture
			printf('<div class="span2 well alert-info"><center><h1><a href="">%s</a></h1>ouverture%s', $view_count, $view_count>1?'s':'');
			if ($sent_count) {
				printf('<br />(%0.1f%%)', $sent_count?(100 * $view_count / $sent_count):0);
			}else{
				echo '<br /><br />';
			}
			echo '</center></div>';
			//endregion

			//region clic
			printf('<div class="span2 well alert-success"><center><h1><a href="">%s</a></h1>clic%s', $click_count, $click_count>1?'s':'');
			if ($click_count) {
				printf('<br />(%0.1f%%)', $sent_count?(100 * $click_count / $sent_count):0);
			}else{
				echo '<br /><br />';
			}
			echo '</center></div>';
			//endregion

			//region désinscription
			printf('<div class="span1 well alert-danger"><center><h1><a href="">%s</a></h1>désinscription%s',$unsubscribe_count,$unsubscribe_count>1?'s':'');
			if ($unsubscribe_count) {
				printf('<br />(%0.1f%%)', $sent_count?(100 * $unsubscribe_count / $sent_count):0);
			}else{
				echo '<br /><br />';
			}
			echo '</center></div>';
			//endregion

			//region erreur
			printf('<div class="span1 well alert-danger"><center><h1><a href="">%s</a></h1>erreur%s',$failed_count,$failed_count>1?'s':'');
			if ($failed_count) {
				printf('<br />(%0.1f%%)', $sent_count?(100 * $failed_count / $sent_count):0);
			}else{
				echo '<br /><br />';
			}
			echo '</center></div>';
			//endregion

			echo '<div class="clear"></div>';

			//region taux d'ouverture
			printf('<div class="span2 well"><center><h2>%s%%</h2>taux d\'ouverture <u class="icon-question-sign"></u></center></div>', '15.1');
			//endregion

			//region taux de clicks
			printf('<div class="span2 well"><center><h2>%s%%</h2>taux de clics <u class="icon-question-sign"></u></center></div>','2');
			//endregion

			//region taux de réactivité
			printf('<div class="span2 well"><center><h2>%0.2f%%</h2>taux de réactivité <a rel="tooltip-campaign-comment" href="#" data-original-title="Nb clicks / Nb ouvertures."><i class="icon-question-sign"></i></a></center></div>', $reactivite);
			//endregion

			echo '<div class="clear"></div>';
			 ?>

    </div>
    <div class="tab-pane" id="2">
			<div id="graph" style="width: 940px; height: 400px;"></div>
    </div>
    <div class="tab-pane" id="3">contenu clics</div>
    <div class="tab-pane" id="4">contenu désinscriptions</div>
    <div class="tab-pane" id="5">contenu erreurs</div>
    <div class="tab-pane" id="6">contenu configuration destinataires</div>
    <div class="tab-pane" id="8">contenu cibles</div>
<div class="tab-pane" id="7">


<form class="form form-horizontal">

           <div class="control-group">
            <label class="control-label">De</label>
            <div class="controls">
              <span class="uneditable-input" style="width: 100%">Invitation petit déjuener de la com &lt;kreactiv@catalyz-emailing.com&gt;</span>
            </div>
            </div>

           <div class="control-group">
            <label class="control-label">Répondre à</label>
            <div class="controls">
              <span class="uneditable-input" style="width: 100%">emmanuelle.tandonnet@gmail.com</span>
            </div>
            </div>

<div class="control-group">
            <label class="control-label">Sujet</label>
            <div class="controls">
              <span class="uneditable-input" style="width: 100%">Invitation petit déjuener de la com</span>
            </div>
            </div>

           <div class="control-group">
            <label class="control-label">Corps</label>
            <div class="controls">
              <span class="uneditable-input" style="width: 100%">Invitation petit déjuener de la com</span>
            </div>
            </div>

</form>

    </div>    </div>
    </div>





<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'graph',
                type: 'column'
            },
            title: {
                text: 'Performance de votre campagne au cours du temps'
            },
/*
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
*/
            xAxis: {
                categories: ['h+6', 'h+12', 'h+18', 'h+24', 'h+30', 'h+36', 'h+42']
            },
            yAxis: {
                title: {
                    text: 'Contacts'
                }/*,
                labels: {
                    formatter: function() {
                        return this.value +'°'
                    }
                }*/
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Ouvertures',
                data: [ 100, 150, 80, 60, 20, 5, 0]

            }, {
                name: 'Clicks',
                data: [ 10, 20, 10, 5, 1, 0, 0]
            }]
        });
    });

});
		</script>

