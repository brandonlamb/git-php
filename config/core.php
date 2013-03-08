<?php
date_default_timezone_set('America/Los_Angeles');

$CONFIG['repo_directory'] =  '/web/library/';
$CONFIG['repo_suffix'] = "/.git/";
$CONFIG['git_date_format'] = "d.m.Y (H:i)";
$CONFIG['temp_directory'] = TMP;
$CONFIG['git_binary'] = '/usr/local/bin/git';
$CONFIG['git_css'] = true;
$CONFIG['repo_http_relpath'] = '';
$CONFIG['http_server_name'] = 'http://git-php.web.jellykit.com/';
$CONFIG['http_method_prefix'] = "{$CONFIG['http_server_name']}{$CONFIG['repo_http_relpath']}";;
$CONFIG['help_link'] = 'http://example.com';

/**
 * Debugging function, die after output
 */
function d()
{
	$string = '';
	foreach(func_get_args() as $value)
	{
		$string .= '<pre>';
		$string .= $value === NULL ? 'NULL' : (is_scalar($value) ? $value : print_r($value, TRUE));
		$string .= "</pre>\n";
	}
	echo $string;
	die;
}

/**
 * Debug function, dont die after output
 */
function dump()
{
	$string = '';
	foreach(func_get_args() as $value)
	{
		$string .= '<pre>';
		$string .= $value === NULL ? 'NULL' : (is_scalar($value) ? $value : print_r($value, TRUE));
		$string .= "</pre>\n";
	}
	echo $string;
}
