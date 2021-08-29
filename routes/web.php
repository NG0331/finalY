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
|testClone
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('products/userProduct', function () {
    return view('userProduct');
});

Route::get('/contactus', function () {
    return view('contact');
});




Route::get('products/userProduct', [App\Http\Controllers\HomeController::class, 'show'])->name('user.Product');
//userInsertProduct

Route::get('user/insertProduct', [App\Http\Controllers\UserController::class, 'userInsert'])->name('user.insert');
Route::post('user/insertProduct/store', [App\Http\Controllers\UserController::class, 'userStore'])->name('user.addProduct');
Route::get('user/bookStatus', [App\Http\Controllers\UserController::class, 'showStatus'])->name('show.Status');


//bookCategory
Route::get('admin/insertCategory', [App\Http\Controllers\CategoryController::class, 'insert'])->name('insert.Category');
Route::post('admin/insertCategory/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('add.Category');
Route::get('admin/showCategory', [App\Http\Controllers\CategoryController::class, 'show'])->name('show.Category');
Route::get('admin/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete.Category');
Route::get('admin/product_detail/{id}', [App\Http\Controllers\ProductController::class, 'adminShowProductDetail'])->name('book.detail');
//bookLanguage

Route::get('admin/insertLanguage', [App\Http\Controllers\LanguageController::class, 'insert'])->name('insert.Language');
Route::post('admin/insertLanguage/store', [App\Http\Controllers\LanguageController::class, 'store'])->name('add.Language');
Route::get('admin/showLanguage', [App\Http\Controllers\LanguageController::class, 'show'])->name('show.Language');
Route::get('/deleteLanguage/{id}', [App\Http\Controllers\LanguageController::class, 'delete'])->name('delete.Language');

//bookProduct
Route::get('admin/insertProduct', [App\Http\Controllers\ProductController::class, 'adminInsert'])->name('insert.Product');
Route::post('admin/insertProduct/store', [App\Http\Controllers\ProductController::class, 'adminStore'])->name('add.Product');
Route::get('admin/showProduct', [App\Http\Controllers\ProductController::class, 'showProduct'])->name('show.Product');
Route::get('/editProduct/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit.Product');
Route::get('/deleteProduct/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('delete.Product');
Route::post('/updateproduct', [App\Http\Controllers\ProductController::class, 'update'])->name('update.Product');
Route::post('/searchproduct', [App\Http\Controllers\ProductController::class, 'search'])->name('search.product');


Route::get('products/products', [App\Http\Controllers\ProductController::class, 'show'])->name('products.List');
Route::get('products/secondHand', [App\Http\Controllers\ProductController::class, 'showSecondHand'])->name('secondHand.List');
Route::get('products/product_detail/{id}', [App\Http\Controllers\ProductController::class, 'showProductDetail'])->name('product.detail');

//search function

Route::get('/search',[App\Http\Controllers\ProductController::class, 'index'])->name('search');
Route::get('/autocomplete',[App\Http\Controllers\ProductController::class, 'autocomplete'])->name('autocomplete');

//cart
Route::post('/addToCart', [App\Http\Controllers\CartController::class, 'add'])->name('add.to.cart'); // when user click on add to cart in product detail, id and quantity add to cart
Route::get('/myCart', [App\Http\Controllers\CartController::class, 'show'])->name('my.cart');  //user view all items added to cart
Route::get('/showmyCart', [App\Http\Controllers\CartController::class, 'showMyCart'])->name('show.myCart');
Route::get('/deleteCart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('delete.Cart');

//order
Route::post('/createorder', [App\Http\Controllers\OrderController::class, 'add'])->name('create.order');
Route::get('/myorder', [App\Http\Controllers\OrderController::class, 'show'])->name('show.myOrder');

//productReviews
Route::post('insertReview/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('add.Review');
Route::get('/showReview', [App\Http\Controllers\ReviewController::class, 'show'])->name('show.Review');
Route::get('/insertReview', [App\Http\Controllers\ReviewController::class, 'create'])->name('inser.tReview');
Route::get('/deleteReview/{id}', [App\Http\Controllers\ReviewController::class, 'delete'])->name('delete.Review');



// route for check status of the payment
Route::get('/paywithpaypal', [App\Http\Controllers\PaymentController::class, 'payWithPaypal'])->name('paywithpaypal');
Route::post('/paypal', [App\Http\Controllers\PaymentController::class, 'payWithpaypal'])->name('paypal');

Route::get('/pdfReport', [App\Http\Controllers\PDFController::class, 'pdfReport'])->name('pdfReport');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');

//pending
Route::get('pending/showPendingBook', [App\Http\Controllers\PendingController::class, 'pengdingBook'])->name('showPending.Book');
Route::get('/approvePending/{id}', [App\Http\Controllers\PendingController::class, 'approve'])->name('approve.Book');
Route::get('/rejectPending/{id}', [App\Http\Controllers\PendingController::class, 'reject'])->name('reject.Book');
Route::post('pending/searchUser', [App\Http\Controllers\PendingController::class, 'searchUser'])->name('search.user');
