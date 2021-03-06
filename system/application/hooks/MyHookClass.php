<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class MyHookClass {

	function multisite()
	{	
		$domain = $_SERVER['HTTP_HOST'];

		// if it is a local server
		if($domain == 'localhost'){
			$uri = substr($_SERVER['REQUEST_URI'], strlen(dirname($_SERVER['SCRIPT_NAME'].'/')));
			$segments = explode('/', $uri);

			if(isset($segments[1]) && !empty($segments[1])) {
				if(is_dir('sites/'.$segments[1]))
					define('SITE_SLUG', $segments[1]);
				else
					show_error('Site not found');
			}
			else
				define('SITE_SLUG', 'default');
		}

		// then it is a online server with real domain
		else {
			if(file_exists('sites/_domain/'.$domain.'.conf'))
				define('SITE_SLUG', trim(@file_get_contents('sites/_domain/'.$domain.'.conf')));
			else
				show_error('Site not configured yet');
		}
	}
}