<?php
class SessionUtils {

	public static function getCurrentCustomer() {
		return isset($_SESSION['customerId']) ? new Customer($_SESSION['customerId']) : null;
	}
}

?>
