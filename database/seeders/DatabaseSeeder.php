<?php

namespace Database\Seeders;

use App\Models\Hero;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\About;
use App\Models\Sector;
use App\Models\Article;
use App\Models\Partner;
use App\Models\AboutTab;
use App\Models\MediaItem;
use App\Models\WhyReason;
use Random\Engine\Secure;
use App\Models\SectorType;
use App\Models\SocialLink;
use App\Models\WhySection;
use App\Models\ContactPhone;
use App\Models\SectorSupply;
use App\Models\ContactMessage;
use App\Models\ContactSetting;
use App\Models\PartnerCategory;
use Illuminate\Database\Seeder;
use Illuminate\Mail\Mailables\Content;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        Hero::create([
            'title' => [
                'ar' => 'ميدي تريد للتجارة | شريكك العالمي في الاستيراد والتصدير',
                'en' => 'MediTrade for Business | Your global partner in Import and Export',
            ],
            'description' => [
                'ar' => 'شركة "ميدي تريد" للتجارة متخصصة في مجال الاستيراد والتصدير، نعمل على تيسير حركة التجارةالدولية وربط الأسواق المحلية ..."',
                'en' => 'MediTrade for Business is a specialized company in the field of import and export. We work to simplify the international trade movement and connect local markets ...',
            ],
            'video_path' => 'storage/uploads/hero/exxFcN8ODeWAg8ddkLwI7PjTHqu4IW03Pe6g0tze.mp4',
            'is_active' => true,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        About::create([
            'home_title' => [
                'ar' => 'تأسست شركة ميدي تريد عام 1979، وبعد 10 سنوات أصبحت ....',
                'en' => 'MediTrade was established in 1979, and after 10 years, it became ...',
            ],
            'home_body' => [
                'ar' => 'أن شركة ميدي تريد للتجارة أخذت في عين الاعتبار التغيرات الحديثة....',
                'en' => 'MediTrade for Business took the latest changes into account...',
            ],
            'about_title' => [
                'ar' => 'تأسست شركة ميدي تريد عام 1979، وبعد 10 سنوات أصبحت ....',
                'en' => 'MediTrade was established in 1979, and after 10 years, it became ...',
            ],
            'about_body' => [
                'ar' => 'أن شركة ميدي تريد للتجارة أخذت في عين الاعتبار التغيرات الحديثة....',
                'en' => 'MediTrade for Business took the latest changes into account...',
            ],
            'image' => 'storage/uploads/about/Js1NFw1mU6qTm3sWCwt0LCbExiVVn2SQYtKjXYI0.png',
            'is_active' => true,
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        $aboutTitles = [
            ['ar' => 'مهمتنا', 'en' => 'Our Mission'],
            ['ar' => 'رؤيتنا', 'en' => 'Our Vision'],
            ['ar' => 'استثماراتنا الخارجية', 'en' => 'Our Foreign Investments'],
        ];
        for ($i = 1; $i <= 3; $i++) {
            AboutTab::Create([
                'about_id' => 1,
                'position' => $i,
                'title' => $aboutTitles[$i - 1],
                'body' => [
                    'ar' => 'أن شركة ميدي تريد للتجارة أخذت في عين الاعتبار التغيرات الحديثة....',
                    'en' => 'MediTrade for Business took the latest changes into account...',
                ],
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }

        Sector::create([
            'title' => [
                'ar' => 'التجارة',
                'en' => 'Trade',
            ],
            'content' => [
                'ar' => 'تقدم شركة ميدي تريد للتجارة وتقدم خدماتها على مستوى العالم، توفر الخدمات التالية:',
                'en' => 'MediTrade for Business provides the following services:',
            ],
            'home_image' => 'storage/uploads/sectors/1.png',
            'detail_image' => 'storage/uploads/sectors/1.png',
            'slug_ar' => 'التجارة',
            'slug_en' => 'trade',
            'position' => 1,
            'is_active' => true,
        ]);
        SectorSupply::create([
            'sector_id' => 1,
            'image' => 'storage/uploads/sectors/1.png',
            'body' => [
                'ar' => 'تقدم شركة ميدي تريد للتجارة وتقدم خدماتها على مستوى العالم، توفر الخدمات التالية:',
                'en' => 'MediTrade for Business provides the following services:',
            ],
            'gov_entities' => [
                ['ar' => 'شركة ميدي تريد للتجارة', 'en' => 'MediTrade for Business'],
                ['ar' => 'شركة ميدي تريد للتجارة', 'en' => 'MediTrade for Business'],
            ],
            'position' => 1,
            'is_active' => true,
        ]);
        SectorType::create([
            'sector_id' => 1,
            'title' => [
                'ar' => 'تقدم شركة ميدي تريد للتجارة وتقدم خدماتها على مستوى العالم، توفر الخدمات التالية:',
                'en' => 'MediTrade for Business provides the following services:',
            ],
            'body' => [
                'ar' => 'تقدم شركة ميدي تريد للتجارة وتقدم خدماتها على مستوى العالم، توفر الخدمات التالية:',
                'en' => 'MediTrade for Business provides the following services:',
            ],
            'images' => [
                'storage/uploads/sectors/1.png',
                'storage/uploads/sectors/1.png',
            ],
            'position' => 1,
            'is_active' => true,
        ]);

        WhySection::create([
            'body' => [
                'ar' => 'تقدم شركة ميدي تريد للتجارة وتقدم خدماتها على مستوى العالم، توفر الخدمات التالية:',
                'en' => 'MediTrade for Business provides the following services:',
            ],
            'is_active' => true,
        ]);

        WhyReason::create([
            'title' => [
                'ar' => 'تقدم شركة ميدي تريد للتجارة وتقدم خدماتها على مستوى العالم، توفر الخدمات التالية:',
                'en' => 'MediTrade for Business provides the following services:',
            ],
            'body' => [
                'ar' => 'تقدم شركة ميدي تريد للتجارة وتقدم خدماتها على مستوى العالم، توفر الخدمات التالية:',
                'en' => 'MediTrade for Business provides the following services:',
            ],
            'position' => 1,
            'is_active' => true,
        ]);
        PartnerCategory::create([
            'title' => [
                'ar' => 'العلاقات المصرفية',
                'en' => 'Financial Relations',
            ],
            'position' => 1,
            'is_active' => true,

        ]);

        Partner::create([
            'category_id' => 1,
            'name' => [
                'ar' => 'شركة ميدي تريد للتجارة',
                'en' => 'MediTrade for Business',
            ],
            'logo' => 'storage/uploads/partners/1.png',
            'position' => 1,
            'is_active' => true,
        ]);
        MediaItem::create([
           'type' => 'image',
           'image_path' => 'storage/uploads/media/images/1.png',
           'position' => 1,
           'is_active' => true,
        ]);

        MediaItem::create([
            'type' => 'video',
            'video_url' => 'https://www.youtube.com/watch?v=1',
            'thumb_path' => 'storage/uploads/media/thumbs/1.png',
            'position' => 1,
            'is_active' => true,
        ]);
        Article::create([
            'title' => [
                'ar' => 'تقدم شركة ميدي تريد للتجارة وتقدم خدماتها على مستوى العالم، توفر الخدمات التالية:',
                'en' => 'MediTrade for Business provides the following services:',
            ],
            'body' => [
                'ar' => 'تقدم شركة ميدي تريد للتجارة وتقدم خدماتها على مستوى العالم، توفر الخدمات التالية:',
                'en' => 'MediTrade for Business provides the following services:',
            ],
            'slug_ar' => 'تقدم-شركة-ميدي-تريد-للتجارة-وتقدم-خدماتها-على-مستوى-العالم-توفر-الخدمات-التالية',
            'slug_en' => 'MediTrade-for-Business-provides-the-following-services',
            'image' => 'storage/uploads/articles/1.png',
            'is_published' => true,
            'published_at' => now(),
            'position' => 1,
            ]);

            ContactMessage::create([
                'name' => 'test',
                'email' => 'test',
                'phone' => 'test',
                'message' => 'test',
                'is_read' => false
            ]);
            ContactSetting::create([
                'address' => [
                    'ar' => 'القاهرة - مصر',
                    'en' => 'Cairo - Egypt',
                ],
                'email' => 'medi@trade.com',
                'working_hours' => '16:00 - 09:00',
                'map_url' => 'https://www.google.com/maps/@35.861781,10.640582,3a,75y,288.6h,87.01t,0.72r/data=!3m6!1e1!3m4!1sgT28ssf0BB2LxZ63JNcL1w!2e0!7i13312!8i6656',
            ]);
            ContactPhone::create([
                'contact_id' => 1,
                'type' => 'phone',
                'number' => '01000000000',
            ]);
            ContactPhone::create([
                'contact_id' => 1,
                'type' => 'whatsapp',
                'number' => '01000000000',
            ]);
            SocialLink::create([
                'contact_id' => 1,
                'platform' => 'facebook',
                'url' => 'https://www.facebook.com/',
                'position' => 1,
            ]);
            SocialLink::create([
                'contact_id' => 1,
                'platform' => 'x',
                'url' => 'https://x.com/',
                'position' => 2,
            ]);
            SocialLink::create([
                'contact_id' => 1,
                'platform' => 'instagram',
                'url' => 'https://www.instagram.com/',
                'position' => 3,
            ]);

    }
}
