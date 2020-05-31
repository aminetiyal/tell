<?php

namespace Aminetiyal\Tell;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Aminetiyal\Tell\Skeleton\SkeletonClass
 */
class TellFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tell';
    }
}
