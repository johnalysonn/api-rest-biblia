<?php

namespace App\Hateoas;

use App\Models\Versiculo;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;
use Illuminate\Support\Facades\Route;

class VersiculoHateoas
{
    use CreatesLinks;

    public function self(Versiculo $versiculo)
    {
        if(Route::currentRouteName() === 'versiculo.show'){
            return;
        }

        return $this->link('versiculo.show', ['versiculo' => $versiculo]);
    }
    public function all(Versiculo $versiculo){
        if(!(Route::currentRouteName() === 'versiculo.show')){
            return;
        }

        return $this->link('versiculo.index');
    }

    public function update(Versiculo $versiculo){
        return $this->link('versiculo.update', ['versiculo' => $versiculo]);

    }

    public function delete(Versiculo $versiculo){
        return $this->link('versiculo.destroy', ['versiculo' => $versiculo]);
    }
}
