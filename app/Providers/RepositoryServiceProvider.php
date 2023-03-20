<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\DepartmentRepository;
use App\Repositories\DepartmentRepositoryEloquent;
use App\Repositories\InvoicingRepository;
use App\Repositories\InvoicingRepositoryEloquent;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\ProductStatusRepository;
use App\Repositories\ProductStatusRepositoryEloquent;
use App\Repositories\SaleItemRepository;
use App\Repositories\SaleItemRepositoryEloquent;
use App\Repositories\SaleRepository;
use App\Repositories\SaleRepositoryEloquent;
use App\Repositories\SpendingRepository;
use App\Repositories\SpendingRepositoryEloquent;
use App\Repositories\SpendingTypeRepository;
use App\Repositories\SpendingTypeRepositoryEloquent;
use App\Repositories\StockRepository;
use App\Repositories\StockRepositoryEloquent;
use App\Repositories\SubCategoryRepository;
use App\Repositories\SubCategoryRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(SpendingTypeRepository::class, SpendingTypeRepositoryEloquent::class);
        $this->app->bind(SpendingRepository::class, SpendingRepositoryEloquent::class);
        $this->app->bind(StockRepository::class, StockRepositoryEloquent::class);
        $this->app->bind(DepartmentRepository::class, DepartmentRepositoryEloquent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->bind(SubCategoryRepository::class, SubCategoryRepositoryEloquent::class);
        $this->app->bind(ProductStatusRepository::class, ProductStatusRepositoryEloquent::class);
        $this->app->bind(ProductRepository::class, ProductRepositoryEloquent::class);
        $this->app->bind(SaleRepository::class, SaleRepositoryEloquent::class);
        $this->app->bind(SaleItemRepository::class, SaleItemRepositoryEloquent::class);
        $this->app->bind(InvoicingRepository::class, InvoicingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserAbilitiesRepository::class, \App\Repositories\UserAbilitiesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ActionsRepository::class, \App\Repositories\ActionsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SubjectsRepository::class, \App\Repositories\SubjectsRepositoryEloquent::class);
        //:end-bindings:
    }
}
