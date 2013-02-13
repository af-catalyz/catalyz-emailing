<?php use_helper('Text') ?>


<div class="tabbable">
	<?php
			if ($sf_user->hasCredential('admin')) {
			printf('<a href="%s" class="btn btn-primary pull-right"><i class="icon-plus icon-white"></i> %s</a>',
			url_for('contacts/add'), __('Ajouter des contacts'));
			}
	 ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#1" data-toggle="tab">Contacts</a></li>
		<?php printf('<li><a href="%s">%s</a></li>', url_for('@groups'), __('Groupes')) ?>
	</ul>



	<div class="tab-content">

	<?php include_partial('global/flashMessage') ?>


		<div class="tab-pane active" id="1">
			<div class="span3" style="margin-left: 0px">

				<?php include_partial('contacts/filter') ?>

				<p>Vous pouvez <a href="<?php echo url_for('@settings_contact_list') ?>">sélectionner les informations des contacts à afficher dans la liste</a> depuis vos préférences.</p>
			</div>

			<div id="contact_list_holder">
			<?php include_partial('contacts/contactList', array(
				'menu' => $menu,
				'pager' => $pager,
				'ContactsGroupListOverview' => $ContactsGroupListOverview,
				'limit' => $limit,
				'sort' => $sort,
				'column' => $column
				)) ?>
			</div>

	</div>
	</div>
</div>