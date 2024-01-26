<?php

namespace App\Providers;

use App\Repositories\Read\Product\ProductReadRepository;
use App\Repositories\Read\Product\ProductReadRepositoryInterface;
use App\Repositories\Read\Product_properties\ProductPropertiesReadRepository;
use App\Repositories\Read\Product_properties\ProductPropertiesReadRepositoryInterface;
use App\Repositories\Write\Catalog\CatalogWriteRepository;
use App\Repositories\Write\Catalog\CatalogWriteRepositoryInterface;
use App\Repositories\Write\User\UserWriteRepository;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserWriteRepositoryInterface::class,
            UserWriteRepository::class
        );

        $this->app->bind(
            ProductPropertiesReadRepositoryInterface::class,
            ProductPropertiesReadRepository::class
        );

        $this->app->bind(
            ProductReadRepositoryInterface::class,
            ProductReadRepository::class
        );

    }
}
