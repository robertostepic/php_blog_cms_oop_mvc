<?php

namespace CMS\Config;

class Router
{
    public static function run(array $arrParams)
    {
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
                call_user_func(array($oCtrl, $arrParams['act']));
            }
            else
            {
                call_user_func(array($oCtrl, 'notFound'));
            }
        }
        else
        {
            call_user_func(array(new $sDefCtrl, 'notFound'));
        }
    }
}
