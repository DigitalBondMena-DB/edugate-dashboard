<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    HomeController,
    AuthController,
    HeroController,
    AboutController,
    AboutTabController,
    ContactMessageController,
    SectorController,
    SectorTypeController,
    SectorSupplyController,
    PartnerCategoryController,
    PartnerController,
    MediaController,
    ContactSettingController,
    ContactPhoneController,
    SocialLinkController,
    ArticlePublicController,
    ArticleAdminController,
    WhyPublicController,
    WhyAdminController,
    ContactImageController
};

Route::post('/register', [AuthController::class, 'register']);
Route::post('admin/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('admin/logout', [AuthController::class, 'logout']);
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/hero', [HeroController::class, 'publicShow']);
Route::get('/about', [AboutController::class, 'publicShow']);
Route::post('/contact', [ContactMessageController::class, 'store']);
Route::prefix('sectors')->group(function () {
    Route::get('/',        [SectorController::class, 'publicIndex']);
    Route::get('/{slug}',  [SectorController::class, 'publicShow']);
});
Route::get('/partners', [PartnerCategoryController::class, 'publicIndex']);
Route::prefix('media')->group(function () {
    Route::get('/images',        [MediaController::class, 'images']);
    Route::get('/videos',  [MediaController::class, 'videos']);
});
Route::get('/contact-info', [ContactSettingController::class, 'publicShow']);
Route::prefix('articles')->group(function () {
    Route::get('/',        [ArticlePublicController::class, 'index']);
    Route::get('/{slug}',  [ArticlePublicController::class, 'show']);
});
Route::get('/why', [WhyPublicController::class, 'show']);


Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    // hero routes
    Route::prefix('hero')->group(function () {
        Route::get('/', [HeroController::class, 'index']);
        Route::post('/', [HeroController::class, 'update']);
    });

    // about routes
    Route::prefix('about')->group(function () {
        // about
        Route::get('/', [AboutController::class, 'index']);
        Route::post('/', [AboutController::class, 'update']);
        // tabs
        Route::get('/{about}/tabs', [AboutTabController::class, 'index']);
        Route::put('/{tab}/tabs',  [AboutTabController::class, 'update']);
        Route::post('/{about}/init', [AboutTabController::class, 'initFixedTabs']);
    });

    // contact us routes
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactMessageController::class, 'index']);
        Route::get('/{contactMessage}', [ContactMessageController::class, 'show']);
        Route::patch('/{contactMessage}/read', [ContactMessageController::class, 'markAsRead']);
        Route::post('/image', [ContactImageController::class, 'storeOrUpdateImage']);
    });

    // sectors routes
    Route::prefix('sectors')->group(function () {
        Route::get('/', [SectorController::class, 'index']);
        Route::post('/', [SectorController::class, 'store']);
        Route::get('/{sector}', [SectorController::class, 'show']);
        Route::post('/{sector}', [SectorController::class, 'update']);
        Route::patch('/{sector}/toggle', [SectorController::class, 'toggle']);
        Route::get('/sector-main', [SectorController::class, 'sector_main_data']);
        Route::patch('/sector-main', [SectorController::class, 'sector_main_update']);
    });
    // sector types routes
    Route::get('/sectors/{sector}/types',   [SectorTypeController::class, 'index']);
    Route::post('/sectors/{sector}/types',  [SectorTypeController::class, 'store']);
    Route::get('/sector-types/{type}',     [SectorTypeController::class, 'show']);
    Route::post('/sector-types/{type}',     [SectorTypeController::class, 'update']);
    Route::patch('/sector-types/{type}/remove-image', [SectorTypeController::class, 'removeImage']);
    Route::patch('/sector-types/{type}/toggle',   [SectorTypeController::class, 'toggle']);

    // sector supplies routes
    Route::get('/sectors/{sector}/supplies',  [SectorSupplyController::class, 'index']);
    Route::post('/sectors/{sector}/supplies', [SectorSupplyController::class, 'store']);
    Route::post('/sector-supplies/{supply}',  [SectorSupplyController::class, 'update']);
    Route::get('/sector-supplies/{supply}',  [SectorSupplyController::class, 'show']);
    Route::patch('/sector-supplies/{supply}/toggle',   [SectorSupplyController::class, 'toggle']);

    // partners categories routes
    Route::prefix('partners/categories')->group(function () {
        Route::get('/',                 [PartnerCategoryController::class, 'index']);
        Route::post('/',                 [PartnerCategoryController::class, 'store']);
        Route::put('/{category}',      [PartnerCategoryController::class, 'update']);
        Route::patch('/{category}/toggle', [PartnerCategoryController::class, 'toggle']);
    });

    // partners routes
    Route::prefix('partners')->group(function () {
        Route::get('/{category}',              [PartnerController::class, 'index']);
        Route::get('/{partner}/show',               [PartnerController::class, 'show']);
        Route::post('/{category}',              [PartnerController::class, 'store']);
        Route::post('/{partner}/update',                [PartnerController::class, 'update']);
        Route::patch('/{partner}/toggle',         [PartnerController::class, 'toggle']);
    });


    // media routes
    Route::prefix('media')->group(function () {
        Route::get('/',               [MediaController::class, 'index']);
        Route::post('/',               [MediaController::class, 'store']);
        Route::post('/{item}',        [MediaController::class, 'update']);
        Route::get('/{item}/show',        [MediaController::class, 'show']);
        Route::patch('/{item}/toggle', [MediaController::class, 'toggle']);
    });


    // contacts routes
    Route::prefix('contact-info')->group(function () {

        // contact settings routes
        Route::get('/',        [ContactSettingController::class, 'show']);
        Route::put('/',        [ContactSettingController::class, 'update']);

        // phones routes 
        Route::get('/phones',                 [ContactPhoneController::class, 'index']);
        Route::post('/phones',                 [ContactPhoneController::class, 'store']);
        Route::put('/phones/{phone}',         [ContactPhoneController::class, 'update']);
        Route::patch('/phones/{phone}/toggle',  [ContactPhoneController::class, 'toggle']);

        // socials routes
        Route::get('/socials',                 [SocialLinkController::class, 'index']);
        Route::post('/socials',                 [SocialLinkController::class, 'store']);
        Route::put('/socials/{social}',        [SocialLinkController::class, 'update']);
        Route::patch('/socials/{social}/toggle', [SocialLinkController::class, 'toggle']);
    });

    // articles routes
    Route::get('/articles',                [ArticleAdminController::class, 'index']);
    Route::post('/articles',                [ArticleAdminController::class, 'store']);
    Route::get('/article/{article}',       [ArticleAdminController::class, 'show']);
    Route::post('/article/{article}',       [ArticleAdminController::class, 'update']);
    Route::patch('/article/{article}/toggle', [ArticleAdminController::class, 'toggle']);

    // why routes
    Route::prefix('why')->group(function () {
        Route::get('/section', [WhyAdminController::class, 'getSection']);
        Route::post('/section', [WhyAdminController::class, 'upsertSection']);

        Route::get('/reasons',            [WhyAdminController::class, 'indexReasons']);
        Route::post('/reasons',            [WhyAdminController::class, 'storeReason']);
        Route::put('/reasons/{reason}',   [WhyAdminController::class, 'updateReason']);
        Route::patch('/reasons/{reason}/toggle', [WhyAdminController::class, 'toggleReason']);
    });
});
