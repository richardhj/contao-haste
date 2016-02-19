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

namespace Haste\Data;

class Html extends Plain implements HtmlDataInterface
{

    /**
     * @param string            $html
     * @param array|null|object $value
     * @param string            $label
     * @param array             $additional
     */
    public function __construct($html, $value, $label='', array $additional=array())
    {
        $values = array_merge(
            array(
                'value' => $value,
                'label' => $label,
                'html'  => $html
            ),
            $additional
        );

        parent::__construct($values, \ArrayObject::ARRAY_AS_PROPS);
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return (string) $this->html;
    }
}
