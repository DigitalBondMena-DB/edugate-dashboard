<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackEnd\HomeController;


Route::middleware('admin')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('welcome');
    Route::redirect('/', '/dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('admin.show.login');
Route::post('/login', [LoginController::class, 'submitAdminLoginForm'])->name('login');

Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function () {

    Route::resource('/tags', 'SeoTagController');
    Route::patch('/tags/{tag}/toggle-status', 'SeoTagController@toggleStatus')->name('tags.toggleStatus');




    Route::resource('/serviceuser', 'ServiceuserController');
    Route::patch('/serviceusers/{serviceuser}/toggle-status', 'ServiceuserController@toggleStatus')->name('serviceuser.toggleStatus');

    Route::resource('/articleCategory', 'NewArticleCatrgoryController');
    Route::patch('/articleCategories/{articleCategory}/toggle-status', 'NewArticleCatrgoryController@toggleStatus')->name('articleCategory.toggleStatus');

    Route::resource('/articleSubCategory', 'NewArticleSubCatrgoryController');
    Route::patch('/articleSubCategories/{articleSubCategory}/toggle-status', 'NewArticleSubCatrgoryController@toggleStatus')->name('articleSubCategory.toggleStatus');


    Route::resource('/service', 'ServicesController');
    Route::patch('/services/{service}/toggle-status', 'ServicesController@toggleStatus')->name('service.toggleStatus');

    Route::resource('/event-categery', 'EventCategeryController');
    Route::patch('/event-categeries/{eventCategery}/toggle-status', 'EventCategeryController@toggleStatus')->name('event-categery.toggleStatus');


    Route::resource('/newArticle', 'NewArticleController')->except(['destroy']);
    Route::patch('/newArticles/{newArticle}/toggle-status', 'NewArticleController@toggleStatus')->name('newArticle.toggleStatus');


    Route::get('/about/edit', 'AboutController@edit')->name('about.edit');
    Route::put('/about', 'AboutController@update')->name('about.update');
    Route::resource('/about', 'AboutController')->except(['edit', 'update']);
    Route::resource('/clients', 'ClientsController');
    Route::patch('/clients/{client}/toggle-status', 'ClientsController@toggleStatus')->name('clients.toggleStatus');
    Route::resource('/feedback', 'ContactController');
    Route::resource('/study_abroad', 'StudyAbroadFormController');
    Route::resource('/contact-us', 'ContactUsController')->only(['index']);
    Route::get('/contact-us/edit', 'ContactUsController@edit')->name('contact-us.edit');
    Route::put('/contact-us', 'ContactUsController@update')->name('contact-us.update');
    Route::resource('/user-contact', 'ContactController');

    Route::resource('counters', 'CounterController');
    Route::resource('hero', 'HeroController');
    Route::get('privacy-policy', 'PrivacyPolicyController@index')->name('privacy-policy.index');
    Route::get('privacy-policy/edit', 'PrivacyPolicyController@edit')->name('privacy-policy.edit');
    Route::put('privacy-policy', 'PrivacyPolicyController@update')->name('privacy-policy.update');
    Route::get('why-us', 'WhyUsController@index')->name('why-us.index');
    Route::get('why-us/create', 'WhyUsController@create')->name('why-us.create');
    Route::post('why-us', 'WhyUsController@store')->name('why-us.store');
    Route::get('why-us/field/{field}/edit', 'WhyUsController@edit')->name('why-us.edit');
    Route::put('why-us/field/{field}', 'WhyUsController@update')->name('why-us.update');
    Route::patch('why-us/field/{field}/toggle', 'WhyUsController@toggleStatus')->name('why-us.toggleStatus');
    Route::get('why-us/image/edit', 'WhyUsController@editImage')->name('why-us.editImage');
    Route::post('why-us/image', 'WhyUsController@updateImage')->name('why-us.updateImage');
    Route::resource('page-banners', 'PageBannerController');
});

