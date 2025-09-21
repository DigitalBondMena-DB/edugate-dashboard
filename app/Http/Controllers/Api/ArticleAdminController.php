<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreUpdateRequest;
use App\Http\Resources\ArticleListResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
class ArticleAdminController extends Controller
{

    public function index(Request $req)
    {
        $q = Article::select('id','title','slug_ar','slug_en', 'image', 'is_published','created_at','updated_at')
            ->when($req->search, function ($qq,$s) {
                $qq->where(function($w) use ($s) {
                    $w->where('title->ar','like',"%$s%")
                      ->orWhere('title->en','like',"%$s%");
                });
            })
            ->orderBy('position')->orderByDesc('created_at');

        $req->validate(['per_page' => 'nullable|integer']);
        $perPage = $req->query('per_page', 20);
        $data = $q->paginate($perPage);
        foreach ($data as $d) {
            $d->image = asset($d->image);
        }
        return response()->json($data);
    }

    public function show(Article $article){
        $article->image = asset($article->image);
        return response()->json($article);
    }

    public function store(ArticleStoreUpdateRequest $req)
    {
        $data = $req->validated();
        $data['slug_ar'] = $this->arabic_slug($data['title']['ar']);
        $data['slug_en'] = Str::slug($data['title']['en']);
        if(Article::where('slug_ar', $data['slug_ar'])->exists() || Article::where('slug_en', $data['slug_en'])->exists()) {
            return response()->json(['success'=>false, 'message'=>'Slug already exists'], 400);
        }
        if ($req->hasFile('image')) {
            // $data['image'] = 'storage/'.$req->file('image')->store('uploads/articles','public');
            $file = $req->file('image');
            $fileName = time() . Str::random(10) . '.webp';
            $imagePath = storage_path('app/public/uploads/articles/' . $fileName);
            
            $image = Image::read($file->getRealPath())
                ->toWebp(80)
                ->save($imagePath);
            
            $data['image'] = 'storage/uploads/articles/' . $fileName;
        }
        if (isset($data['script_1'])) $data['meta_script_1'] = $data['script_1'];
        if (isset($data['script_2'])) $data['meta_script_2'] = $data['script_2'];
        unset($data['script_1'],$data['script_2']);

        $article = Article::create($data);

        return response()->json(['success'=>true, 'data'=>$article], 201);
    }

    public function update(ArticleStoreUpdateRequest $req, Article $article)
    {
        $data = $req->validated();
        // if($article->title['ar'] != $data['title']['ar']) {
        //     $data['slug_ar'] = $this->arabic_slug($data['title']['ar']);
        //     if(Article::where('slug_ar', $data['slug_ar'])->exists()) {
        //         return response()->json(['success'=>false, 'message'=>'arabic Slug already exists'], 400);
        //     }
        // }
        // if($article->title['en'] != $data['title']['en']) {
        //     $data['slug_en'] = Str::slug($data['title']['en']);
        //     if(Article::where('slug_en', $data['slug_en'])->exists()) {
        //         return response()->json(['success'=>false, 'message'=>'english Slug already exists'], 400);
        //     }
        // }

        if ($req->hasFile('image')) {
            if ($article->image) {
                $path = str_replace('storage/','',$article->image);
                Storage::disk('public')->delete($path);
            }
            $file = $req->file('image');
            $fileName = time() . Str::random(10) . '.webp';
            $imagePath = storage_path('app/public/uploads/articles/' . $fileName);
            
            $image = Image::read($file->getRealPath())
                ->toWebp(80)
                ->save($imagePath);
            
            $data['image'] = 'storage/uploads/articles/' . $fileName;
        }
        if (isset($data['script_1'])) $data['meta_script_1'] = $data['script_1'];
        if (isset($data['script_2'])) $data['meta_script_2'] = $data['script_2'];
        unset($data['script_1'],$data['script_2']);
        $article->update($data);

        return response()->json(['success'=>true, 'data'=>$article]);
    }

    public function toggle(Article $article)
    {
        $article->update(['is_published' => !$article->is_published,
                          'published_at' => $article->is_published ? now() : null]);
        return response()->json(['is_published'=>$article->is_published]);
    }


    private function arabic_slug($string) 
    {
    $string = preg_replace('/[ًٌٍَُِّْـ]/u', '', $string);
    $string = preg_replace('/[^\p{Arabic}\p{N}\s]/u', '', $string);
    $string = preg_replace('/\s+/', '-', trim($string));
    return $string;
    }
}
