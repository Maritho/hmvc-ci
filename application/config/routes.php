<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!in_array($_SERVER['REMOTE_ADDR'], $this->config->item('maintenance_ips')) && $this->config->item('maintenance_mode')) {
    $route['default_controller'] = "mode";
    $route['(:any)'] = "mode";
} else {
	$route['default_controller'] = 'home';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;
}
