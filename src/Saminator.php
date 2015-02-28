<?php

namespace Irvyne\Saminator;

use Irvyne\Saminator\Exception\BadInstanceException;
use Irvyne\Saminator\Model\ParameterBagInterface;
use Sami\Sami;

/**
 * Class Saminator
 *
 * @package Irvyne\Saminator
 */
final class Saminator
{
    /**
     * @var ParameterBagInterface
     */
    protected $samiBag;

    /**
     * @param null|ParameterBagInterface $samiBag
     */
    public function __construct(ParameterBagInterface $samiBag = null)
    {
        $this->samiBag = $samiBag;
    }

    /**
     * @param null|ParameterBagInterface $samiBag
     *
     * @throws BadInstanceException
     */
    public function generate(ParameterBagInterface $samiBag = null)
    {
        $samiBag = null === $samiBag ? $this->samiBag : $samiBag;

        /** @var Sami $sami */
        foreach ($samiBag as $sami) {
            if (false === $sami instanceof Sami) {
                throw new BadInstanceException($sami, 'Sami\\Sami', null);
            }

            /** @var \Sami\Project $project */
            $project = $sami['project'];

            $project->update();
        }
    }
}
