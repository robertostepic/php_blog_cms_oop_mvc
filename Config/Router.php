<?php

namespace CMS\Config;

class Router
{
    public static function run(array $arrParams)
    {
        // postavke odgovarajuceg i defaultnog kontrolera
        $sCtrlNamespace = 'CMS\Controller\\';
        $sDefCtrl = $sCtrlNamespace . 'Page';
        $sCtrlPath = ROOT_PATH . 'Controller/';
        $sCtrl = ucfirst($arrParams['ctrl']);

        if (is_file($sCtrlPath . $sCtrl . '.php'))
        {
            $sCtrl = $sCtrlNamespace . $sCtrl;
            $oCtrl = new $sCtrl;

            if ((new \ReflectionClass($oCtrl))->hasMethod($arrParams['act']) && (new \ReflectionMethod($oCtrl, $arrParams['act']))->isPublic())
            {
                call_user_func(array($oCtrl, $arrParams['act'])); // pozivanje konkretne metode u kontroleru
            }
            else
            {
                call_user_func(array($oCtrl, 'notFound')); // ako ne postoji metoda javi da nije pronadena
            }
        }
        else
        {
            call_user_func(array(new $sDefCtrl, 'notFound')); // ako kontroler nije definiran, koristi defaultni
        }
    }
}
