<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/','MainController@index')->name('main');

Route::get('/products', 'ProductController@index')->name('product');
Route::get('/products/{product}', 'ProductController@show')->name('show');
Route::get('/products/{product}/add-to-cart', 'ProductController@add_to_cart')->name('add_to_cart');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Koszyk', 'KoszykController@index')->name('koszyk');
Route::delete('/Koszyk/{id}/delete', 'KoszykController@delete')->name('usun_przedmiot');
Route::patch('/Koszyk/{id}/plus', 'KoszykController@zwieksz')->name('plus');
Route::patch('/Koszyk/{id}/minus', 'KoszykController@odejmij')->name('minus');

Route::get('/Koszyk/rabat', 'KoszykController@rabat')->name('rabat');
Route::get('/Koszyk/usunrabat', 'KoszykController@usunRabat')->name('usunRabat');

Route::post('/zamowienia/dodaj', 'OrderController@store')->name('dodajzamowienie');
Route::get('/zamowienia', 'OrderController@daneOsobowe')->name('zamow');
Route::get('/zamowienia/status', 'OrderController@index')->name('zamowieniastatus');

Route::get('/Regulamin', 'RegulaminController@index')->name('regulamin');

Route::get('/Kontakt', 'KontaktController@index')->name('kontakt');
Route::post('/Kontakt', 'KontaktController@create')->name('wiadomosc');


Route::get('/Ustawienia', 'UserController@index')->name('ustawienia');
Route::patch('/Ustawienia/zmiana', 'UserController@update')->name('zmiana');

Route::get('/Admin','DashboardController@index')->name('dashboard')->middleware('auth','admin');

Route::get('/Admin/Użytkownicy','DashboardController@users')->name('users')->middleware('auth','admin');
Route::patch('/Admin/Użytkownicy/{user}','DashboardController@nadaj')->name('nadaj')->middleware('auth','admin');


Route::get('/Admin/Produkty/Usuniete/{product}/przywroc','ProductEditController@przywroc')->name('przywroc')->middleware('auth','admin');
Route::get('/Admin/Produkty/Usuniete/{product}','ProductEditController@deletedshow')->name('deletedproductShow')->middleware('auth','admin');
Route::get('/Admin/Produkty/Usuniete','ProductEditController@deleted')->name('productDeleted')->middleware('auth','admin');
Route::get('/Admin/Produkty/Wszystkie','ProductEditController@index')->name('productEdit')->middleware('auth','admin');
Route::post('/Admin/Produkty/Wszystkie/{product}/add-photo','ProductEditController@addPhoto')->name('addPhoto')->middleware('auth','admin');
Route::get('/Admin/Produkty/Wszystkie/{product}/delete-photo/{photo}','ProductEditController@deletePhoto')->name('deletePhoto')->middleware('auth','admin');
Route::delete('/Admin/Produkty/Wszystkie/{product}/delete-product','ProductEditController@delete')->name('deleteProduct')->middleware('auth','admin');

Route::get('/Admin/Produkty/Wszystkie/{product}','ProductEditController@edit')->name('productShow')->middleware('auth','admin');
Route::patch('/Admin/Produkty/{product}','ProductEditController@update')->name('update')->middleware('auth','admin');
Route::get('/Admin/Produkty/Nowy','ProductEditController@ProductNew')->name('productNew')->middleware('auth','admin');
Route::get('/Admin/Produkty/Nowy/create','ProductEditController@create')->name('productNewAdd')->middleware('auth','admin');

Route::get('/Admin/Kategorie/Wszystkie','CategoryController@index')->name('categoryEdit')->middleware('auth','admin');
Route::get('/Admin/Kategorie/Wszystkie/{category}','CategoryController@edit')->name('categoryShow')->middleware('auth');
Route::patch('/Admin/Kategorie/Wszystkie/{category}/update','CategoryController@update')->name('categoryUpdate')->middleware('auth','admin');
Route::delete('/Admin/Kategorie/Wszystkie/{category}/delete','CategoryController@delete')->name('categoryDelete')->middleware('auth','admin');
Route::get('/Admin/Kategorie/Nowy','CategoryController@CategoryNew')->name('categoryNew')->middleware('auth','admin');
Route::get('/Admin/Kategorie/Nowy/create','CategoryController@create')->name('categoryNewAdd')->middleware('auth','admin');


Route::get('/Admin/Zamowienia','OrderInfoController@index')->name('orders')->middleware('auth','admin');
Route::get('/Admin/Zamowienia/{order}','OrderInfoController@show')->name('orderShow')->middleware('auth','admin');
Route::patch('/Admin/Zamowienia/{order}','OrderInfoController@update')->name('changeStatus')->middleware('auth','admin');

Route::get('/Admin/Rabaty','CouponController@index')->name('rabaty')->middleware('auth','admin');
Route::get('/Admin/Rabaty/Nowy','CouponController@RabatNew')->name('NowyRabat')->middleware('auth','admin');
Route::get('/Admin/Rabaty/Nowy/create','CouponController@create')->name('NowyRabatAdd')->middleware('auth','admin');
Route::delete('/Admin/Rabaty/Nowy/{coupon}/delete','CouponController@delete')->name('deleteCoupon')->middleware('auth','admin');


Route::get('/Admin/Dostawy','ShippingController@index')->name('shippings')->middleware('auth','admin');
Route::get('/Admin/Dostawy/nowy','ShippingController@new')->name('shippingNew')->middleware('auth','admin');
Route::get('/Admin/Dostawy/nowy/zrob','ShippingController@create')->name('shippingAdd')->middleware('auth','admin');
Route::get('/Admin/Dostawy/{shipping_id}','ShippingController@show')->name('shipShow')->middleware('auth','admin');
Route::patch('/Admin/Dostawy/{shipping_id}/update','ShippingController@update')->name('shippingUpdate')->middleware('auth','admin');
Route::delete('/Admin/Dostawy/{shipping_id}/delete','ShippingController@delete')->name('shippingDelete')->middleware('auth','admin');



Route::get('/Admin/Newsletter','NewsController@index')->name('newsLetter')->middleware('auth','admin');
Route::post('/Admin/Newsletter/send','NewsController@mail')->name('senNewsletter')->middleware('auth','admin');


//Route::get('/Admin/mainsite','MainSiteController@index')->name('MainSite')->middleware('auth','admin');
//Route::patch('/Admin/mainsite/{id}/edit','MainSiteController@edit')->name('MainSiteEdit')->middleware('auth','admin');



Auth::routes();

