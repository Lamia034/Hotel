<?php

session_start();
define('BaseUrl' , 'http://localhost/hotelU/public/');
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('VIEWS', ROOT . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('MODELS', ROOT . 'app' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR);
// define('DATA', ROOT . 'app' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
define('CORE', ROOT . 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
define('CONTROLLERS', ROOT . 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR);
$modules = [ROOT, APP, CORE, CONTROLLERS, MODELS];
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register('spl_autoload');
new App();
    // session_start();
    // define("DS",DIRECTORY_SEPARATOR);
    // define("ROOT_PATH",dirname(__DIR__).DS);
    // define("APP",ROOT_PATH.'app'.DS);
    // define("CORE",APP.'core'.DS);
    // define("CONFIG",APP.'config'.DS);
    // define("CONTROLLERS",APP.'controllers'.DS);
    // define("MODELS",APP.'models'.DS);
    // define("VIEWS",APP.'views'.DS);

    // define("UPLOADS",ROOT_PATH.'public'.DS.'uploads'.DS);

    // // require_once(CONFIG.'config.php');


    // $modules = [ROOT_PATH,APP,CORE,CONTROLLERS,MODELS];
    // set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
    // spl_autoload_register('spl_autoload');

    // new App();
    
?>