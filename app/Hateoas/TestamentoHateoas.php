<?php

namespace App\Hateoas;

use App\Models\Testamento;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;
use Illuminate\Support\Facades\Route;

class TestamentoHateoas
{
    use CreatesLinks;

    public function self(Testamento $testamento)
    {
        if(Route::currentRouteName()==='testamento.show'){
            return;
        }
        return $this->link('testamento.show', ['testamento' => $testamento]);
    }
    public function all(Testamento $testamento){
        if(!(Route::currentRouteName()==='testamento.show')){
            return;
        }
        return $this->link('testamento.index');
    }
    public function put(Testamento $testamento){
        return $this->link('testamento.update', ['testamento' => $testamento]);
    }
    public function delete(Testamento $testamento){
        return $this->link('testamento.destroy', ['testamento' => $testamento]);
    }
}
