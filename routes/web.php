<?php



use App\Http\Controllers\AboutusController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginDash;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProfileDashController;
use App\Http\Controllers\VendorrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PayPalController;













/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


//-----------DASHBOARD---------
Route::resource('/category', CategoryContoller::class)->middleware('isLoggedIn');
Route::resource('/product', ProductController::class)->middleware('isLoggedIn');
Route::resource('/users', UserController::class)->middleware('isLoggedIn');
Route::resource('/admin', AdminController::class)->middleware('isLoggedIn');
Route::resource('/dash', DashController::class)->middleware('isLoggedIn');
Route::resource('/profileAdmin', ProfileDashController::class)->middleware('isLoggedIn');
// Route::get('/image',[ProfileDashController::class,'image']);
Route::resource('/logo', VendorrController::class)->middleware('isLoggedIn');
// Route::resource('/discount',DiscountController::class)->middleware('isLoggedIn');
// -------logindash--------
Route::get('/logindash', [LoginDash::class, 'login'])->name('logindash')->middleware('alreadyLoggedIn');
Route::post('/logindashboard', [LoginDash::class, 'logindash'])->name('dash');
Route::get('/dashboard', [LoginDash::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [LoginDash::class, 'logout'])->name('logoutt');








//--------pages------------
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/aboutus', [AboutusController::class, 'index'])->name('about');
Route::get('/contactus', [ContactusController::class, 'index'])->name('contact');
Route::get('/shop/{id}', [ShopController::class, 'index'])->name('allproduct');
Route::get('/searchproducts/{id}', [ShopController::class, 'search'])->name('search.products');
Route::get('/detail/{id}', [ShopController::class, 'singleproduct'])->name('productdetail');
// ----------cart-------
Route::post('/detail/add/{idcart}', [ShopController::class, 'addtocart'])->name('addcart');
Route::get('/cart', [CartController::class, 'index'])->name('cartt');
Route::delete('/deletecart/{id}', [CartController::class, 'destroy'])->name('deletecart');
Route::patch('/updatecart/{id}', [CartController::class, 'update'])->name('updatecart');

// -------checkout-------
Route::get('/checkout', [CheckoutController::class, 'index'])->name('showcheckout')->middleware('auth', 'verified');
Route::get('/checkout/create/{total_price}', [CheckoutController::class, 'store'])->name('checkout');





// paypal route
Route::post('process-transaction', [PayPalController::class, 'payment'])->name('processTransaction');
Route::get('success/{user_id}', [PayPalController::class, 'success'])->name('success');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('cancel');

//social login by google
Route::get('/googlelogin', [ProfileController::class, 'googleLogin'])->name('googlelogin');
Route::get('/auth/google/callback', [ProfileController::class, 'googleHandle']);

// contact us
Route::get('contact-us', [ContactusController::class, 'index']);
Route::post('contact-us', [ContactusController::class, 'store'])->name('contact.us.store');