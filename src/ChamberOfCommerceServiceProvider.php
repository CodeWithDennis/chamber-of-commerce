<?php

namespace CodeWithDennis\ChamberOfCommerce;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use CodeWithDennis\ChamberOfCommerce\Commands\ChamberOfCommerceCommand;

class ChamberOfCommerceServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('chamber-of-commerce')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_chamber-of-commerce_table')
            ->hasCommand(ChamberOfCommerceCommand::class);
    }
}
