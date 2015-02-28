<?php

namespace Irvyne\Saminator\Model;

/**
 * Interface ParameterBagInterface
 *
 * @package Irvyne\Saminator\Model
 */
interface ParameterBagInterface
{
    /**
     * @return ParameterBagInterface
     */
    public function clear();

    /**
     * @return array
     */
    public function all();

    /**
     * @return array
     */
    public function keys();

    /**
     * @param array $parameters
     *
     * @return ParameterBagInterface
     */
    public function add(array $parameters);

    /**
     * @param string $name
     *
     * @return ParameterBagInterface
     */
    public function remove($name);

    /**
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($name, $default = null);

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return ParameterBagInterface
     */
    public function set($name, $value);

    /**
     * @param string $name
     *
     * @return bool
     */
    public function has($name);
}
