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

Route::get('/', function () {
    return view('welcome');
});

//Generic Dashboard pages
Route::middleware(['auth'])->group(function () {
    Route::get('home', 'Estate@home')->name('homeDashboard');
});

// Estate Routes
Route::middleware(['auth'])->group(function () {
    Route::get('estates/index', 'Estate@index')->name('estateIndex');
    Route::get('estates/index/available', 'Estate@availableEstatesIndex')->name('estateAvailable');
    Route::get('estates/index/highValue', 'Estate@highValueEstates')->name('estateHighValue');
    Route::get('estates/history', 'Estate@historyIndex')->name('historyIndex');
    Route::get('estates/activeAssurance', 'Estate@activeAssurance')->name('activeAssurance');
    Route::get('estates/add', 'Estate@create')->name('estateAddPage');

    Route::get('estates/delete/{id}', 'Estate@destroy')->name('estateDelete');
    Route::post('estate-edit/store', 'Estate@store')->name('estateAdd');
    Route::put('estate-update/{id}', 'Estate@update')->name('estate.update');
    Route::get('estates/index/{id}', 'Estate@search')->name('estateEdit');
    Route::get('estates/assign/{item_id}/{employee_id}', 'Estate@assignEstateToEmployee')->name('assignEstateToEmployee');
    Route::get('estates/unassign/{item_id}/{employee_id}', 'Estate@unassignEstateToEmployee')->name('unassignEstateToEmployee');
});

// Estate Routes
Route::middleware(['auth'])->group(function () {
    Route::get('employee/add', 'Employee@create')->name('employeeCreate');
    Route::put('employee/update/{id}', 'Employee@update')->name('employeeUpdate');
    Route::post('employee/store', 'Employee@store')->name('employeeStore');
    Route::get('employee/index', 'Employee@index')->name('employeeIndex');
    Route::get('employee/show/{id}', 'Employee@show')->name('employeeProfile');
    Route::get('employee/index/{id}', 'Employee@edit')->name('employeeEdit');
    Route::get('employee/delete/{id}', 'Employee@destroy')->name('employeeDelete');
});

//PDF Relatories for download
Route::middleware(['auth'])->group(function () {
    Route::get('pdf/print/activeEstates', 'Estate@printEstateList')->name('printActiveEstates');
    Route::get('pdf/print/deletedEstates', 'Estate@printDeletedEstateList')->name('printDeletedEstates');
});

//Admin routes
Route::middleware(['auth'])->group(function () {
    //home
    Route::get('admin/config/home', 'AdminConfigController@home')->name('adminConfigHome');
    Route::post('admin/config/home/', 'AdminConfigController@updateConfigValues')->name('updateAdminAlertValues');

    //Accounts routes CRUD
    Route::get('admin/config/acess/{id?}', 'AdminConfigController@acessIndex')->name('adminAcessIndex');
    Route::put('admin/config/acess/update/{id?}', 'AdminConfigController@updateAcessData')->name('updateAcessData');
    Route::post('admin/config/store/acess', 'AdminConfigController@createAcessIndex')->name('createAcessIndex');
    Route::get('admin/config/delete/acess/{id}', 'AdminConfigController@deleteAcess')->name('removeUserAcess');

    //Account level related routes
    Route::get('admin/config/upgradeAcess/{id}', 'AdminConfigController@giveSuperAdminToUser')->name('giveSuperAdminToUser');
    Route::get('admin/config/downgradeAcess/{id}', 'AdminConfigController@revokeSuperAdminToUser')->name('revokeSuperAdminToUser');

    //E-mail list routes
    Route::get('admin/config/mail/', 'AdminConfigController@mailListIndexAndEditor')->name('mailListIndex');
    Route::post('admin/config/mail/', 'AdminConfigController@storeEmailOnMailingList')->name('storeEmailOnMailingList');
    Route::get('admin/config/mail/edit/{id?}', 'AdminConfigController@mailListIndexAndEditor')->name('editEmailOnMailingList');
    Route::put('admin/config/mail/update/{id}', 'AdminConfigController@updateEmailOnMailingList')->name('updateEmailOnMailingList');
    Route::get('admin/config/mail/delete/{id?}', 'AdminConfigController@deleteEmailFromNotificationList')->name('deleteEmailingFromList');
});


Route::middleware(['auth'])->group(function () {
    Route::get('seller', 'Sellers@index')->name('seller');
    Route::post('seller/store', 'Sellers@store')->name('sellerStore');
    Route::get('categories', 'Categories@index');
    Route::get('categories/create', 'Categories@create')->name('categoriesCreateForm');
    Route::post('categories/store', 'Categories@store')->name('categoriesStore');
    Route::get('subcategories/create', 'SubCategories@create')->name('subcategoriesCreateForm');
    Route::post('subcategories/store', 'SubCategories@store')->name('subcategoriesStore');
});

// -------------------------------------------------
// BELOW WORK IN PROGRESS ROUTES, METHODS AND BLADES
// -------------------------------------------------


//Just for developer test
//Route::get('tt', 'Estate@printWriteOffEstateList');

//Routes for bill of sales
Route::get('bill-of-sale/index', 'BillController@index')->name('billIndex');
Route::get('bill-of-sale/new', 'BillController@create')->name('billAdd');
Route::post('bill-of-sale/save', 'BillController@store')->name('billSave');


Auth::routes();

Route::get('/homeLogin', 'HomeController@index')->name('home');
