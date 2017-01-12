<?php

Class Log {

	private static $verbose = false;
	private static $browser = true;

	public static function error() {
		self::logit('ERROR', func_get_args());
	}

	public static function info() {
		self::logit('INFO', func_get_args());
	}

	private static function logit($type, $msgs) {
		ob_start();
		foreach ($msgs as $msg) {
			print_r($msg);
			print_r("\n");
		}
		switch ($type) {
			case 'INFO':
				$logPath = DEFAULT_LOG_LOCATION;
				break;
			case 'ERROR':
				$logPath = ERROR_LOG_LOCATION;
				//debug_print_backtrace();
				break;
		}
		$completeMsg = date('d-m-Y H:i:s', time()) . '[' . $type . ']: ' . ob_get_contents() . "\n" . "----------------------------------" . "\n";
		if(defined('APP')) {
			$completeMsg = APP.": ".$completeMsg;
		}
		ob_end_clean();

		$fp = fopen(DEFAULT_LOG_LOCATION, 'a');
		fprintf($fp, "%s", $completeMsg);
		fclose($fp);

		if ($logPath != DEFAULT_LOG_LOCATION) {
			$fp = fopen($logPath, 'a');
			fprintf($fp, "%s", $completeMsg);
			fclose($fp);
		}
		if (self::$verbose) {
			if (self::$browser) {
				if ($type != 'INFO') {
					echo nl2br($completeMsg);
				}
			} else {
				echo $completeMsg;
			}
		}
	}

}

?>
