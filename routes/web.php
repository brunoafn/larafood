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

Route::prefix('admin')->namespace('Admin')->group(function(){

    //rotas de permissões x profiles  profiles.permissions.profiles
    Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    // Route::get('profiles/{id}/permissions/create/search', 'ACL\PermissionProfileController@filterPermissionsAvailable')->name('profiles.permissions.available.search');
    Route::post('profiles/{id}/permissions/store', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');


    //rotas de permissões
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::get('permissions/{id}/profiles', 'ACL\PermissionProfileController@profiles')->name('profiles.permissions.profiles');

    Route::resource('permissions', 'ACL\PermissionController');

    //rotas de perfils
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');

    //rotas de detalhes dos planos
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');
    //rotas de planos
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    //rotas home dashboard
    Route::get('/', 'PlanController@index')->name('admin.index');
});



Route::get('/', function () {
    return view('welcome');
});
