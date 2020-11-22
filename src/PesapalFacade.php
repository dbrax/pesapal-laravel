<?php

namespace Epmnzava\Pesapal;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Epmnzava\Pesapal\Skeleton\SkeletonClass
 */
class PesapalFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pesapal';
    }
}
