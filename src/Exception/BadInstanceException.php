<?php

namespace Irvyne\Saminator\Exception;

/**
 * Class BadInstanceException.
 *
 * @package Irvyne\Saminator\Exception
 */
class BadInstanceException extends \DomainException
{
    /**
     * @param \stdClass       $object
     * @param string          $wantedInstance
     * @param \Exception|null $previous
     */
    public function __construct(\stdClass $object, $wantedInstance, \Exception $previous = null)
    {
        parent::__construct(sprintf(
            'You should pass instance of "%s", instance of "%s" received instead!',
            $wantedInstance,
            get_class($object)
        ), 500, $previous);
    }
}
