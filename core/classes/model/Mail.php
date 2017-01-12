<?php
use SimpleMVC\DBP;
use SimpleMVC\BaseEntity;
class Mail extends BaseEntity {

	protected $from;


	protected static function getTableName() {
		return "mails";
	}


}

?>
