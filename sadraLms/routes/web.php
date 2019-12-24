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

use App\Http\Controllers\profileController;

Route::get('/', [
    'as' => 'indexRoot', 'uses' => 'IndexController@index'
]);
Route::get('/viewCourse/{id}', [
    'as' => 'CourseRoot', 'uses' => 'IndexController@showCourse'
])->middleware('auth');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//main panel route******************************************************

Route::group(['middleware' => 'auth','namespace'=>'main'], function()
{
    //Profile Controller Route List ************************************
    Route::get('/profile', [
        'as' => 'profile', 'uses' => 'profileController@index'
    ]);
    //Crud Route list
    //change avatar route
    Route::post('/profile/upload', [
        'as' => 'picUploader', 'uses' => 'profileController@uploadPic'
    ]);
    Route::get('/profile/upload', function (){
        abort('403');
    });
    //change avatar route

    Route::post('/profile/update', [
        'as' => 'profileUpdater', 'uses' => 'profileController@profileUpdater'
    ]);
    //Profile Controller Route List ************************************

    //Change Email and Password Route
    Route::post('/profile/privacy', [
        'as' => 'privacyUpdater', 'uses' => 'profileController@privacyUpdater'
    ]);

    //*****************************************
});
//end main panel route*************************************************




// admin Route
Route::group(['middleware' => 'admin','auth','namespace'=>'admin'], function()
{

    //Crud Route list
    Route::post('/category/delSub', [
        'as' => 'deleteSub', 'uses' => 'categoryController@destroySub'
    ]);
    Route::get('/category/showCats', [
        'as' => 'catApi', 'uses' => 'categoryController@showCatsApi'
    ]);
    Route::resource('category','categoryController');
    Route::resource('course','courseController');
    Route::resource('user','userController');
    Route::resource('verifyMaster','masterController');
    Route::resource('course','courseController');
    Route::resource('files','fileController');
    Route::get('/verifyCourses', [
        'as' => 'verifyCourses', 'uses' => 'courseController@verify'
    ]);
    //Crud Route list
});

Route::post('/sendData', [
    'as' => 'UploadData', 'uses' => 'Admin\fileController@store'
]);
// End Admin Route


//shop bag
Route::post('/course/{id}/addToCard',[
    'as' => 'addCard', 'uses' => 'ShopBagController@addToCard'
]);
Route::get('/card',[
    'as' => 'card', 'uses' => 'ShopBagController@getCard'
]);
Route::post('/deleteCard',[
    'as' => 'deleteCard', 'uses' => 'ShopBagController@deleteCardItem'
]);
//shop bag

//confirmBuyAndPayment
Route::get('/confirmBuy',[
    'as' => 'confirm', 'uses' =>'PaymentController@index',
])->middleware('auth');
Route::get('/payment',[
    'as' => 'payment', 'uses' =>'PaymentController@pay',
])->middleware('auth');
Route::get('/payment/paymentCallBack',[
    'as' => 'paymentCallBack', 'uses' =>'PaymentController@paymentCallBack',
])->middleware('auth');

//confirmBuyAndPayment

//Student Route List

Route::group(['middleware' => 'student','auth','namespace'=>'student'], function()
{

    //Crud Route list
    Route::get('/myCourses', [
        'as' => 'studentCourse', 'uses' => 'StudentController@index'
    ]);
    //Crud Route list
});

//End Student Route List
