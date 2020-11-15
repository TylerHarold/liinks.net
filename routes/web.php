<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/')->group(function() {
    // Index
    Route::get('/', 'Controller@index')->name('Home');

    // Authentication
    Route::get('/login', 'Controller@login')->name('Login');
    Route::post('/login', 'AuthenticationController@userLogin');
    Route::get('/register', 'Controller@register')->name('Register');
    Route::post('/register', 'AuthenticationController@createAccount');
    Route::get('/logout', 'AuthenticationController@userLogout')->name('Logout');

    // About
    Route::get('/about', 'Controller@about')->name('About');

    // Profile
    Route::prefix('/u')->group(function() {
       Route::get('/', 'Controller@profile')->name('Profile');
       Route::get('/{username}', 'Controller@otherProfile')->name('OtherProfile');
    });

    // Connect
    Route::get('/connect', 'Controller@connect')->name('Connect');

    // Settings
    Route::prefix('/settings')->group(function() {
       Route::get('/', 'Controller@settings')->name('Settings');
       Route::post('/upload-avatar', 'UserController@setAvatar');
       Route::post('/change-bio', 'UserController@setBio');
       Route::post('/edit-links', 'UserController@setLinks');
    });
});
