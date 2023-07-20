<?php

namespace App\Hateoas;

use App\Models\Livro;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;
use Illuminate\Support\Facades\Route;


class LivroHateoas
{
    use CreatesLinks;

    public function self(Livro $livro)
    {
        if(Route::currentRouteName()==='livro.show'){
            return;
        }
        return $this->link('livro.show', ['livro' => $livro]);
    }

    public function all(Livro $livro)
    {
        if(!(Route::currentRouteName() === 'livro.show')){
            return;
        }

        return $this->link('livro.index');
    }

    public function update(Livro $livro)
    {
        return $this->link('livro.update', ['livro' => $livro]);
    }

    public function delete(Livro $livro)
    {
        return $this->link('livro.destroy', ['livro' => $livro]);

    }

}
