<?php

namespace Application\Configs;

class Settings
{

	/**
	 * Notre class devient un singleton grace à l'utilisation du Trait Singleton
	 */
	use \Library\Traits\Patterns\Singleton;


	private static $baseUrl = null;


	public static function setBaseUrl($url){
		self::$baseUrl = $url;
	}


	private function __construct(){
			
	}

	public static function readSettings(){

		if(is_null(self::$baseUrl)){
			throw new \Exception("baseUrl in" . __CLASS__ . " is Null");
		}

		/**
		 * WEB_ROOT  : 	/recette/Public/
		 * LINK_ROOT : http://localhost/phpmvc/
		 * APP_ROOT	 : C:/wamp/www/phpmvc/Application
		 * LIB_ROOT	 : C:/wamp/www/phpmvc/Library
		 */
		
		define('WEB_ROOT', 	str_replace('index.php', '', $_SERVER["SCRIPT_NAME"]));
		define('LINK_ROOT', str_replace('Public/index.php', '', self::$baseUrl . $_SERVER["SCRIPT_NAME"]));
		define('APP_ROOT', 	str_replace('Public/index.php', 'Application/', $_SERVER["SCRIPT_FILENAME"]));
		define('LIB_ROOT', 	str_replace('Public/index.php', 'Library/', $_SERVER["SCRIPT_FILENAME"]));
		define('SALT_PASSWORD', 'X_ ##8[+VN7hWcmeOhHzbhaP$_I|C{-7=8Oy$W^VH(?}bRGndcM{%2r]}d?NH]6N');
		define('WEBSERVICE_ROOT', str_replace('/fourneaux/Public/index.php', '/Webservice/Public', self::$baseUrl . $_SERVER["SCRIPT_NAME"]));
	}
}