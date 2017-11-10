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
use App\Models\Article;

//====================================== Authentification ======================================
Auth::routes();

Route::post('/login/custom', 
        [
            'uses'=>'LoginController@login',
            'as'=> 'login.custom'
]);

Route::group(['middleware'=> 'auth'],function(){
    Route::get('/home', function () {
        return view('home');
    })->name('home');

      Route::get('/pageAdmin', function () {
        return view('pageAdmin');
    })->name('pageAdmin');
});

Route::get('/', function () {
     $articles = Article::paginate(5);
    return view('acceuil', compact('articles'));
});

Route::get('/index', function () {
     $articles = Article::paginate(5);
    return view('index', compact('articles'));
});

Route::get('/home', 'HomeController@index')->name('home');

//========================================= Route Article======================================
Route::get('/articles/create', 'ArticleController@create')->name('articles.create');
Route::post('articles/store', 'ArticleController@store')->name('articles.store');
Route::get('/articles/liste', 'ArticleController@index')->name('articles.liste');
Route::get('articles/show/{id}', 'ArticleController@show')->name('articles.show');
Route::get('/articles/edit/{id}', 'ArticleController@edit')->name('articles.edit');
Route::put('/articles/update/{id}', 'ArticleController@update')->name('articles.update');
Route::get('/articles/delete/{id}', 'ArticleController@destroy')->name('articles.delete');
Route::get('/articles/entrer', 'ArticleController@entrer')->name('articles.entrer');
Route::get('/articles/search', 'ArticleController@search')->name('articles.search');
Route::get('/articles/sortie', 'ArticleController@sortie')->name('articles.sortie');
Route::get('/articles/stock', 'ArticleController@stockbas')->name('articles.stock');
Route::get('/articles/statistique', 'ArticleController@statistique')->name('articles.statistique');


//==========================================Route Categorie======================================
Route::get('/categories/liste', 'CategorieController@index')->name('categories.liste');
Route::post('/categories/store', 'CategorieController@store')->name('categories.store');
Route::get('/categories/edit/{id}', 'CategorieController@edit')->name('categories.edit');
Route::put('/categories/update/{id}', 'CategorieController@update')->name('categories.update');
Route::get('/categories/delete/{id}', 'CategorieController@destroy')->name('categories.delete');

//============================================== Route Users======================================
Route::post('users/store', 'UserController@store')->name('articles.store');
Route::get('/users/liste', 'UserController@index')->name('users.liste');
Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
Route::put('/users/update/{id}', 'UserController@update')->name('users.update');
Route::get('users/show/{id}', 'UserController@show')->name('users.show');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::get('/users/delete/{id}', 'UserController@destroy')->name('users.delete');


//=========================================Route Fournisseur======================================
Route::get('/fournisseurs/create','FournisseurController@create')->name('fournisseurs.create');
Route::post('/fournisseurs/store', 'FournisseurController@store')->name('fournisseurs.store');
Route::get('/fournisseurs/liste', 'FournisseurController@index')->name('fournisseurs.liste');
Route::get('fournisseurs/show/{id}', 'FournisseurController@show')->name('fournisseurs.show');
Route::get('/fournisseurs/edit/{id}', 'FournisseurController@edit')->name('fournisseurs.edit');
Route::put('/fournisseurs/update/{id}', 'FournisseurController@update')->name('fournisseurs.update');
Route::get('/fournisseurs/delete/{id}', 'FournisseurController@destroy')->name('fournisseurs.delete');

//========================================== Route Client =============================================
Route::get('/clients/liste', 'ClientController@index')->name('clients.liste');
Route::get('clients/show/{id}', 'ClientController@show')->name('clients.show');
Route::get('clients/profile', 'ClientController@profile')->name('clients.profile');
Route::get('/clients/creerCommande', 'ClientController@creerCommande')->name('clients.creerCommande');
Route::put('clients/ajouterCommande', 'ClientController@ajouterCommande')->name('clients.ajouterCommande');
Route::get('clients/listeCommande', 'ClientController@listerCommande')->name('clients.listeCommande');
Route::get('/clients/delete/{id}', 'ClientController@destroy')->name('clients.delete');
Route::get('/clients/historique', 'ClientController@historique')->name('clients.historique');


//========================================== Route Commande =============================================
Route::get('commandes/list', 'CommandeController@index')->name('commandes.list');
Route::get('commandes/show/{id}', 'CommandeController@show')->name('commandes.show');

//========================================== Route Achat =============================================

Route::get('/export/achat_xls', 'AchatController@export')->name('export.achat_xls');

//========================================== Route Facture=============================================

Route::put('factures/store', 'FactureController@store')->name('factures.store');
Route::get('/factures/liste', 'FactureController@index')->name('factures.liste');
Route::get('/factures/show/{id}', 'FactureController@show')->name('factures.show');

Route::get('/export/facture_xls', 'FactureController@export')->name('export.facture_xls');


//=============================================== Route Payment ======================================

Route::get('paywithpaypal', 'PaymentController@payWithPaypal')->name('paywithpaypal');
Route::post('paypal', 'PaymentController@postPaymentWithpaypal')->name('paypal');
Route::get('paypal', 'PaymentController@getPaymentStatus')->name('payment.status');
