<?php

namespace Skinnyshugo\LynxFramework\Helpers;

class StringHelper
{
    public static function toSlug($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }
}
