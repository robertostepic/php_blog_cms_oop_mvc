<?php

namespace CMS\Config;

use CMS\Config\Pattern\Singleton;

require_once __DIR__ . '/Pattern/Base.trait.php';
require_once __DIR__ . '/Pattern/Singleton.trait.php';

class Loader
{
    use Singleton;

    public function init()
    {
        spl_autoload_register(array(__CLASS__, '_loadClasses'));
    }

    private function _loadClasses($sClassName)
    {
        $sClassName = str_replace(array(__NAMESPACE__, 'CMS', '\\'), '/', $sClassName);

        if (is_file(__DIR__ . '/' . $sClassName . '.php'))
        {
            require_once __DIR__ . '/' . $sClassName . '.php';
        }

        if (is_file(ROOT_PATH . $sClassName . '.php'))
        {
            require_once ROOT_PATH . $sClassName . '.php';
        }
    }
}
