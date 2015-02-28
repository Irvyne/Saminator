<?php

namespace Irvyne\Saminator\Factory;

use Irvyne\Saminator\ParameterBag;

/**
 * Class TagBagFactory
 *
 * @package Irvyne\Saminator\Factory
 */
class ParameterBagFactory
{
    /**
     * @param null|array $array
     *
     * @return ParameterBag
     */
    public static function create(array $array = null)
    {
        return new ParameterBag((array) $array);
    }
}
