<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use GDebrauwer\Hateoas\Traits\HasLinks;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LivroResource;

class TestamentoResource extends JsonResource
{
    use HasLinks;

    public function toArray(Request $request): array
    {
        if(($this->livros)->count() == null){
            $livros = 'Nenhum livro cadastrado';
        }
        else{
            $livros = LivroResource::collection($this->livros);
        };
        return [
            'id' => $this->id,
            'name' => $this->nome,
            'livros' => $this->when($request->get('show')==='livros',
            $livros),
            '_links' => $this->links(),
        ];
    }
}
