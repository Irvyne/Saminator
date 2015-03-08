<?php

namespace Irvyne\Saminator\Factory;

use Irvyne\Saminator\Model\KernelInterface;
use Irvyne\Saminator\Model\ProjectInterface;
use Sami\Parser\Filter\FilterInterface;
use Sami\Sami;

/**
 * Class SamiFactory.
 *
 * @package Irvyne\Saminator\Factory
 */
class SamiFactory
{
    /**
     * @param KernelInterface      $kernel
     * @param ProjectInterface     $project
     * @param null|FilterInterface $filter
     *
     * @return Sami
     */
    public static function create(KernelInterface $kernel, ProjectInterface $project, FilterInterface $filter = null)
    {
        $sami = new Sami(FinderFactory::create($kernel, $project), [
            'theme'                => $project->getTheme(),
            'versions'             => GitVersionCollectionFactory::create($project),
            'title'                => $project->getTitle(),
            'build_dir'            => $kernel->getBuildDir().'/'.$project->getName().'/%version%',
            'cache_dir'            => $kernel->getCacheDir().'/'.$project->getName().'/%version%',
            'default_opened_level' => 2,
        ]);

        if (null !== $filter) {
            $sami['filter'] = function () use ($filter) {
                return $filter;
            };
        }

        return $sami;
    }
}
