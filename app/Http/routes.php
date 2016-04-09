<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', ['uses' => 'HomeController@accueil']);
Route::get('accueil', ['uses' => 'HomeController@accueil']);
Route::get('participant/{id}', ['uses' => 'HomeController@participant']);
Route::get('contact', ['uses' => 'HomeController@contact']);

Route::post('sendMessage', ['uses' => 'HomeController@sendMessage']);
Route::post('search', ['uses' => 'SearchController@search']);

Route::get('imageJson/{id?}', ['uses' => 'Backend\UploadController@imageJson']);
Route::get('fileJson/{id?}', ['uses' => 'Backend\UploadController@fileJson']);

Route::post('uploadFileRedactor/{id?}', 'Backend\UploadController@uploadFileRedactor');
Route::post('uploadRedactor/{id?}', 'Backend\UploadController@uploadRedactor');

Route::resource('page', 'PageController');

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/', [ 'middleware' => 'auth', 'uses' => 'Backend\AdminController@index']);

    Route::post('page/sorting', ['uses' => 'Backend\PageController@sorting']);
    Route::resource('page', 'Backend\PageController');
    Route::resource('bloc', 'Backend\BlocController');
    Route::resource('news', 'Backend\NewsController');
    Route::resource('icon', 'Backend\IconController');
    Route::resource('troncon', 'Backend\TronconController');
    Route::resource('prestataire', 'Backend\PrestataireController');
    Route::resource('remarque', 'Backend\RemarqueController');
    Route::resource('prestation', 'Backend\PrestationController');
    Route::resource('image', 'Backend\ImageController');

    //Route::post('hierarchy', ['uses' => 'Backend\PageController@hierarchy']);
    // Route::get('build', ['uses' => 'Backend\PageController@build']);
    Route::resource('config', 'Backend\ConfigController');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

});Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/', [ 'middleware' => 'auth', 'uses' => 'Backend\AdminController@index']);

    Route::post('page/sorting', ['uses' => 'Backend\PageController@sorting']);
    Route::resource('page', 'Backend\PageController');
    Route::resource('bloc', 'Backend\BlocController');
    Route::resource('news', 'Backend\NewsController');
    Route::resource('icon', 'Backend\IconController');
    Route::resource('troncon', 'Backend\TronconController');
    Route::resource('prestataire', 'Backend\PrestataireController');
    Route::resource('remarque', 'Backend\RemarqueController');
    Route::resource('prestation', 'Backend\PrestationController');
    Route::resource('image', 'Backend\ImageController');

    //Route::post('hierarchy', ['uses' => 'Backend\PageController@hierarchy']);
    // Route::get('build', ['uses' => 'Backend\PageController@build']);
    Route::resource('config', 'Backend\ConfigController');

});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
});

// Authentication routes...
Route::get('auth/student', 'Auth\AuthController@getStudent');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('test', function()
{
/*
    $TronconWorker = \App::make('App\Aren\Troncon\Worker\TronconWorkerInterface');

    $kml = public_path('kml/poi1.kml');

    $TronconWorker->prepare($kml, 'poi');*/

});