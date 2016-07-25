<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
function siteurl(){
	$ci=& get_instance();
	echo $ci->config->item('siteurl');
}
function site_root(){
	$ci=& get_instance();
	$ci->config->item('site_root');
}
?>