<?php

/**
 * Haste utilities for Contao Open Source CMS
 *
 * Copyright (C) 2012-2013 Codefog & terminal42 gmbh
 *
 * @package    Haste
 * @link       http://github.com/codefog/contao-haste/
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 */

namespace Haste\Util;

class CountryInfo
{

    protected static $data;
    protected static $char2;

    protected static $fields = array('ISO'=>0, 'ISO3'=>1, 'ISO-Numeric'=>2, 'fips'=>3, 'Country'=>4, 'Capital'=>5, 'Area(in sq km)'=>6, 'Population'=>7, 'Continent'=>8, 'tld'=>9, 'CurrencyCode'=>10, 'CurrencyName'=>11, 'Phone'=>12, 'Postal Code Format'=>13, 'Postal Code Regex'=>14, 'Languages'=>15, 'geonameid'=>16, 'neighbours'=>17, 'EquivalentFipsCode'=>18);


    public static function getPropertyForCountryCode($property, $country)
    {
        static::loadData();

        if (!isset(static::$fields[$property]) || !isset(static::$char2[$country])) {
            return null;
        }

        return (string) static::$data[static::$char2[$country]][static::$fields[$country]];
    }


    protected static function loadData()
    {
        if (static::$data === null) {

            include(TL_ROOT . '/system/modules/haste/data/countryinfo.php');
            static::$data = $data;
            static::$char2 = $char2;
        }
    }
}
