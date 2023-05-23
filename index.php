<?php 

namespace CMS;

use CMS\Config as C;

define('PROT', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://');
define('ROOT_URL', PROT . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');
define('ROOT_PATH', __DIR__ . '/');

error_reporting(E_ERROR | E_PARSE);

try
{

    require ROOT_PATH . 'Config/Loader.php';
    C\Loader::getInstance()->init();

    $arrParams = ['ctrl' => (!empty($_GET['p']) ? $_GET['p'] : 'page'), 'act' => (!empty($_GET['a']) ? $_GET['a'] : 'index')];
    
    require ROOT_PATH . 'Config/Router.php';
    C\Router::run($arrParams);
}
catch (\Exception $oE)
{
    echo $oE->getMessage();
}