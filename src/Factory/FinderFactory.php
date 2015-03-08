<?php

namespace Irvyne\Saminator\Factory;

use Irvyne\Saminator\Model\KernelInterface;
use Irvyne\Saminator\Model\ProjectInterface;
use Symfony\Component\Finder\Finder;

/**
 * Class FinderFactory.
 *
 * @package Irvyne\Saminator\Factory
 */
class FinderFactory
{
    /**
     * @param KernelInterface  $kernel
     * @param ProjectInterface $project
     *
     * @return Finder
     */
    public static function create(KernelInterface $kernel, ProjectInterface $project)
    {
        return Finder::create()
            ->files()
            ->name('*.php')
            ->exclude('Resources')
            ->exclude('Tests')
            ->in($kernel->getBuildDir().'/'.$project->getDir())
        ;
    }
}
