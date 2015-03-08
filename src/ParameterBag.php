<?php

namespace Irvyne\Saminator;

use Irvyne\Saminator\Model\ParameterBagInterface;

/**
 * Class ParameterBag.
 *
 * @package Irvyne\Saminator
 */
class ParameterBag implements ParameterBagInterface, \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * {@inheritdoc}
     *
     * @return ParameterBag
     */
    public function __construct(array $parameters = [])
    {
        $this->add($parameters);

        return $this;
    }

    /**
     * @return ParameterBag
     */
    public function clear()
    {
        $this->parameters = [];

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function keys()
    {
        return array_keys($this->parameters);
    }

    /**
     * {@inheritdoc}
     *
     * @param bool $overwrite
     *
     * @return ParameterBag
     */
    public function add(array $parameters = [], $overwrite = true)
    {
        foreach ($parameters as $key => $value) {
            $this->set($key, $value, $overwrite);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @return ParameterBag
     */
    public function remove($name)
    {
        unset($this->parameters[mb_strtolower($name)]);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key, $default = null)
    {
        return true === $this->has($key)
            ? $this->parameters[mb_strtolower($key)]
            : $default
        ;
    }

    /**
     * {@inheritdoc}
     *
     * @return ParameterBag
     */
    public function set($key, $value, $overwrite = true)
    {
        if (true === $overwrite || (false === $overwrite && false === $this->has(mb_strtolower($key)))) {
            $this->parameters[mb_strtolower($key)] = $value;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return isset($this->parameters[mb_strtolower($key)]);
    }

    /**
     * @return \ArrayIterator An \ArrayIterator instance
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->parameters);
    }

    /**
     * @return int The number of parameters
     */
    public function count()
    {
        return count($this->parameters);
    }
}
