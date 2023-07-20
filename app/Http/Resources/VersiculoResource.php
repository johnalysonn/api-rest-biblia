<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LivroResource;
use GDebrauwer\Hateoas\Traits\HasLinks;

class VersiculoResource extends JsonResource
{
    use HasLinks;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'capitulo' => $this->capitulo,
            'versiculo' => $this->versiculo,
            'texto'=> $this->texto,
            'livro' => $this->when($request->get('show')==='livro',
            LivroResource::make($this->livro)),
            '_links' => $this->links(),
        ];
    }
}
