<?php 
	class Cortex {
		/**
		 * @return Boolean True if the bits directory has contents inside (Packages) False otherwise
		 */
		public static function hasDownloadedPackages() {
			$check = (scandir($_SERVER['DOCUMENT_ROOT'].'/core/bits', 1));
			return !(preg_match('/.php$/', $check[0]) || empty($check) || $check[0] == "" || $check[0] == '.' || $check[0] == '..');
		}
	}