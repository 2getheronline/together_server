<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources([
    'tags' => 'TagsController',
    'platforms' => 'PlatformController',
    'sessions' => 'SessionsController',
    'translations' => 'LanguageController',
    'actions' => 'ActionController',
]);

Route::group([
    'namespace' => 'Mobile',
    'middleware' => 'auth:api'
], function () {

    Route::apiResources([
        'users' => 'UsersController',
        'missions' => 'MissionsController',
        'activities' => 'ActivitiesController',
        'messages' => 'MessagesController',
        'groups' => 'GroupsController',
    ]);

});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => ['auth:api', 'admin']
], function () {

    Route::apiResources([
        'users' => 'UsersController',
        'missions' => 'MissionsController',
        'groups' => 'GroupsController',
        'activities' => 'ActivitiesController',
        'messages' => 'MessagesController'
    ]);

    Route::get('overview', 'DashboardController@overview');
    Route::get('analytics', 'DashboardController@analytics');
    Route::get('og-tags', 'OGController@fetchMeta');

});

