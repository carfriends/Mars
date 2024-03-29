<?php

define("ROOT", dirname(__FILE__));
define("ROOT_APP", ROOT . "/app");
define("ROOT_CONFIG", ROOT . "/config");
define("ROOT_SLIGHTPHP", ROOT . "/slightPHP/");
define("ROOT_PLUGINS", ROOT_SLIGHTPHP . "/plugins");
define("ROOT_LOGS", ROOT_APP . "/logs");
define("PHPEXCEL_CLASS", ROOT_APP . "/PHPExcel/Classes/PHPExcel.php");
define("DEBUG", 1);
require_once(ROOT_SLIGHTPHP . "/SlightPHP.php");

function __autoload($class) {
    if ($class{0} == "S") {
        $file = ROOT_PLUGINS . "/$class.class.php";
    } else {
        $file = SlightPHP::$appDir . "/" . str_replace("_", "/", $class) . ".class.php";
    }
    if (file_exists($file))
        return require_once($file);
}

spl_autoload_register('__autoload');
