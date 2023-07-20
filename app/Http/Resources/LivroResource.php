<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TestamentoResource;
use App\Http\Resources\VersiculoResource;
use GDebrauwer\Hateoas\Traits\HasLinks;

class LivroResource extends JsonResource
{
    use HasLinks;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'posicao' => $this->posicao,
            'abreviacao' => $this->abreviacao,
            'testamento' => $this->when($request->get('show_testamento')==='testamento',
            TestamentoResource::make($this->testamento)),
            'versiculos' => $this->when($request -> get('show_versiculos')==='versiculos',
            VersiculoResource::collection($this->versiculos)),
            '_links' => $this->links(),

        ];
    }
}
