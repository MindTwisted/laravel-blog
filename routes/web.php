<?php

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

// Left only login and logout routes
Route::namespace('Auth')
    ->group(function () {
        Route::get('/login', 'LoginController@showLoginForm')
            ->name('login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')
            ->name('logout');
    });

// Define routes for public site
Route::namespace('Site')->group(function () {
    // Landing page route
    Route::get('/', 'PagesController@indexPage')->name('pages.landing');
    Route::get('/blog', 'PagesController@blogPage')->name('pages.blog');
    Route::get('/blog/{id}', 'PagesController@postPage')->name('pages.post');

    // Sending contact email route
    Route::post('/send-contact-email', 'MailController@sendContactEmail')
        ->name('contact-emails.send');
});

// Define routes for personal admin dashboard
Route::middleware('auth')
    ->prefix('home')
    ->namespace('Home')
    ->group(function () {
        // Dashboard index page
        Route::get('/', 'HomeController@index')->name('home');

        // Dashboard posts routes
        Route::delete('/posts/{post}/delete-image', 'PostController@deleteImage')
            ->name('posts.delete-image');
        Route::resource('/posts', 'PostController');

        // Dashboard categories routes
        Route::resource('/categories', 'CategoryController', [
            'except' => 'show'
        ]);

        // Dashboard tags routes
        Route::resource('/tags', 'TagController', [
            'except' => 'show'
        ]);

        // Dashboard comments routes
        Route::post('/comments/{comment}/approve', 'CommentController@approve')
            ->name('comments.approve');
        Route::resource('/comments', 'CommentController');
    });

