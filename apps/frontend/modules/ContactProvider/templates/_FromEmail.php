<h2>Ajouter à la liste des destinataires, à partir d'adresse email</h2>
<?php echo form_tag('@campaign-target-add-provider?slug='.$campaign->getSlug().'&provider='.$providerName, array('method' => 'POST')) ?>
				<p>Saisissez dans le champ ci-dessous la liste des emails dont vous souhaitez ajouter les contacts comme destinataires de la campagne. <br />Vous pouvez séparer les emails par des virgules ou point-virgules.</p>
				<textarea class="span6 no_resize" name="emails"><?php echo $defaultValues; ?></textarea>
				<br />
			<input class="btn btn-primary" type="submit" name="Add" value="Ajouter" />

</form>

		<?php
/*
if (!empty($errors)) {
		if (count($errors) > 1) {
			printf('<tr><td>&nbsp;</td><td><span style="color:red;">Les emails suivants sont faux : %s. <br />Pour valider ce formulaire veuillez changer ces addresses.</span></td></tr>', implode(', ', $errors));
		}else {
			printf('<tr><td>&nbsp;</td><td><span style="color:red;">L\'email suivant est faux : %s. <br />Pour valider ce formulaire veuillez changer cette addresse.</span></td></tr>', array_shift($errors));
		}
   */