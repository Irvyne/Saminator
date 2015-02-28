<?php

namespace Irvyne\Saminator\Factory;

use Irvyne\Saminator\Exception\FilterException;
use Sami\Parser\Filter\DefaultFilter;
use Sami\Parser\Filter\FilterInterface;
use Sami\Parser\Filter\SymfonyFilter;
use Sami\Parser\Filter\TrueFilter;

/**
 * Class FilterFactory
 *
 * @package Irvyne\Saminator\Factory
 */
class FilterFactory
{
    const FILTER_DEFAULT = 0;
    const FILTER_SYMFONY  = 1;
    const FILTER_TRUE    = 2;

    /**
     * @param $filter
     *
     * @return FilterInterface
     *
     * @throws FilterException
     */
    public static function create($filter)
    {
        switch ($filter) {
            case self::FILTER_DEFAULT:
                return new DefaultFilter();
                break;
            case self::FILTER_SYMFONY:
                return new SymfonyFilter();
                break;
            case self::FILTER_TRUE:
                return new TrueFilter();
                break;
            default:
                throw new FilterException;
        }
    }
}