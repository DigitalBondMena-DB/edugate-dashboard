<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('welcome');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/admission_request' , 'HomeController@index')->name('admission_request');

    Route::get('/ad-form/{adFormCountries}', 'HomeController@adForm')->name('adForm');

    Route::get('/contact-sucess' , 'HomeController@contactsucess')->name('contact-sucess');

    Route::get('/personal-info', 'HomeController@showPersonalInfo')->name('show-personal-info');
    Route::post('/personal-info', 'HomeController@submitPersonalInfo')->name('submit-personal-info');

    Route::get('/academic-info', 'HomeController@showAcademicInfo')->name('show-academic-info');
    Route::post('/academic-info', 'HomeController@submitAcademicInfo')->name('submit-academic-info');

    Route::get('/admission-info', 'HomeController@showAdmissionInfo')->name('show-admission-info');
    Route::post('/admission-info', 'HomeController@submitAdmissionInfo')->name('submit-admission-info')->middleware('verified');


    Route::get('/paper-info', 'HomeController@showPaperInfo')->name('show-movement-info');

    Route::post('/first-paper-info', 'HomeController@submitFirstPaperInfo')->name('submit-first-paper-info');
    Route::post('/second-paper-info', 'HomeController@submitSecondPaperInfo')->name('submit-second-paper-info');
    Route::post('/first-money-info', 'HomeController@submitFirstMoneyInfo')->name('submit-first-money-info');
    Route::post('/second-money-info', 'HomeController@submitSecondMoneyInfo')->name('submit-second-money-info');
    Route::post('/third-money-info', 'HomeController@submitThirdMoneyInfo')->name('submit-third-money-info');
    Route::post('/fourth-money-info', 'HomeController@submitFourthMoneyInfo')->name('submit-fourth-money-info');

    Route::post('/google-form-admission-info', 'HomeController@submitGoogleFormInfo')->name('submit-google-form-info');

    Auth::routes(['verify' => true]);

    Route::get('/admin/login', 'Auth/LoginController@showAdminLoginForm')->name('admin.show.login');
    Route::post('/admin/login', 'Auth/LoginController@submitAdminLoginForm')->name('admin.submit.login');

    Route::get('/academic-guide/login', 'Auth/LoginController@showAcademicGuideLoginForm')->name('academicguide.show.login');
    Route::post('/academic-guide/login', 'Auth/LoginController@submitAcademicGuideLoginForm')->name('academicguide.submit.login');

    Route::get('/filterUniversities', 'HomeController@filterUniversities')->name('filterUniversities');
    Route::get('/filterColleges', 'HomeController@filterColleges')->name('filterColleges');
    Route::get('/filterMajors', 'HomeController@filterMajors')->name('filterMajors');
    Route::get('/filterDepartments', 'HomeController@filterDepartments')->name('filterDepartments');

    Route::get('/admissionfilterUniversities', 'HomeController@filterUniversitiesAdmission')->name('filterUniversitiesAdmission');
    Route::get('/admissionfilterColleges', 'HomeController@filterCollegesAdmission')->name('filterCollegesAdmission');
    Route::get('/admissionfilterMajors', 'HomeController@filterMajorsAdmission')->name('filterMajorsAdmission');
    Route::get('/admissionfilterDepartments', 'HomeController@filterDepartmentsAdmission')->name('filterDepartmentsAdmission');

    Route::post('/search', 'HomeController@search')->name('search');

    Route::get('/articles', 'HomeController@articles')->name('articles');

    Route::get('/clients', 'HomeController@clients')->name('clients');
    Route::get('/about-us', 'HomeController@aboutUs')->name('about-us');
    Route::get('/contact-us', 'HomeController@contactUs')->name('contact-us');
    Route::post('/send-feedback', 'HomeController@sendInquiry')->name('send-feedback');
    Route::get('/faq', 'HomeController@faq')->name('faq');

    Route::get('/media', 'HomeController@gallery')->name('gallery');

    Route::get('{eventCategery}', 'HomeController@eventCategories')->name('eventCategories');

    Route::get('/{country}', 'HomeController@destination')->name('destination');
    if(app()->getLocale() == 'en') {
        Route::get('/{country}/{university}_university', 'HomeController@university')->name('university');
        Route::get('/{country}/{university}_university/{faculty}', 'HomeController@faculty')->name('faculty');
    } else {
        Route::get('/{country}/جامعة-{university}', 'HomeController@university')->name('university');
        Route::get('/{country}/جامعة-{university}/{faculty}', 'HomeController@faculty')->name('faculty');
    }
});

Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider')->name('facebook-login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider')->name('google-login');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');

Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.home');

    Route::resource('/tags' , 'SeoTagController');



    Route::resource('/serviceAboutSection' , 'ServiceAboutSectionController');

    Route::resource('/serviceuser' , 'ServiceuserController');

    Route::resource('/articleCategory' , 'NewArticleCatrgoryController');

    Route::resource('/articleSubCategory' , 'NewArticleSubCatrgoryController');

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
    Route::resource('/event-detail', 'EventDetailController');

    Route::resource('/newArticle', 'NewArticleController');
    Route::post('/newArticle-recover/{id}', 'NewArticleController@recover')->name('newArticle-recover');

    Route::resource('/event-gallary', 'EventGallaryController');
    Route::get('/event-gallary/create/{id}', 'EventGallaryController@create')->name('event-gallary');

    Route::resource('/specializations', 'SpecializationsController');
    Route::resource('/admin-academic-users', 'AdminAcademicUsersController');
    Route::patch('/sliders/{slider}/toggle-status', 'SlidersController@toggleStatus')->name('sliders.toggleStatus');
    Route::resource('/sliders', 'SlidersController');
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

    // Route::get('/datatable/ads/list', 'DataTablesController@adsListView')->name('adsListView');
    // Route::post('/datatable/ads/getListData', 'DataTablesController@adsListData')->name('getAdsListData');

    // Route::get('/datatable/social-media/list', 'DataTablesController@socialMediaListView')->name('socialMediaListView');
    // Route::post('/datatable/social-media/getListData', 'DataTablesController@socialMediaListData')->name('getSocialMediaListData');

    // Route::get('/datatable/list', 'DataTablesController@listView')->name('listView');
    // Route::post('/datatable/getListData', 'DataTablesController@listData')->name('getListData');

    // Route::get('/datatable/register', 'DataTablesController@registerView')->name('registerView');
    // Route::post('/datatable/getRegisterData', 'DataTablesController@registerData')->name('getRegisterData');

    // Route::get('/datatable/list/reports', 'DataTablesController@listReportsView')->name('listReportsView');
    // Route::post('/datatable/getListData/reports', 'DataTablesController@listReportsData')->name('getListReportsData');

    // Route::get('/datatable/register/reports', 'DataTablesController@registerReportsView')->name('registerReportsView');
    // Route::post('/datatable/getRegisterData/reports', 'DataTablesController@registerReportsData')->name('getRegisterReportsData');








    // Route::get('/datatable/list/bachelor', 'DataTablesController@listBachelorView')->name('listBachelorView');

    // Route::post('/datatable/list/getBachelorData', 'DataTablesController@listBachelorData')->name('getListBachelorData');
    // Route::get('/datatable/list/getBachelorData/create', 'DataTablesController@getListBachelorDataUserCreate')->name('getListBachelorDataUserCreate');
    // Route::post('/datatable/list/getBachelorData/store', 'DataTablesController@getListBachelorDataUserStore')->name('getListBachelorDataUserStore');
    // Route::get('/datatable/list/getBachelorData/{id}/edit', 'DataTablesController@listBachelorDataUserId')->name('getListBachelorDataUserId');
    // Route::post('/datatable/list/getBachelorData/update', 'DataTablesController@listBachelorDataUserIdUpdate')->name('getListBachelorDataUserIdUpdate');
    // Route::get('/datatable/list/getBachelorData/{id}/delete', 'DataTablesController@listBachelorDataUserIdDelete')->name('getListBachelorDataUserIdDelete');

    // Route::get('/datatable/list/master', 'DataTablesController@listMasterView')->name('listMasterView');

    // Route::post('/datatable/list/getMasterData', 'DataTablesController@listMasterData')->name('getListMasterData');
    // Route::get('/datatable/list/getMasterData/create', 'DataTablesController@getListMasterDataUserCreate')->name('getListMasterDataUserCreate');
    // Route::post('/datatable/list/getMasterData/store', 'DataTablesController@getListMasterDataUserStore')->name('getListMasterDataUserStore');
    // Route::get('/datatable/list/getMasterData/{id}/edit', 'DataTablesController@listMasterDataUserId')->name('getListMasterDataUserId');
    // Route::post('/datatable/list/getMasterData/update', 'DataTablesController@listMasterDataUserIdUpdate')->name('getListMasterDataUserIdUpdate');
    // Route::get('/datatable/list/getMasterData/{id}/delete', 'DataTablesController@listMasterDataUserIdDelete')->name('getListMasterDataUserIdDelete');

    // Route::get('/datatable/list/phd', 'DataTablesController@listPhdView')->name('listPhdView');

    // Route::post('/datatable/list/getPhdData', 'DataTablesController@listPhdData')->name('getListPhdData');
    // Route::get('/datatable/list/getPhdData/create', 'DataTablesController@getListPhdDataUserCreate')->name('getListPhdDataUserCreate');
    // Route::post('/datatable/list/getPhdData/store', 'DataTablesController@getListPhdDataUserStore')->name('getListPhdDataUserStore');
    // Route::get('/datatable/list/getPhdData/{id}/edit', 'DataTablesController@listPhdDataUserId')->name('getListPhdDataUserId');
    // Route::post('/datatable/list/getPhdData/update', 'DataTablesController@listPhdDataUserIdUpdate')->name('getListPhdDataUserIdUpdate');
    // Route::get('/datatable/list/getPhdData/{id}/delete', 'DataTablesController@listPhdDataUserIdDelete')->name('getListPhdDataUserIdDelete');



    // Route::get('/datatable/register/bachelor', 'DataTablesController@registerBachelorView')->name('registerBachelorView');

    // Route::post('/datatable/register/getBachelorData', 'DataTablesController@registerBachelorData')->name('getRegisterBachelorData');
    // Route::get('/datatable/register/getBachelorData/{id}/edit', 'DataTablesController@registerBachelorDataUserId')->name('getRegisterBachelorDataUserId');
    // Route::post('/datatable/register/getBachelorData/update', 'DataTablesController@registerBachelorDataUserIdUpdate')->name('getRegisterBachelorDataUserIdUpdate');
    // Route::get('/datatable/register/getBachelorData/{id}/delete', 'DataTablesController@registerBachelorDataUserIdDelete')->name('getRegisterBachelorDataUserIdDelete');

    // Route::get('/datatable/register/master', 'DataTablesController@registerMasterView')->name('registerMasterView');

    // Route::post('/datatable/register/getMasterData', 'DataTablesController@registerMasterData')->name('getRegisterMasterData');
    // Route::get('/datatable/register/getMasterData/{id}/edit', 'DataTablesController@registerMasterDataUserId')->name('getRegisterMasterDataUserId');
    // Route::post('/datatable/register/getMasterData/update', 'DataTablesController@registerMasterDataUserIdUpdate')->name('getRegisterMasterDataUserIdUpdate');
    // Route::get('/datatable/register/getMasterData/{id}/delete', 'DataTablesController@registerMasterDataUserIdDelete')->name('getRegisterMasterDataUserIdDelete');

    // Route::get('/datatable/register/phd', 'DataTablesController@registerPhdView')->name('registerPhdView');

    // Route::post('/datatable/register/getPhdData', 'DataTablesController@registerPhdData')->name('getRegisterPhdData');
    // Route::get('/datatable/register/getPhdData/{id}/edit', 'DataTablesController@registerPhdDataUserId')->name('getRegisterPhdDataUserId');
    // Route::post('/datatable/register/getPhdData/update', 'DataTablesController@registerPhdDataUserIdUpdate')->name('getRegisterPhdDataUserIdUpdate');
    // Route::get('/datatable/register/getPhdData/{id}/delete', 'DataTablesController@registerPhdDataUserIdDelete')->name('getRegisterPhdDataUserIdDelete');





    // Route::get('/datatable/movement/bachelor', 'DataTablesController@movementBachelorView')->name('movementBachelorView');

    // Route::post('/datatable/movement/getBachelorData', 'DataTablesController@movementBachelorData')->name('getMovementBachelorData');
    // Route::get('/datatable/movement/getBachelorData/{id}/edit', 'DataTablesController@movementBachelorDataUserId')->name('getMovementBachelorDataUserId');
    // Route::post('/datatable/movement/getBachelorData/update', 'DataTablesController@movementBachelorDataUserIdUpdate')->name('getMovementBachelorDataUserIdUpdate');
    // Route::get('/datatable/movement/getBachelorData/{id}/delete', 'DataTablesController@movementBachelorDataUserIdDelete')->name('getMovementBachelorDataUserIdDelete');

    // Route::get('/datatable/movement/master', 'DataTablesController@movementMasterView')->name('movementMasterView');

    // Route::post('/datatable/movement/getMasterData', 'DataTablesController@movementMasterData')->name('getMovementMasterData');
    // Route::get('/datatable/movement/getMasterData/{id}/edit', 'DataTablesController@movementMasterDataUserId')->name('getMovementMasterDataUserId');
    // Route::post('/datatable/movement/getMasterData/update', 'DataTablesController@movementMasterDataUserIdUpdate')->name('getMovementMasterDataUserIdUpdate');
    // Route::get('/datatable/movement/getMasterData/{id}/delete', 'DataTablesController@movementMasterDataUserIdDelete')->name('getMovementMasterDataUserIdDelete');

    // Route::get('/datatable/movement/phd', 'DataTablesController@movementPhdView')->name('movementPhdView');

    // Route::post('/datatable/movement/getPhdData', 'DataTablesController@movementPhdData')->name('getMovementPhdData');
    // Route::get('/datatable/movement/getPhdData/{id}/edit', 'DataTablesController@movementPhdDataUserId')->name('getMovementPhdDataUserId');
    // Route::post('/datatable/movement/getPhdData/update', 'DataTablesController@movementPhdDataUserIdUpdate')->name('getMovementPhdDataUserIdUpdate');
    // Route::get('/datatable/movement/getPhdData/{id}/delete', 'DataTablesController@movementPhdDataUserIdDelete')->name('getMovementPhdDataUserIdDelete');


    // Route::get('/datatable/academic-guide/{name}', 'DataTablesController@academicGuideView')->name('academicGuideView');

    // Route::get('/datatable/academic-guide/list/reports/{name}', 'DataTablesController@academicGuideListReportView')->name('academicGuideListReportView');
    // Route::get('/datatable/academic-guide/register/reports/{name}', 'DataTablesController@academicGuideRegisterReportView')->name('academicGuideRegisterReportView');

    // Route::post('/datatable/academic-guide/getAcademicGuideListReportData', 'DataTablesController@academicGuideListReportData')->name('academicGuideListReportData');
    // Route::post('/datatable/academic-guide/getAcademicGuideRegisterReportData', 'DataTablesController@academicGuideRegisterReportData')->name('academicGuideRegisterReportData');




    // Route::get('/datatable/register/bachelor/{country}', 'DataTablesController@registerBachelorDestinationView')->name('registerBachelorDestinationView');
    // Route::get('/datatable/register/getBachelorDestinationData', 'DataTablesController@registerBachelorDestinationData')->name('getRegisterBachelorDestinationData');

    // Route::get('/datatable/register/master/{country}', 'DataTablesController@registerMasterDestinationView')->name('registerMasterDestinationView');
    // Route::get('/datatable/register/getmasterDestinationData', 'DataTablesController@registerMasterDestinationData')->name('getRegisterMasterDestinationData');

    // Route::get('/datatable/register/bachelor/{country}/{university}', 'DataTablesController@registerBachelorDestinationUniversityView')->name('registerBachelorDestinationUniversityView');
    // Route::get('/datatable/register/getBachelorDestinationUniversityData', 'DataTablesController@registerBachelorDestinationUniversityData')->name('registerBachelorDestinationUniversityData');

    // Route::get('/datatable/register/master/{country}/{university}', 'DataTablesController@registerMasterDestinationUniversityView')->name('registerMasterDestinationUniversityView');
    // Route::get('/datatable/register/getmasterDestinationUniversityData', 'DataTablesController@registerMasterDestinationUniversityData')->name('registerMasterDestinationUniversityData');
});



















Route::namespace('AcademicGuide')->prefix('academic-guide')->middleware('academic-guide')->group(function() {
    Route::get('/dashboard', 'AcademicDashboardController@index')->name('academicGuide.home');

    Route::get('/statistics', 'AcademicDashboardController@statistics')->name('academicGuide.statistics');
    Route::get('/statistics/bachelor', 'AcademicDashboardController@bachelorStatistics')->name('academicGuide.bachelorStatistics');
    Route::get('/statistics/master', 'AcademicDashboardController@masterStatistics')->name('academicGuide.masterStatistics');
    Route::get('/statistics/phd', 'AcademicDashboardController@phdStatistics')->name('academicGuide.phdStatistics');

    Route::get('/datatable/ads/list', 'DataTablesController@adsListView')->name('academicGuideAdsListView');
    Route::post('/datatable/ads/getListData', 'DataTablesController@adsListData')->name('academicGuideGetAdsListData');

    Route::get('/datatable/social-media/list', 'DataTablesController@socialMediaListView')->name('academicGuideSocialMediaListView');
    Route::post('/datatable/social-media/getListData', 'DataTablesController@socialMediaListData')->name('academicGuideGetSocialMediaListData');

    Route::get('/datatable/list', 'DataTablesController@listView')->name('academicGuideListView');
    Route::post('/datatable/getListData', 'DataTablesController@listData')->name('academicGuideGetListData');

    Route::get('/datatable/register', 'DataTablesController@registerView')->name('academicGuideRegisterView');
    Route::post('/datatable/getRegisterData', 'DataTablesController@registerData')->name('academicGuideGetRegisterData');

    Route::get('/datatable/list/reports', 'DataTablesController@listReportsView')->name('academicGuideListReportsView');
    Route::post('/datatable/getListData/reports', 'DataTablesController@listReportsData')->name('academicGuideGetListReportsData');

    Route::get('/datatable/register/reports', 'DataTablesController@registerReportsView')->name('academicGuideRegisterReportsView');
    Route::post('/datatable/getRegisterData/reports', 'DataTablesController@registerReportsData')->name('academicGuideGetRegisterReportsData');


    Route::get('/datatable/list/bachelor', 'DataTablesController@listBachelorView')->name('academicGuideListBachelorView');

    Route::post('/datatable/list/getBachelorData', 'DataTablesController@listBachelorData')->name('academicGuideGetListBachelorData');
    Route::get('/datatable/list/getBachelorData/create', 'DataTablesController@getListBachelorDataUserCreate')->name('academicGuideGetListBachelorDataUserCreate');
    Route::post('/datatable/list/getBachelorData/store', 'DataTablesController@getListBachelorDataUserStore')->name('academicGuideGetListBachelorDataUserStore');
    Route::get('/datatable/list/getBachelorData/{id}/edit', 'DataTablesController@listBachelorDataUserId')->name('academicGuideGetListBachelorDataUserId');
    Route::post('/datatable/list/getBachelorData/update', 'DataTablesController@listBachelorDataUserIdUpdate')->name('academicGuideGetListBachelorDataUserIdUpdate');
    Route::get('/datatable/list/getBachelorData/{id}/delete', 'DataTablesController@listBachelorDataUserIdDelete')->name('academicGuideGetListBachelorDataUserIdDelete');

    Route::get('/datatable/list/master', 'DataTablesController@listMasterView')->name('academicGuideListMasterView');

    Route::post('/datatable/list/getMasterData', 'DataTablesController@listMasterData')->name('academicGuideGetListMasterData');
    Route::get('/datatable/list/getMasterData/create', 'DataTablesController@getListMasterDataUserCreate')->name('academicGuideGetListMasterDataUserCreate');
    Route::post('/datatable/list/getMasterData/store', 'DataTablesController@getListMasterDataUserStore')->name('academicGuideGetListMasterDataUserStore');
    Route::get('/datatable/list/getMasterData/{id}/edit', 'DataTablesController@listMasterDataUserId')->name('academicGuideGetListMasterDataUserId');
    Route::post('/datatable/list/getMasterData/update', 'DataTablesController@listMasterDataUserIdUpdate')->name('academicGuideGetListMasterDataUserIdUpdate');
    Route::get('/datatable/list/getMasterData/{id}/delete', 'DataTablesController@listMasterDataUserIdDelete')->name('academicGuideGetListMasterDataUserIdDelete');

    Route::get('/datatable/list/phd', 'DataTablesController@listPhdView')->name('academicGuideListPhdView');

    Route::post('/datatable/list/getPhdData', 'DataTablesController@listPhdData')->name('academicGuideGetListPhdData');
    Route::get('/datatable/list/getPhdData/create', 'DataTablesController@getListPhdDataUserCreate')->name('academicGuideGetListPhdDataUserCreate');
    Route::post('/datatable/list/getPhdData/store', 'DataTablesController@getListPhdDataUserStore')->name('academicGuideGetListPhdDataUserStore');
    Route::get('/datatable/list/getPhdData/{id}/edit', 'DataTablesController@listPhdDataUserId')->name('academicGuideGetListPhdDataUserId');
    Route::post('/datatable/list/getPhdData/update', 'DataTablesController@listPhdDataUserIdUpdate')->name('academicGuideGetListPhdDataUserIdUpdate');
    Route::get('/datatable/list/getPhdData/{id}/delete', 'DataTablesController@listPhdDataUserIdDelete')->name('academicGuideGetListPhdDataUserIdDelete');




    Route::get('/datatable/register/bachelor', 'DataTablesController@registerBachelorView')->name('academicGuideRegisterBachelorView');

    Route::post('/datatable/register/getBachelorData', 'DataTablesController@registerBachelorData')->name('academicGuideGetRegisterBachelorData');
    Route::get('/datatable/register/getBachelorData/{id}/edit', 'DataTablesController@registerBachelorDataUserId')->name('academicGuideGetRegisterBachelorDataUserId');
    Route::post('/datatable/register/getBachelorData/update', 'DataTablesController@registerBachelorDataUserIdUpdate')->name('academicGuideGetRegisterBachelorDataUserIdUpdate');
    Route::get('/datatable/register/getBachelorData/{id}/delete', 'DataTablesController@registerBachelorDataUserIdDelete')->name('academicGuideGetRegisterBachelorDataUserIdDelete');

    Route::get('/datatable/register/master', 'DataTablesController@registerMasterView')->name('academicGuideRegisterMasterView');

    Route::post('/datatable/register/getMasterData', 'DataTablesController@registerMasterData')->name('academicGuideGetRegisterMasterData');
    Route::get('/datatable/register/getMasterData/{id}/edit', 'DataTablesController@registerMasterDataUserId')->name('academicGuideGetRegisterMasterDataUserId');
    Route::post('/datatable/register/getMasterData/update', 'DataTablesController@registerMasterDataUserIdUpdate')->name('academicGuideGetRegisterMasterDataUserIdUpdate');
    Route::get('/datatable/register/getMasterData/{id}/delete', 'DataTablesController@registerMasterDataUserIdDelete')->name('academicGuideGetRegisterMasterDataUserIdDelete');

    Route::get('/datatable/register/phd', 'DataTablesController@registerPhdView')->name('academicGuideRegisterPhdView');

    Route::post('/datatable/register/getPhdData', 'DataTablesController@registerPhdData')->name('academicGuideGetRegisterPhdData');
    Route::get('/datatable/register/getPhdData/{id}/edit', 'DataTablesController@registerPhdDataUserId')->name('academicGuideGetRegisterPhdDataUserId');
    Route::post('/datatable/register/getPhdData/update', 'DataTablesController@registerPhdDataUserIdUpdate')->name('academicGuideGetRegisterPhdDataUserIdUpdate');
    Route::get('/datatable/register/getPhdData/{id}/delete', 'DataTablesController@registerPhdDataUserIdDelete')->name('academicGuideGetRegisterPhdDataUserIdDelete');






    Route::get('/datatable/movement/bachelor', 'DataTablesController@movementBachelorView')->name('academicGuideMovementBachelorView');

    Route::post('/datatable/movement/getBachelorData', 'DataTablesController@movementBachelorData')->name('academicGuideGetMovementBachelorData');
    Route::get('/datatable/movement/getBachelorData/{id}/edit', 'DataTablesController@movementBachelorDataUserId')->name('academicGuideGetMovementBachelorDataUserId');
    Route::post('/datatable/movement/getBachelorData/update', 'DataTablesController@movementBachelorDataUserIdUpdate')->name('academicGuideGetMovementBachelorDataUserIdUpdate');
    Route::get('/datatable/movement/getBachelorData/{id}/delete', 'DataTablesController@movementBachelorDataUserIdDelete')->name('academicGuideGetMovementBachelorDataUserIdDelete');

    Route::get('/datatable/movement/master', 'DataTablesController@movementMasterView')->name('academicGuideMovementMasterView');

    Route::post('/datatable/movement/getMasterData', 'DataTablesController@movementMasterData')->name('academicGuideGetMovementMasterData');
    Route::get('/datatable/movement/getMasterData/{id}/edit', 'DataTablesController@movementMasterDataUserId')->name('academicGuideGetMovementMasterDataUserId');
    Route::post('/datatable/movement/getMasterData/update', 'DataTablesController@movementMasterDataUserIdUpdate')->name('academicGuideGetMovementMasterDataUserIdUpdate');
    Route::get('/datatable/movement/getMasterData/{id}/delete', 'DataTablesController@movementMasterDataUserIdDelete')->name('academicGuideGetMovementMasterDataUserIdDelete');

    Route::get('/datatable/movement/phd', 'DataTablesController@movementPhdView')->name('academicGuideMovementPhdView');

    Route::post('/datatable/movement/getPhdData', 'DataTablesController@movementPhdData')->name('academicGuideGetMovementPhdData');
    Route::get('/datatable/movement/getPhdData/{id}/edit', 'DataTablesController@movementPhdDataUserId')->name('academicGuideGetMovementPhdDataUserId');
    Route::post('/datatable/movement/getPhdData/update', 'DataTablesController@movementPhdDataUserIdUpdate')->name('academicGuideGetMovementPhdDataUserIdUpdate');
    Route::get('/datatable/movement/getPhdData/{id}/delete', 'DataTablesController@movementPhdDataUserIdDelete')->name('academicGuideGetMovementPhdDataUserIdDelete');




    Route::resource('/academic-users', 'AcademicUsersController');
});
