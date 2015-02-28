<?php

namespace Irvyne\Saminator;

use Irvyne\Saminator\Model\ProjectInterface;
use Irvyne\Saminator\Model\ParameterBagInterface;

/**
 * Class Project
 *
 * @package Irvyne\Saminator
 */
class Project implements ProjectInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $theme;

    /**
     * @var string
     */
    protected $dir;

    /**
     * @var string
     */
    protected $vcs;

    /**
     * @var string
     */
    protected $repository;

    /**
     * @var ParameterBagInterface
     */
    protected $branches;

    /**
     * @var ParameterBagInterface
     */
    protected $tags;

    const VCS_GIT = 'git';

    /**
     * @param $name
     *
     * @return Project
     */
    public static function create($name)
    {
        return new self($name);
    }

    /**
     * @param string $name
     * @param null   $title
     *
     * @return Project
     */
    public function __construct($name, $title = null)
    {
        $this->name  = $name;
        $this->title = null === $title ? $name : $title;
        $this->theme = 'default';
        $this->vcs   = self::VCS_GIT;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $theme
     *
     * @return Project
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param string $dir
     *
     * @return Project
     */
    public function setDir($dir)
    {
        $this->dir = $dir;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param string $vcs
     *
     * @return Project
     */
    public function setVcs($vcs)
    {
        $this->vcs = $vcs;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVcs()
    {
        return $this->vcs;
    }

    /**
     * @param string $repository
     *
     * @return Project
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param ParameterBagInterface $branchBag
     *
     * @return Project
     */
    public function setBranches(ParameterBagInterface $branchBag)
    {
        $this->branches = $branchBag;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBranches()
    {
        return $this->branches;
    }

    /**
     * @param ParameterBagInterface $tags
     *
     * @return Project
     */
    public function setTags(ParameterBagInterface $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
