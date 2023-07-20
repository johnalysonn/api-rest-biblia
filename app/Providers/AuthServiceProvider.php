<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Testamento;
use App\Models\Livro;
use App\Models\Versiculo;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Usuário
        Gate::define('action-user', function(User $user, $user_id){
            return $user->id===$user_id;
        });
    }
}
