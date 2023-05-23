<?php

namespace CMS\Config\Pattern;

trait Singleton
{
    use Base;

    protected static $oInstance = null;

    public static function getInstance()
    {
        return (null === static::$oInstance) ? static::$oInstance = new static : static::$oInstance;
    }
}