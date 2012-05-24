<table border="0" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<td>
			<?php
				echo $choices[0]['input'];
				echo $choices[0]['label'];
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
				echo (string)$form['conf_content'];
				echo $form['conf_content']->renderError();
			?>
		</td>
	</tr>
	<tr valign="top">
		<td>
			<?php
				echo $choices[1]['input'];
				echo $choices[1]['label'];
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
				echo (string)$form['conf_url'];
				echo $form['conf_url']->renderError();
			?>
		</td>
	</tr>
</table>