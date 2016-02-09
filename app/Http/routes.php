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
    $data = [
        'email'     => 'cindy.leschaud@gmail.com',
        'nom'       => 'Cindy Leschaud',
        'telephone' => '078 690 00 23',
        'remarque'  => '<p><strong>Test</strong></p>',
        'societe'   => 'DesignPond'
    ];

    $html = '<!DOCTYPE html>
                    <html lang="fr-FR"><head><meta charset="utf-8"></head>
                    <body><h2>Message depuis le site www.aren.ch</h2>';

    if(isset($societe))
    {
        $html .= '<h4>'.$data['societe'].'</h4>';
    }

    $html .= '<p>'.$data['nom'].'</p>
                  <p>E-mail: '.$data['email'].'</p>
                  <p>T&eacute;l. : '.$data['telephone'].'</p>
                  <div>'.$data['remarque'].'</div>
                  <p><a style="color: #444; font-size: 13px;" href="http://www.aren.ch">www.aren.ch</a></p>
                  </body>
                  </html>';

    $sujet        = 'Message depuis le site www.aren.ch';
    $message      = $html;
    $destinataire = 'info@aren.ch';

    $headers      = "Reply-To: info@aren.ch\n";
    $headers     .= "Content-Type: text/plain; charset=\"utf-8\"";

    if(mail($destinataire,$sujet,$message,$headers))
    {
        echo 'ok';
    }
    else
    {
        echo "Une erreur c'est produite lors de l'envois de l'email.";
    }

    /*
      \Mail::send('emails.contact', $data, function ($message) use ($data) {
           //$message->from($data['email'], $data['nom']);
           $message->to('info@aren.ch')->subject('Message depuis le site www.aren.ch');
       });
   */

});