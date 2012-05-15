<?php if ($sf_user->hasFlash('notice_success')) {
	renderSuccessFlash($sf_user->getFlash('notice_success'));
} ?>