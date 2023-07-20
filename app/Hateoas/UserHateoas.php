<?php

namespace App\Hateoas;

use GDebrauwer\Hateoas\Link;
use App\Models\User;
use GDebrauwer\Hateoas\Traits\CreatesLinks;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class UserHateoas
{
    use CreatesLinks;

    public function self(User $user)
    {
        if(Route::getCurrentRoute()->getName() == 'user.show'){
            return;
        }
        return $this->link('user.show', ['user' => $user]);
    }
    public function all(User $user){
        if(Route::getCurrentRoute()->getName() == 'user.show'){
            return $this->link('user.index');
        }

        return;
    }
    public function delete(User $user) : ?Link
    {
        if (Gate::allows('action-user', $user->id)) {
            return $this->link('user.destroy', ['user' => $user]);
        }

        return null;
    }
    public function put(User $user) : ?Link
    {
        if (Gate::allows('action-user', $user->id)) {
            return $this->link('user.update', ['user' => $user]);
        }

        return null;
    }
}
