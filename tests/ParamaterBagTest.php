<?php

namespace Tests\Irvyne\Saminator;

use Irvyne\Saminator\ParameterBag;

/**
 * Class ParameterBagTest
 *
 * @package Tests\Irvyne\Saminator
 */
class ParamaterBagTest extends \PHPUnit_Framework_TestCase
{
    private static $parameters = [
        'foo'   => 'bar',
        'house' => 'cards',
    ];

    /**
     * @covers ParameterBag::clear
     */
    public function testClear()
    {
        $bag = new ParameterBag(self::$parameters);

        $bag->clear();
        $this->assertEquals([], $bag->all(), '->clear() removes all parameters');
    }

    /**
     * @covers ParameterBag::all
     */
    public function testAll()
    {
        $bag = new ParameterBag(self::$parameters);

        $this->assertEquals(self::$parameters, $bag->all(), '->all() gets all parameters');
    }

    /**
     * @covers ParameterBag::keys
     */
    public function testKeys()
    {
        $bag = new ParameterBag(self::$parameters);

        $this->assertEquals(['foo', 'house'], $bag->keys(), '->keys() array with parameters\' keys');
    }

    /**
     * @covers ParameterBag::add
     */
    public function testAdd()
    {
        $bag = new ParameterBag(self::$parameters);

        $bag->add(['bar' => 'foo']);
        $this->assertEquals(array_merge(self::$parameters, ['bar' => 'foo']), $bag->all(), '->add() add a parameter');
    }

    /**
     * @covers ParameterBag::remove
     */
    public function testRemove()
    {
        $bag = new ParameterBag(self::$parameters);

        $bag->remove('foo');
        $this->assertEquals(['house' => 'cards'], $bag->all(), '->remove() removes a parameter');

        $bag->remove('house');
        $this->assertEquals([], $bag->all(), '->remove() converts key to lowercase before removing');
    }

    /**
     * @covers ParameterBag::get
     * @covers ParameterBag::set
     */
    public function testGetSet()
    {
        $bag = new ParameterBag(self::$parameters);

        $bag->set('bar', 'foo');
        $this->assertEquals('foo', $bag->get('bar'), '->set() sets the value of a new parameter');

        $bag->set('house', 'cads', false);
        $this->assertEquals('cards', $bag->get('house'), '->set() don\'t overrides previously set parameter');

        $bag->set('house', 'cads');
        $this->assertEquals('cads', $bag->get('house'), '->set() overrides previously set parameter');

        $bag->set('Foo', 'baz1');
        $this->assertEquals('baz1', $bag->get('foo'), '->set() converts the key to lowercase');
        $this->assertEquals('baz1', $bag->get('FOO'), '->get() converts the key to lowercase');

        $this->assertEquals(1991, $bag->get('irvyne', 1991), '->get() return default value');
        $this->assertNotEquals('foo', $bag->get('baz1', 777), '->get() don\'t return default value');
    }

    /**
     * @covers ParameterBag::has
     */
    public function testHas()
    {
        $bag = new ParameterBag(self::$parameters);

        $this->assertTrue($bag->has('foo'), '->has() returns true if a parameter is defined');
        $this->assertTrue($bag->has('Foo'), '->has() converts the key to lowercase');
        $this->assertFalse($bag->has('bar'), '->has() returns false if a parameter is not defined');
    }

    /**
     * @covers ParameterBag::getIterator
     */
    public function testGetIterator()
    {
        $bag = new ParameterBag(self::$parameters);
        $i   = 0;

        foreach ($bag as $key => $val) {
            $i++;
            $this->assertEquals(self::$parameters[$key], $val);
        }

        $this->assertEquals(count(self::$parameters), $i);
    }

    /**
     * @covers ParameterBag::count
     */
    public function testCount()
    {
        $bag = new ParameterBag(self::$parameters);

        $this->assertEquals(count(self::$parameters), count($bag));
    }
}
