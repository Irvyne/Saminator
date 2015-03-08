<?php

namespace Irvyne\Saminator\Model;

/**
 * Class Kernel.
 *
 * @package Irvyne\Saminator\Model
 */
abstract class Kernel implements KernelInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $rootDir;

    /**
     * @var bool
     */
    protected $debug;

    const DEFAULT_BUILD_DIR = 'build';
    const DEFAULT_CACHE_DIR = 'var/cache';
    const DEFAULT_LOG_DIR   = 'var/logs';

    /**
     * Constructor.
     *
     * @param null|string $name
     * @param null|string $rootDir
     * @param bool        $debug
     */
    public function __construct($name = null, $rootDir = null, $debug = false)
    {
        $this->name    = null;
        $this->rootDir = null;
        $this->debug   = (bool) $debug;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        if (null === $this->name) {
            $this->name = preg_replace('/[^a-zA-Z0-9_]+/', '', basename($this->getRootDir()));
        }

        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getRootDir()
    {
        if (null === $this->rootDir) {
            $reflexion = new \ReflectionObject($this);
            $this->rootDir = str_replace('\\', '/', dirname($reflexion->getFileName()));
        }

        return $this->rootDir;
    }

    public function getBuildDir()
    {
        return $this->getRootDir().'/../'.self::DEFAULT_BUILD_DIR;
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheDir()
    {
        return $this->getRootDir().'/../'.self::DEFAULT_CACHE_DIR;
    }

    /**
     * {@inheritdoc}
     */
    public function getLogDir()
    {
        return $this->getRootDir().'/../'.self::DEFAULT_LOG_DIR;
    }

    /**
     * {@inheritdoc}
     */
    public function isDebug()
    {
        return $this->debug;
    }
}
