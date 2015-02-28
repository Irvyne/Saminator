<?php

namespace Irvyne\Saminator\Model;

/**
 * Interface ProjectInterface
 *
 * @package Irvyne\Saminator\Model
 */
interface ProjectInterface
{
    /**
     * @param $name
     *
     * @return ProjectInterface
     */
    public static function create($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getTheme();

    /**
     * @return string
     */
    public function getDir();

    /**
     * @return string
     */
    public function getVcs();

    /**
     * @return string
     */
    public function getRepository();

    /**
     * @return ParameterBagInterface
     */
    public function getBranches();

    /**
     * @return ParameterBagInterface
     */
    public function getTags();
}
