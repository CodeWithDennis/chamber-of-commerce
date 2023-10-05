<?php

namespace CodeWithDennis\ChamberOfCommerce\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use CodeWithDennis\ChamberOfCommerce\ChamberOfCommerceServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'CodeWithDennis\\ChamberOfCommerce\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ChamberOfCommerceServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_chamber-of-commerce_table.php.stub';
        $migration->up();
        */
    }
}
