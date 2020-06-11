<?php

//namespace will: fornt\FrontController@index

// Route::group(['namespace' => 'Frontend'], function () {
//     Route::get('/', 'FrontController@index');
// });

//OR

// Route::namespace('Frontend')->group(function () {
//     Route::get('/', 'FrontController@index');
// });

//FrontEnd


Route::get('/', 'Frontend\FrontController@index');
Route::get('/post','Frontend\FrontController@Showposts');


//BackEnd
// Route::group(['prefix' => 'admin', 'namespace'=>'Backend'], function () {
//     Route::get('/about/{id}', 'BackController@about');
//     Route::get('/career/{id}/{name?}', 'BackController@career');
// });

//sign Up(With Photo)
// Route::get('/register', 'Backend\BackController@ShowRegisterForm')->name('register');
// Route::post('/register', 'Backend\BackController@ProcessRegistration')->name('register');


//Http:Controllers:StudentController
Route::resource('/student', 'StudentController');


//Http:Controllers:AuthController

//sign Up
Route::get('/register', 'AuthController@ShowRegisterForm')->name('register');
Route::post('/register', 'AuthController@RegistrationProcess')->name('register');

//sign In
Route::get('/login', 'AuthController@ShowLoginForm')->name('login');
Route::post('/login', 'AuthController@LoginProcess');

//Logout
Route::get('/logout', 'AuthController@LogoutProcess')->name('logout');;

//User Profile DashBoard
Route::get('/user/profile','AuthController@ShowProfile')->name('profile');


//Backend:CategoryController

//CRUD Category
Route::get('/categories', 'Backend\CategoryController@index')->name('categories.index');
Route::get('/crtegories/add', 'Backend\CategoryController@create')->name('categories.create');
Route::post('/categories', 'Backend\CategoryController@store')->name('categories.store');
Route::get('/categories/{id}', 'Backend\CategoryController@show')->name('categories.show');
Route::get('/categories/{id}/edit', 'Backend\CategoryController@edit')->name('categories.edit');
Route::put('/categories/{id}' , 'Backend\CategoryController@update')->name('categories.update');
Route::delete('categories/{id}', 'Backend\CategoryController@destroy')->name('categories.delete');


//Backend:PostController

//CRUD Posts
Route::group(['namespace' => 'Backend'], function () {
    Route::resource('/posts', 'PostController');
});


// Send mail and Verify
Route::get('/verify/{token}', 'MailVerifyController@VerifyEmail')->name('verify');