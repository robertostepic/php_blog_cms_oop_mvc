<?php

namespace CMS\Config;

class Util
{
    public $sNotify;

    public function getView($sViewName)
    {
        $this->getFolder($sViewName, "View");
    }

    public function getModel($sModelName)
    {
        $this->getFolder($sModelName, "Model");
    }

    private function getFolder($sFileName, $sFolderName)
    {
        $sFullPath = ROOT_PATH . $sFolderName . "/" . $sFileName . ".php";
        if (is_file($sFullPath))
        {
            require $sFullPath;
        }
        else
        {
            exit("The '" . $sFullPath . "' file does not exist.");
        }
    }

    public function __set($sKey, $mVal)
    {
        $this->$sKey = $mVal;
    }
}