<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerAdminPolicies();
        $this->registerProductCategoryPolicies();
        $this->registerProductPolicies();
        $this->registerUserPolicies();
    }

    public function registerAdminPolicies()
    {
        Gate::define('access-dashboard', function($user) {
            return $user->hasAccess(['access-dashboard']);
        });
    }

    public function registerProductCategoryPolicies()
    {
        Gate::define('create-product-category', function ($user) {
            return $user->hasAccess(['create-product-category']);
        });

        Gate::define('update-product-category', function ($user) {
            return $user->hasAccess(['update-product-category']);
        });

        Gate::define('delete-product-category', function ($user) {
            return $user->hasAccess(['delete-product-category']);
        });
    }

    public function registerProductPolicies()
    {
        Gate::define('create-product', function ($user) {
            return $user->hasAccess(['create-product']);
        });

        Gate::define('update-product', function ($user, Product $product) {
            return $user->hasAccess(['update-product']) or $user->id == $product->user_id;
        });

        Gate::define('delete-product', function ($user, Product $product) {
            return $user->hasAccess(['delete-product']) or $user->id == $product->user_id;
        });

        Gate::define('view-product', function ($user, Product $product) {
            return $user->hasAccess(['view-product']) or $user->id == $product->user_id;
        });
    }

    public function registerUserPolicies()
    {
        Gate::define('create-user', function ($user) {
            return $user->hasAccess(['create-user']);
        });

        Gate::define('update-user', function ($curr_user, User $user) {
            return $curr_user->hasAccess(['update-user']) and $user->id != $curr_user->user_id;
        });

        Gate::define('delete-user', function ($curr_user, User $user) {
            return $curr_user->hasAccess(['delete-user']) and $user->id != $curr_user->user_id;
        });

        Gate::define('view-user', function ($curr_user, User $user) {
            return $curr_user->hasAccess(['view-user']);
        });
    }
}
