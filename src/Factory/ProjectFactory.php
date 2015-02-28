<?php

namespace Irvyne\Saminator\Factory;

use Irvyne\Saminator\Model\ParameterBagInterface;
use Irvyne\Saminator\Project;

/**
 * Class ProjectFactory
 *
 * @package Irvyne\Saminator\Factory
 */
class ProjectFactory
{
    /**
     * @param string                $name
     * @param string                $title
     * @param string                $theme
     * @param string                $dir
     * @param string                $vcs
     * @param string                $repository
     * @param ParameterBagInterface $tagBag
     * @param ParameterBagInterface $branchBag
     *
     * @return Project
     */
    public static function create(
        $name,
        $title,
        $theme,
        $dir,
        $vcs,
        $repository,
        ParameterBagInterface $tagBag,
        ParameterBagInterface $branchBag
    ) {
        return Project::create($name)
            ->setTitle($title)
            ->setTheme($theme)
            ->setDir($dir)
            ->setVcs($vcs)
            ->setRepository($repository)
            ->setTags($tagBag)
            ->setBranches($branchBag)
        ;
    }
}
