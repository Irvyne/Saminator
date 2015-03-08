<?php

namespace Irvyne\Saminator\Model;

/**
 * Interface KernelInterface.
 *
 * @package Irvyne\Saminator\Model
 */
interface KernelInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return bool
     */
    public function isDebug();

    /**
     * @return string
     */
    public function getBuildDir();

    /**
     * @return string
     */
    public function getCacheDir();

    /**
     * @return string
     */
    public function getLogDir();
}
