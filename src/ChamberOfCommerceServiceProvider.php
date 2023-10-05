<?php

namespace CodeWithDennis\ChamberOfCommerce;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ChamberOfCommerceServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('chamber-of-commerce')
            ->hasConfigFile();
    }
}
