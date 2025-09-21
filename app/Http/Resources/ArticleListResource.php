<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $loc = app()->getLocale();

        return [
            'slug'      => $loc === 'en' ? $this->slug_en : $this->slug_ar,
            'title'     => $this->title[$loc]   ?? $this->title['ar']   ?? '',
            'body'   => $this->body[$loc] ?? $this->body['ar'] ?? '',
            'image_url' => $this->image ? asset($this->image) : null,
            // SEO
            'meta' => [
                'title'       => $this->meta_title[$loc] ?? null,
                'description' => $this->meta_description[$loc] ?? null,
                'script_1'    => $this->meta_script_1[$loc] ?? null,
                'script_2'    => $this->meta_script_2[$loc] ?? null,
            ],
        ];
    }
}
