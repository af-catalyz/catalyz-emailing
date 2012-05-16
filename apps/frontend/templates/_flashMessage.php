<?php
if ($sf_user->hasFlash('notice_success')) {
	renderSuccessFlash($sf_user->getFlash('notice_success'));
}
if ($sf_user->hasFlash('notice_error')) {
	renderErrorFlash($sf_user->getFlash('notice_error'));
}
 ?>