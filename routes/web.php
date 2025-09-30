<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackEnd\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [HomeController::class, 'index'])->name('welcome');


    // Auth::routes(['verify' => true]);

    // Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.show.login');
    Route::get('/admin/login', function () {return view('auth.login');})->name('admin.show.login');
    Route::post('/admin/login', [LoginController::class, 'submitAdminLoginForm'])->name('login');

Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function() {

    Route::resource('/tags' , 'SeoTagController');



    Route::resource('/serviceAboutSection' , 'ServiceAboutSectionController');

    Route::resource('/serviceuser' , 'ServiceuserController');
    Route::patch('/serviceusers/{serviceuser}/toggle-status', 'ServiceuserController@toggleStatus')->name('serviceuser.toggleStatus');

    Route::resource('/articleCategory' , 'NewArticleCatrgoryController');
    Route::patch('/articleCategories/{articleCategory}/toggle-status', 'NewArticleCatrgoryController@toggleStatus')->name('articleCategory.toggleStatus');

    Route::resource('/articleSubCategory' , 'NewArticleSubCatrgoryController');
    Route::patch('/articleSubCategories/{articleSubCategory}/toggle-status', 'NewArticleSubCatrgoryController@toggleStatus')->name('articleSubCategory.toggleStatus');

    Route::resource('/admins', 'AdminsController');
    Route::resource('/academic-guides', 'AcademicGuidesController');
    Route::resource('/users', 'UsersController');
    Route::resource('/destinations', 'DestinationsController');
    Route::resource('/universities', 'UniversitiesController');
    Route::resource('/faculties', 'FacultiesController');
    Route::resource('/university_faculty_percentage', 'UniversityFacultyController');
    Route::resource('/majors', 'MajorsController');
    Route::resource('/departments', 'DepartmentsController');

    Route::resource('/activities', 'ActivitiesController');
    Route::resource('/service', 'ServicesController');
    Route::patch('/services/{service}/toggle-status', 'ServicesController@toggleStatus')->name('service.toggleStatus');

    Route::resource('/event-categery', 'EventCategeryController');
    Route::patch('/event-categeries/{eventCategery}/toggle-status', 'EventCategeryController@toggleStatus')->name('event-categery.toggleStatus');
    
    Route::resource('/event-detail', 'EventDetailController');

    Route::resource('/newArticle', 'NewArticleController')->except(['destroy']);
    Route::patch('/newArticles/{newArticle}/toggle-status', 'NewArticleController@toggleStatus')->name('newArticle.toggleStatus');
    
    Route::resource('/event-gallary', 'EventGallaryController');
    Route::get('/event-gallary/create/{id}', 'EventGallaryController@create')->name('event-gallary');

    Route::resource('/specializations', 'SpecializationsController');
    Route::resource('/admin-academic-users', 'AdminAcademicUsersController');
    Route::get('/about/edit', 'AboutController@edit')->name('about.edit');
    Route::put('/about', 'AboutController@update')->name('about.update');
    Route::resource('/about', 'AboutController')->except(['edit', 'update']);
    Route::resource('/gallery', 'GalleryController');
    Route::resource('/mains', 'MainController');
    Route::resource('/clients', 'ClientsController');
    Route::patch('/clients/{client}/toggle-status', 'ClientsController@toggleStatus')->name('clients.toggleStatus');
    Route::resource('/feedback', 'ContactController');
    Route::resource('/ad-form-countries', 'AdFormCountry');
    Route::resource('/ad-form-areas', 'AdFormArea');
    Route::get('/ad-form-areas/create/{id}', 'AdFormArea@create')->name('adFormAreaCreate');
    Route::resource('/valid-ips', 'ValidIpsController');
    Route::get('/valid-ips/{id}/{status}', 'ValidIpsController@updateStatus')->name('validIpsUpdate');
    Route::resource('/contact-us', 'ContactUsController')->only(['index']);
    Route::get('/contact-us/edit', 'ContactUsController@edit')->name('contact-us.edit');
    Route::put('/contact-us', 'ContactUsController@update')->name('contact-us.update');
    Route::resource('/user-contact', 'ContactController');

    Route::resource('counters', 'CounterController');
    Route::resource('hero', 'HeroController');

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