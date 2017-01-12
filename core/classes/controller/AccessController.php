<?php
use SimpleMVC\BaseController;
class AccessController extends BaseController {
	

	protected function setMaps() {
		$this->POST_Map['login'] = function() {
			echo Access::doLogin();
		};
	}

	protected function defaultAction() {
		$msg = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
		Access::displaySignUpPage($msg);
	}
}

?>
