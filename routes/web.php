<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeColorController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


// Frontend Routes
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details/{slug}', [FrontendController::class, 'productDetails'])->name('product.details');



// Category Setting
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, 'categorySoftDelete'])->name('category.soft.delete');
Route::get('/category/trash', [CategoryController::class, 'categoryTrash'])->name('category.trash');
Route::get('/category/restore/{id}', [CategoryController::class, 'categoryRestore'])->name('category.restore');
Route::get('/category/parmanent/delete/{id}', [CategoryController::class, 'forceDelete'])->name('category.force.delete');


// Subcategory Setting
Route::get('/subcategory', [SubcategoryController::class, 'subcategory'])->name('subcategory');
Route::post('/subcategory/store', [SubcategoryController::class, 'subcategoryStore'])->name('subcategory.store');
Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}', [SubcategoryController::class, 'subcategoryUpdate'])->name('subcategory.update');


//Brand Setting
Route::get('/brand', [BrandController::class, 'brand'])->name('brand');
Route::post('/brand/store', [BrandController::class, 'brandStore'])->name('brand.store');
Route::get('/brand/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit');
Route::post('/brand/update/{id}', [BrandController::class, 'brandUpdate'])->name('brand.update');
Route::get('/brand/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete');


// Product Setting
Route::get('/all/prouct', [ProductController::class, 'all_product'])->name('all.product');
Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::post('/product/store', [ProductController::class, 'productStore'])->name('product.store');
Route::post('/getSubcategory', [ProductController::class, 'getSubcategory']);
Route::get('/delete/product/{id}', [ProductController::class, 'delete_product'])->name('delete.product');


//Color & Size
 Route::get('/color/size', [SizeColorController::class, 'Color_Size'])->name('color.size');
 Route::post('/color/store', [SizeColorController::class, 'ColorStore'])->name('color.store');
 Route::get('/color/delete/{id}', [SizeColorController::class, 'ColorDelete'])->name('color.delete');
 Route::post('/size/store', [SizeColorController::class, 'SizeStore'])->name('size.store');
 Route::get('/size/delete/{id}', [SizeColorController::class, 'SizeDelete'])->name('size.delete');


// Inventory Routes
Route::get('/inventory/{product_id}', [InventoryController::class, 'inventory'])->name('inventory');
Route::post('/inventory/store', [InventoryController::class, 'inventoryStore'])->name('inventory.store');
Route::get('/inventory/delete/{id}', [InventoryController::class, 'inventoryDelete'])->name('inventory.delete');

//Upcomming Offer Rutes
Route::get('/upcomming/offer', [OfferController::class, 'UpcommingOffer'])->name('upcomming.offer');
Route::post('/upcomming/store', [OfferController::class, 'UpcommingStore'])->name('upcomming.offer.store');


//New Year Offer
Route::get('/newyear/offer', [OfferController::class, 'newOffer'])->name('newyear.offer');
Route::post('/newyear/offer/store', [OfferController::class, 'newOfferStore'])->name('newyear.offer.store');


//Subscriber
Route::get('/newsletter', [SubscriberController::class, 'newsletter'])->name('newsletter');
Route::post('/newsletter/store', [SubscriberController::class, 'newsletterStore'])->name('newsletter.store');
Route::get('/all/subscriber', [SubscriberController::class, 'AllSubcriber'])->name('all.subscriber');
Route::post('/update/subscriber', [SubscriberController::class, 'updateSubcriber'])->name('update.subscriber');
Route::get('/delete/subscriber/{id}', [SubscriberController::class,'delete'])->name('delete.subscriber');


//Logo
Route::get('/logo', [LogoController::class, 'logo'])->name('logo');
Route::post('/update/logo', [LogoController::class, 'Updatelogo'])->name('update.logo');
Route::post('/update/footer/logo', [LogoController::class, 'Updatelogo'])->name('update.footer.logo');


//Social Media
Route::get('/scoial', [SocialController::class, 'scoial'])->name('scoial');
Route::post('/store/scoial', [SocialController::class, 'Storescoial'])->name('store.scoial');
Route::get('/delete/scoial/{id}', [SocialController::class, 'Deletescoial'])->name('delete.scoial');












Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
