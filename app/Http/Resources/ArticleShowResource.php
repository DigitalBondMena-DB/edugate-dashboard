<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleShowResource extends JsonResource
{
    public function toArray($request)
    {
        $loc = app()->getLocale();

        $slug = $loc === 'en' ? $this->slug_en : $this->slug_ar;
        $url  = url("/articles/{$slug}");

        
        $share = [
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u='.urlencode($url),
            'x'        => 'https://twitter.com/intent/tweet?url='.urlencode($url).'&text='.urlencode($this->title[$loc] ?? ''),
            'linkedin' => 'https://www.linkedin.com/sharing/share-offsite/?url='.urlencode($url),
            'whatsapp' => 'https://api.whatsapp.com/send?text='.urlencode(($this->title[$loc] ?? '').' '.$url),
        ];

        return [
            'slug'      => $slug,
            'title'     => $this->title[$loc]   ?? $this->title['ar']   ?? '',
            'image_url' => $this->image ? asset($this->image) : null,
            'body' => $this->body[$loc]    ?? $this->body['ar']    ?? '',
            'published_at' => optional($this->published_at)->toDateString(),
            'share'     => $share,
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
