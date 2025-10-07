<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use App\Models\PageBanner;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
            'title' => 'home',
            'image' => 'home.jpg',
            'ar_alt' => 'الصفحة الرئيسية',
            'en_alt' => 'Home',
        ], [
            'title' => 'about',
            'image' => 'about.jpg',
            'ar_alt' => 'من نحن',
            'en_alt' => 'About',
        ],
        // services
        [
            'title' => 'services',
            'image' => 'services.jpg',
            'ar_alt' => 'خدماتنا',
            'en_alt' => 'Services',
        ],
        // Study Abroad
        [
            'title' => 'study abroad',
            'image' => 'study-abroad.jpg',
            'ar_alt' => 'التعلم في الخارج',
            'en_alt' => 'Study Abroad',
        ],
        // Study Abroad see more
        [
            'title' => 'study abroad',
            'image' => 'study-abroad-2.jpg',
            'ar_alt' => 'التعلم في الخارج',
            'en_alt' => 'Study Abroad',
        ],
        // learning Sectors
        [
            'title' => 'learning sectors',
            'image' => 'learning-sectors.jpg',
            'ar_alt' => 'القطاعات التعليمية',
            'en_alt' => 'Learning Sectors',
        ], 
        // articles
        [
            'title' => 'articles',
            'image' => 'articles.jpg',
            'ar_alt' => 'المقالات',
            'en_alt' => 'Articles',
        ], 
        // Gallery
        [
            'title' => 'gallery',
            'image' => 'gallery.jpg',
            'ar_alt' => 'المعرض',
            'en_alt' => 'Gallery',
        ]
        ];

        PageBanner::insert($data);
        HeroSection::create([
            'title_ar' => 'hero',
            'title_en' => 'hero',
        ]);
    }
}
