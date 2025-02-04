<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CategoreyInteface;
use App\Interfaces\OrderInterface;
use App\Interfaces\brandInterface;
use App\Interfaces\cartInterface;
use App\Interfaces\productInterface;
use App\Repository\categoreyRepository;
use App\Repository\productRepository;
use App\Repository\brandRepository;
use App\Repository\orderRepository;
use App\Repository\cartRepository;
use App\Interfaces\colorSizesInterface;
use App\Repository\colorsSizesRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoreyInteface::class, categoreyRepository::class);
        $this->app->bind(productInterface::class, productRepository::class);
        $this->app->bind(brandInterface::class, brandRepository::class);
        $this->app->bind(OrderInterface::class, orderRepository::class);
        $this->app->bind(cartInterface::class, cartRepository::class);
        $this->app->bind(colorSizesInterface::class, colorsSizesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
