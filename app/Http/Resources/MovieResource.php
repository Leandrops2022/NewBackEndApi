<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $actors = $this->actors->map(function ($actor) {
            return [
                'nome'              => $actor->nome,
                'poster'            => $actor->poster,
                'personagem'        => $actor->pivot->personagem,
                'ordem_importancia' => $actor->pivot->ordem_importancia,
                'slug'              => $actor->slug,
            ];
        })->sortBy('ordem_importancia')->toArray();

        $videos = [];

        if (!$this->hasVideos()) {
            $apiKey = env('TMDB_API_KEY');
            $tmdbResponse = Http::get("https://api.themoviedb.org/3/movie/$this->tmdb_id/videos?language=pt-BR&api_key=$apiKey");

            $videos = array_map(function ($video) {

                return "https://www.youtube.com/embed/" . $video['key'];
            }, $tmdbResponse->json()['results']);
        } else {
            $videos = $this->movieVideos->take(10)->map(fn($video) => $video->embeded);
        }

        $data =  [
            'tmdb_id'            => $this->tmdb_id,
            'titulo_portugues'   => $this->titulo_portugues,
            'resumo_portugues'   => $this->resumo_portugues,
            'duracao'            => $this->duracao,
            'ano_lancamento'     => $this->ano_lancamento,
            'genero_1'           => $this->genero1->nome ?? ' - ',
            'genero_2'           => $this->genero2->nome ?? ' - ',
            'genero_3'           => $this->genero3->nome ?? ' - ',
            'poster'             => $this->poster,
            'nota'               => $this->nota,
            'tagline'            => $this->tagline,
            'poster_mobile'      => $this->poster_mobile,
            'poster_fallback'    => $this->poster_fallback,
            'trailer'            => $this->trailer,
            'adulto'             => $this->adulto,
            'atores'             => $actors,
            'videos'             => $videos,
            'onde_assistir'      => $this->whereToWatch,
        ];

        return $data;
    }

    private function hasVideos(): bool
    {
        return $this->movieVideos->count() > 0;
    }
}
