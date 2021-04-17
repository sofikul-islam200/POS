<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

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
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register','AuthController@register');

});




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//==============employee all routes here===============//
Route::get('/AllEmploye','MainFolder\employeeController@GetAll_Employe');
Route::post('/AddEmploye','MainFolder\employeeController@Store_Employee');
Route::delete('/deleteemployee/{id}', 'MainFolder\employeeController@delete_Employee');
Route::get('/ViewEmploye/{ID}','MainFolder\employeeController@View_Employee');
Route::get('/EditEmployee/{id}','MainFolder\employeeController@__Edit_Employee');
Route::post('/UpdateEmploye/{id}','MainFolder\employeeController@Update_Employee');

//==================customer all routes here =============//
Route::post('/addCustomer','MainFolder\CustomerController@addCustomer');
Route::get('/allCustomer','MainFolder\CustomerController@allCustomer');
Route::delete('/deleteSingleCustomer/{customer_id}','MainFolder\CustomerController@DeleteSingleCustomer');
Route::get('/GetSingleCustomer/{customer_id}','MainFolder\CustomerController@ViewSingleCustomer');
Route::get('/GetSingleCustomerEdit/{customer_id}','MainFolder\CustomerController@EditCustomer');
Route::post('/UpdateCustomer/{customer_id}','MainFolder\CustomerController@UpdateCustomer');

//===================== category all routes here ================//
Route::post('/AddCategory','MainFolder\CategoryController@AddCategory');
Route::get('/getallcategory','MainFolder\CategoryController@GetAllCategory');
Route::delete('/deleteSingleCategory/{category_id}','MainFolder\CategoryController@deleteCategory');
Route::get('/CategoryEditForGet/{id}','MainFolder\CategoryController@EditCategory');
Route::post('/updateCategory/{category_id}','MainFolder\CategoryController@UpdateCategory');

//========================== supplier all routes here ====================//
Route::post('/AddSupplier','MainFolder\SupplierController@AddSupplier');
Route::get('/getSupplier','MainFolder\SupplierController@getSupplier');
Route::get('/EditSupplier/{id}','MainFolder\SupplierController@EditSupplier');
Route::post('/UpdateSupplier/{id}','MainFolder\SupplierController@UpdateSupplier');
Route::get('/DeleteSupplier/{id}','MainFolder\SupplierController@DeleteSupplier');
//==============PRODUCT ALL ROUTES HERE ======================//
Route::get('/showCategory','MainFolder\ProductController@showCategory');
Route::get('/showSupplier','MainFolder\ProductController@showSupplier');
Route::post('/AddProduct','MainFolder\ProductController@AddProduct');
Route::get('/getProduct','MainFolder\ProductController@getProduct');
Route::get('/deleteproduct/{id}','MainFolder\ProductController@deleteProduct');