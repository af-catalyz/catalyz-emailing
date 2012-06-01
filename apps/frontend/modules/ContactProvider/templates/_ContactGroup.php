<h2>Ajouter à la liste des destinataires, les contacts de certains groupes</h2>
<?php echo form_tag('@campaign-target-add-provider?slug='.$campaign->getSlug().'&provider='.$providerName, array('method' => 'POST')) ?>

			<?php if ($alreadySelectedGroups): ?>

					<?php printf('<p class="hint">Les contacts d%s groupe%s %s sont déjà cible de cette campagne.</p>', count($alreadySelectedGroups) > 1?'es':'u', count($alreadySelectedGroups) > 1?'s':'', implode(', ', $alreadySelectedGroups)) ?>
					<?php foreach($alreadySelectedGroups as $alreadySelectedGroup){
						printf('<input type="hidden" name="groups[]" value="%s" />', $alreadySelectedGroup->getId());
					} ?>


			<?php endif ?>

			<p>Sélectionnez les groupes que vous souhaitez ajouter à la liste des destinataires de la campagne:</p>
				<?php foreach ($groups as $k => $group) {
					printf('<label class="checkbox"><input class="group" type="checkbox" name="groups[]" id="groupCheckbox%d" value="%s"/>%s </label>', $group->getId(), $group->getId(), $group);
				}
				?>

			<br />
			<input class="btn btn-primary" type="submit" name="Add" value="Ajouter" />

</form>
