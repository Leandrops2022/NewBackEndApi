<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            "poster" => $this->poster,
            "nome" => $this->nome,
            "nascimento" => $this->formatDate($this->nascimento),
            "local_nascimento" => $this->local_nascimento,
            "morte" => $this->formatDate($this->morte),
            "biografia" => $this->biografia,
            "filmes_que_atuou" => $this->getAlsoWorkedOn()
        ];
    }

    private function formatDate(?string $date): ?string
    {
        if ($date) {
            $dateTime = \DateTime::createFromFormat('Y-m-d', $date);
            return $dateTime ? $dateTime->format('d/m/Y') : null;
        }
        return null;
    }

    private function getYear(?string $date)
    {
        return explode('-', $date)[0];
    }

    private function getAlsoWorkedOn()
    {
        return $this->movies
            ->filter(function ($movie) {
                return $movie->quantidade_de_votos > 3000;
            })
            ->map(function ($movie) {
                return [
                    'nota'         => $movie->nota,
                    'ano'          => $this->getYear($movie->data_lancamento),
                    'poster_filme' => $movie->poster,
                    'titulo_filme' => $movie->titulo_portugues,
                    'slug'         => $movie->slug,
                    'personagem'   => $movie->pivot->personagem,
                ];
            })
            ->values()
            ->toArray();
    }
}
