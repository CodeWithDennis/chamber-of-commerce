<?php

namespace CodeWithDennis\ChamberOfCommerce\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodeWithDennis\ChamberOfCommerce\ChamberOfCommerce
 */
class ChamberOfCommerce extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CodeWithDennis\ChamberOfCommerce\ChamberOfCommerce::class;
    }
}
