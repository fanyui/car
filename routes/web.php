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


//vechicule section
Route::get('/car/create', 'VehiculeManagementController@create')->name('create-car');
Route::post('/car/create', 'VehiculeManagementController@save')->name('save-car');
Route::post('/car/{id}', 'VehiculeManagementController@update')->name('update-car');
Route::get('/car', 'VehiculeManagementController@getAll')->name('getall-car');
// Route::get('/car/create', 'VehiculeManagementController@create')->name('create-car');

// worker section 
Route::get('/worker/create', 'WorkerController@create')->name('create-worker');
Route::post('/worker/create', 'WorkerController@save')->name('save-worker');
Route::get('/worker', 'WorkerController@getAll')->name('getall-worker');
Route::post('/worker/{id}', 'WorkerController@update')->name('update-worker');

// transaction
Route::get('/transaction/create', 'TransactionController@create')->name('create-transaction');
Route::post('/transaction/create', 'TransactionController@save')->name('save-transaction');
Route::get('/transaction', 'TransactionController@getAll')->name('getall-transactions');
Route::post('/transaction/{id}', 'TransactionController@update')->name('update-transaction');
//get the details of a transaction 
Route::get('/transaction/{id}', 'TransactionController@getTransaction')->name('transaction');
Route::post('/modalupdate/transaction/', 'TransactionController@modalUpdate')->name('update-transaction-modal');



//Transaction of a particular car

Route::get('/transaction/car/{id}', 'TransactionController@cars')->name('car-transaction');

//all transactions by a particular worker
Route::get('/transaction/worker/{id}', 'TransactionController@worker')->name('worker-transaction');


//getring all cars that have not been assigned yet ie cars that are still in the new stage

Route::get('/cars/unassigned', 'VehiculeManagementController@unassigned')->name('unassigned-cars');

//completed Cars
Route::get('/cars/completed', 'VehiculeManagementController@completedCars')->name('completed-cars');

//cars that are currently being fixed endpoint
Route::get('/cars/fixing', 'VehiculeManagementController@fixingCars')->name('fixing-cars');

//Dashboard route
Route::get('/dashboard', 'TransactionController@dashboard')->name('dashboard');





Route::get('/home', 'HomeController@index')->name('home');
