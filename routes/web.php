<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AdminController::class, 'page'])->name('page');
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
    Route::get('/redirect', [AdminController::class, 'redirect'])->name('redirect')->middleware('auth','verified');
    Route::get('/view_catagory', [AdminController::class, 'view_catagory'])->name('view_catagory');
    Route::post('/add_catagory', [AdminController::class, 'add_catagory'])->name('add_catagory');
    Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory'])->name('delete_catagory');
    Route::get('/view_product', [AdminController::class, 'view_product'])->name('view_product');
    Route::post('/add_product', [AdminController::class, 'add_product'])->name('add_product');
    Route::get('/show_product', [AdminController::class, 'show_product'])->name('show_product');
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
    Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');
    Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('update_product_confirm');
    Route::get('/product_detials/{id}', [AdminController::class, 'product_detials'])->name('product_detials');
    Route::post('/add_cart/{id}', [AdminController::class, 'add_cart'])->name('add_cart');
    Route::get('/show_cart', [AdminController::class, 'show_cart'])->name('show_cart');
    Route::get('/remove_cart/{id}', [AdminController::class, 'remove_cart'])->name('remove_cart');
    Route::get('/cach_order', [AdminController::class, 'cach_order'])->name('cach_order');
    Route::get('/stripe/{totalprice}', [AdminController::class, 'stripe'])->name('stripe');
    Route::post('stripe/{totalprice}', [AdminController::class,'stripePost'])->name('stripe.post');
    Route::get('/order', [AdminController::class, 'order'])->name('order');
    Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');
    Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf'])->name('print_pdf');
    Route::get('/send_email/{id}', [AdminController::class, 'send_email'])->name('send_email');
    Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email'])->name('send_user_email');
    Route::get('/search', [AdminController::class, 'search'])->name('search');
    Route::get('/show_order', [AdminController::class, 'show_order'])->name('show_order');
    Route::get('/cancel_order/{id}', [AdminController::class, 'cancel_order'])->name('cancel_order');
    Route::post('/add_comment', [AdminController::class, 'add_comment'])->name('add_comment');
    Route::post('/add_reply', [AdminController::class, 'add_reply'])->name('add_reply');
    Route::get('/product_search', [AdminController::class, 'product_search'])->name('product_search');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/search_product', [AdminController::class, 'search_product'])->name('search_product');
    Route::get('/category/{keyword}', [AdminController::class, 'products_category'])->name('products_category');
});
