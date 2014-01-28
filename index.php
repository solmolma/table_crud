<?php

define("DS", DIRECTORY_SEPARATOR);

define("PATH_ROOT", __DIR__.DS );

define("PATH_APP", __DIR__.DS."app".DS );

define("URL_ROOT", "http://".$_SERVER['SERVER_NAME'].str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

require PATH_APP.'core/autoloader.php'; 
$autoloader = new \core\Autoloader();

$aplicacion = new \core\Aplicacion();