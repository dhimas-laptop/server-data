<?php

namespace App\Providers;
use illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Carbon::setlocale('id');

       Gate::define('admin', function (User $user) {
        return $user->role === 'admin';
       });

       Gate::define('user', function (User $user) {
        return $user->role === 'user';
       });

       Gate::define('tu', function (User $user) {
        return $user->role === 'tu';
       });

       Gate::define('ev', function (User $user) {
        return $user->role === 'ev';
       });

       Gate::define('prog', function (User $user) {
        return $user->role === 'prog';
       });

       Gate::define('rhl', function (User $user) {
        return $user->role === 'rhl';
       });

       Gate::define('arsip', function (User $user) {
        return $user->role_opt === 'arsip';
       });

       Gate::define('opr_tu', function (User $user) {
        return $user->role_opt === 'opr_tu';
       });
    }
}
