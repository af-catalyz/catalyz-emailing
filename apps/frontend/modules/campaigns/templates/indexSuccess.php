<div class="tabbable">
  <?php printf('<div class="pull-right"><a href="%s" class="btn btn-primary">%s</a></div>', url_for('@campaigns_create'), __('Créer une campagne')) ?>

	<ul class="nav nav-tabs">
		<?php
		$tabs = array();
  	$tabs[1]= __('Campagnes en préparation');
  	$tabs[2]= __('Campagnes envoyées');
  	$tabs[3]= __('Campagnes archivées');

		foreach ($tabs as $tabId => $caption){
			printf('<li%s><a href="#pane_%s" data-toggle="tab">%s</a></li>', $tabId==$selectedTab?' class="active"':'', $tabId, $caption);
		}

		 ?>


	</ul>

	<div class="tab-content">
		<?php printf('<div class="tab-pane%s" id="pane_1">', $selectedTab==1?' active':'') ?>

				<div class="alert alert-success">
					<a class="close" data-dismiss="alert">×</a>
					<?php
					printf('<h4 class="alert-heading">%s</h4>', __('Campagne archivée'));
					 ?>
					La campagne <a href="">Copie de Invitation PtiDej de la com 13 avril </a> a été archivée. <a class="btn btn-mini">annuler</a>
				</div>

				<?php include_component('campaigns', 'preparedCampaigns') ?>

		</div>

		<?php printf('<div class="tab-pane%s" id="pane_2">', $selectedTab==2?' active':'') ?>

			<?php include_component('campaigns', 'sendCampaigns') ?>
		</div>

		<?php printf('<div class="tab-pane%s" id="pane_3">', $selectedTab==3?' active':'') ?>

			<?php include_component('campaigns', 'archivedCampaigns') ?>
    </div>
  </div>
</div>

