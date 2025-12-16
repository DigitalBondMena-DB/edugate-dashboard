<?php

namespace App\Http\Controllers\BackEnd;

use App\Contact;
use App\EventCategery;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Destination;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\University;
use App\NewArticle;
use App\NewArticleSubCatrgory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        //get number of unread messages
        $unreadedMassages = Contact::where('seen', 0)->count();
        // get numbers of active Articles
        $activeArticles = NewArticle::where('status' , 1)->count();

        // get numbers of subCategories 
        $learningSubCategories = NewArticleSubCatrgory::where('active' , 'activated')
        ->where('new_article_catrgory_id' , 1)
        ->count();

        $eventCategories = EventCategery::where('active' , 'activated')->count();
        return view('dashboard.home.index', compact('unreadedMassages' , 'activeArticles' , 'learningSubCategories' , 'eventCategories'));
    }

    public function getFlexibleData(Request $request): JsonResponse
    {
        $filters = [
            'destination_id' => $request->integer('destination_id'),
            'university_id' => $request->integer('university_id'),
            'faculty_id' => $request->integer('faculty_id'),
        ];

        $destinations = Destination::query()
            ->when($filters['university_id'], function ($query) use ($filters) {
                $query->whereHas('universities', function ($subQuery) use ($filters) {
                    $subQuery->whereKey($filters['university_id']);
                });
            })
            ->when($filters['faculty_id'], function ($query) use ($filters) {
                $query->whereHas('universities.faculties', function ($subQuery) use ($filters) {
                    $subQuery->whereKey($filters['faculty_id']);
                });
            })
            ->orderBy('ar_name')
            ->get();

        $universities = University::query()
            ->when($filters['destination_id'], function ($query) use ($filters) {
                $query->where('destination_id', $filters['destination_id']);
            })
            ->when($filters['faculty_id'], function ($query) use ($filters) {
                $query->whereHas('faculties', function ($subQuery) use ($filters) {
                    $subQuery->whereKey($filters['faculty_id']);
                });
            })
            ->orderBy('ar_name')
            ->get();

        $faculties = Faculty::query()
            ->when($filters['destination_id'], function ($query) use ($filters) {
                $query->whereHas('universities', function ($subQuery) use ($filters) {
                    $subQuery->where('destination_id', $filters['destination_id']);
                });
            })
            ->when($filters['university_id'], function ($query) use ($filters) {
                $query->whereHas('universities', function ($subQuery) use ($filters) {
                    $subQuery->whereKey($filters['university_id']);
                });
            })
            ->orderBy('ar_name')
            ->get();

        $departments = collect();
        $specializations = collect();

        if ($filters['faculty_id']) {
            $departments = Department::query()
                ->where('faculty_id', $filters['faculty_id'])
                ->orderBy('ar_name')
                ->get();

            $departmentIds = $departments->pluck('id');

            $specializations = Specialization::query()
                ->whereIn('department_id', $departmentIds)
                ->orderBy('ar_name')
                ->get();
        }

        return response()->json([
            'destinations' => $this->formatCollection($destinations),
            'universities' => $this->formatCollection($universities, function ($model) {
                return [
                    'destination_id' => (int) $model->destination_id,
                ];
            }),
            'faculties' => $this->formatCollection($faculties),
            'departments' => $filters['faculty_id']
                ? $this->formatCollection($departments, function ($model) {
                    return [
                        'faculty_id' => (int) $model->faculty_id,
                    ];
                })
                : [],
            'specializations' => $filters['faculty_id']
                ? $this->formatCollection($specializations, function ($model) {
                    return [
                        'department_id' => (int) $model->department_id,
                    ];
                })
                : [],
        ]);
    }

    protected function formatCollection(Collection $collection, callable $append = null): array
    {
        return $collection->map(function ($model) use ($append) {
            $item = [
                'id' => (int) $model->id,
                'ar_name' => $model->ar_name ?? $model->name ?? '',
                'en_name' => $model->en_name ?? $model->name ?? '',
                'slug' => $this->resolveSlug($model),
            ];

            if ($append) {
                $item = array_merge($item, (array) $append($model));
            }

            return $item;
        })->values()->toArray();
    }

    protected function resolveSlug($model): ?string
    {
        return $model->slug
            ?? $model->ar_slug
            ?? $model->en_slug
            ?? null;
    }
}
