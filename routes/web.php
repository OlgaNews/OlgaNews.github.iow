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
/*Route::get('/', function () {
    return view('welcome');
});*/
use Illuminate\Auth\Middleware\Authenticate;
        
Route::get('/','IndexController@Index')->name('page');
//Route::get('page','IndexController@Index')->name('page');
Route::get('categry_{cat}/post_{id}','IndexController@show')->name('articleShow');
Route::get('addcoment/{id}','IndexController@acom')->name('addComment')->middleware('auth');
Route::post('addcoment/{newsid}{id_u}','IndexController@scom')->name('commentStore')->middleware('auth');
Route::get('category','IndexController@category')->name('category');
Route::get('category_{id}','IndexController@categoryshow')->name('categoryShow');
Route::get('tags','IndexController@tag')->name('tag');
Route::get('tags/tag_{id}','IndexController@tagshow')->name('tagShow');
Route::post('tags/tag','IndexController@tagshowurl')->name('tagShowUrl');
Route::get('about','IndexController@about')->name('about');
Route::get('contact','IndexController@contact')->name('contact')->middleware('auth');
Route::post('contact','IndexController@contactpost')->name('contactPost')->middleware('auth');
Route::get('person','IndexController@person')->name('Person')->middleware('auth');
//Route::get('register','RegisterController@creat')->name('register');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
Route::get('/','Admin\AdminController@deshboard')->name('admin');
Route::get('add','Admin\AdminController@add')->name('add');
Route::post('add','Admin\AdminController@store')->name('articleStore');
Route::get('delete','Admin\AdminController@delete')->name('delete');
Route::post('delete/{id}','Admin\AdminController@artdelete')->name('artdelete');
Route::post('adelete/{id}','Admin\AdminController@delstore')->name('delstore');
Route::get('edit','Admin\AdminController@edit')->name('edit');
Route::post('edit/{id}','Admin\AdminController@editpost')->name('editPost');
Route::post('editors/{id}','Admin\AdminController@editstore')->name('editStore');
Route::get('add_cat','Admin\AdminController@addcat')->name('addCat');
Route::post('add_cat','Admin\AdminController@storecat')->name('storeCat');
Route::get('delete_com','Admin\AdminController@deletecom')->name('deleteCom');
Route::post('delete_com/{id}','Admin\AdminController@comdelete')->name('comDelete');
Route::post('delete_comm/{id}','Admin\AdminController@delcom')->name('delCom');
Route::get('delete_user','Admin\AdminController@deleteuser')->name('deleteUser');
Route::post('delete_user/{id}','Admin\AdminController@userdelete')->name('userDelete');
Route::post('delete_userr/{id}','Admin\AdminController@deluser')->name('delUser');

});
Route::get('profile/{id}','UserController@ShowProfile');
/*Route::group(array('before' => 'admin.auth'), function()
{
	Route::get('dashboard', function()
	{
		return View::make('login.dashboard');
	});

	Route::resource('articles', 'AdminController@articles');

	Route::resource('categories', 'AdminController@categories');

});

Route::filter('admin.auth', function() 
{
	if (Auth::guest()) {
		return Redirect::to('/page');
	}
});
*/


Auth::routes();

Route::get('/home', 'IndexController@index');
