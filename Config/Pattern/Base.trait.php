<?php

namespace CMS\Config\Pattern;

trait Base
{
    final private function __construct() {} // konstruktor osnovne klase koju naslijeduje singleton, postavljen na final private kako ga nitko ne bi mogao pozvati izvana
    final private function __clone() {}     // onemoguceno kloniranje objekata -> moze se instancirati samo jednom
}