<?php

namespace CMS\Config\Pattern;

trait Singleton
{
    use Base; // nasljeduje sve sto sadrzi Base (prazan konstruktor i onemoguceno kloniranje)

    protected static $oInstance = null; // objekt za pamcenje jedine instance, ne moze se mijenjati izvana

    public static function getInstance()
    {
        return (null === static::$oInstance) ? static::$oInstance = new static : static::$oInstance; // omogucuje smo jedno postaljanje, onemogucuje ponovno kreiranje
    }
}