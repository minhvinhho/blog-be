<?php

use Illuminate\Http\Request;
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

Route::post('/register', 'ApiUserController@register');
Route::post('/login', 'ApiUserController@login');
Route::get('/user', 'ApiUserController@userInfo')->middleware('auth:api');

// Get all employees
Route::get('/employees', 'ApiEmployeeController@getEmployee')->middleware('auth:api');

// Get employee detail
Route::get('/employee/{id}', 'ApiEmployeeController@getEmployeeById')->middleware('auth:api');

// Add Employee
Route::post('/employee', 'ApiEmployeeController@addEmployee')->middleware('auth:api');

// Update Employee
Route::put('/employee/{id}', 'ApiEmployeeController@updateEmployee')->middleware('auth:api');

// Delete Employee
Route::delete('/employee/{id}', 'ApiEmployeeController@deleteEmployee')->middleware('auth:api');

/////////////////////////////////////////////////////////////////////////////////

// Get all posts
Route::get('/posts', 'ApiPostController@getPost')->middleware('auth:api');

// Get post detail
Route::get('/post/{id}', 'ApiPostController@getPostById')->middleware('auth:api');

// Add Post
Route::post('/post', 'ApiPostController@addPost')->middleware('auth:api');

// Update post
Route::put('/post/{id}', 'ApiPostController@updatePost')->middleware('auth:api');

// Delete post
Route::delete('/post/{id}', 'ApiPostController@deletePost')->middleware('auth:api');

/////////////////////////////////////////////////////////////////////////////////

// Get all category
Route::get('/categories', 'ApiCategoryController@getCategory')->middleware('auth:api');

// Get category detail
Route::get('/category/{id}', 'ApiCategoryController@getCategoryById')->middleware('auth:api');

// Add category
Route::post('/category', 'ApiCategoryController@addCategory')->middleware('auth:api');

// Update category
Route::put('/category/{id}', 'ApiCategoryController@updateCategory')->middleware('auth:api');

// Delete category
Route::delete('/category/{id}', 'ApiCategoryController@deleteCategory')->middleware('auth:api');

/////////////////////////////////////////////////////////////////////////////////

// Get all keyword
Route::get('/keywords', 'ApiKeywordController@getKeyword')->middleware('auth:api');

// Get keyword detail
Route::get('/keyword/{id}', 'ApiKeywordController@getKeywordById')->middleware('auth:api');

// Add keyword
Route::post('/keyword', 'ApiKeywordController@addKeyword')->middleware('auth:api');

// Update keyword
Route::put('/keyword/{id}', 'ApiKeywordController@updateKeyword')->middleware('auth:api');

// Delete keyword
Route::delete('/keyword/{id}', 'ApiKeywordController@deleteKeyword')->middleware('auth:api');

/////////////////////////////////////////////////////////////////////////////////

// Get all role
Route::get('/roles', 'ApiRolesController@getRole')->middleware('auth:api');

// Get role detail
Route::get('/role/{id}', 'ApiRolesController@getRoleById')->middleware('auth:api');

// Add role
Route::post('/role', 'ApiRolesController@addRole')->middleware('auth:api');

// Update role
Route::put('/role/{id}', 'ApiRolesController@updateRole')->middleware('auth:api');

// Delete role
Route::delete('/role/{id}', 'ApiRolesController@deleteRole')->middleware('auth:api');
