<?
spl_autoload_register(function($class){
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	return include(__DIR__ . DIRECTORY_SEPARATOR . $class . ".php");
});