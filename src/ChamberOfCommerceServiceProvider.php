<?php

namespace CodeWithDennis\ChamberOfCommerce;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use CodeWithDennis\ChamberOfCommerce\Commands\ChamberOfCommerceCommand;

class ChamberOfCommerceServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('chamber-of-commerce')
            ->hasConfigFile();
    }
}
