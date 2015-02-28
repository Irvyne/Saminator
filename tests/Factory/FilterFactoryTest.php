<?php

namespace Tests\Irvyne\Saminator;

use Irvyne\Saminator\Factory\FilterFactory;

/**
 * Class FilterFactoryTest
 *
 * @package Tests\Irvyne\Saminator
 */
class FilterFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Irvyne\Saminator\Factory\FilterFactory::create
     */
    public function testCreate()
    {
        $this->assertInstanceOf('Sami\\Parser\\Filter\\FilterInterface', FilterFactory::create(FilterFactory::FILTER_DEFAULT));
        $this->assertInstanceOf('Sami\\Parser\\Filter\\FilterInterface', FilterFactory::create(FilterFactory::FILTER_TRUE));
        $this->assertInstanceOf('Sami\\Parser\\Filter\\FilterInterface', FilterFactory::create(FilterFactory::FILTER_SYMFONY));

        $this->assertInstanceOf('Sami\\Parser\\Filter\\DefaultFilter', FilterFactory::create(FilterFactory::FILTER_DEFAULT));
        $this->assertInstanceOf('Sami\\Parser\\Filter\\TrueFilter',    FilterFactory::create(FilterFactory::FILTER_TRUE));
        $this->assertInstanceOf('Sami\\Parser\\Filter\\SymfonyFilter', FilterFactory::create(FilterFactory::FILTER_SYMFONY));
    }

    /**
     * @covers \Irvyne\Saminator\Factory\FilterFactory::create
     *
     * @expectedException \Irvyne\Saminator\Exception\FilterException
     */
    public function testException()
    {
        FilterFactory::create(9);
    }
}
