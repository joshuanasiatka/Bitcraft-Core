<?php 
	class Cortex {
		public static function hasDownloadedPackages() {
			$check = (scandir($_SERVER['DOCUMENT_ROOT'].'/core/bits', 1));
			if(preg_match('/.php$/', $check[0]) || empty($check) || $check[0] == "" || $check[0] == '.' || $check[0] == '..') return false;
			return true;
		}
	}