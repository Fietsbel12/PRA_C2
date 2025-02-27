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
|
*/

/*
2017-10-30 setup for urls
Home:			/
Brand:			/52/AEG/
Type:			/52/AEG/53/Superdeluxe/
Manual:			/52/AEG/53/Superdeluxe/8023/manual/
				/52/AEG/456/Testhandle/8023/manual/

If we want to add product categories later:
Productcat:		/category/12/Computers/
*/

use App\Models\Brand;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LocaleController;
use App\Models\Manual;

// Homepage
Route::get('/', function () {
    $brands = Brand::all()->sortBy('name');
    $name = 'Lotus';
    $topManuals = Manual::orderBy('views', 'desc')->take(10)->get();
    return view('pages.homepage')
        ->with('brands', $brands)
        ->with('name', $name)
        ->with('topManuals', $topManuals);
})->name('home');

// link voor view update
Route::get('link/{manual_id}/',[ManualController::class, 'link']);

Route::get('/manual/{language}/{brand_slug}/', [RedirectController::class, 'brand']);
Route::get('/manual/{language}/{brand_slug}/brand.html', [RedirectController::class, 'brand']);

Route::get('/datafeeds/{brand_slug}.xml', [RedirectController::class, 'datafeed']);

// Locale routes
Route::get('/language/{language_slug}/', [LocaleController::class, 'changeLocale']);

// List of manuals for a brand
Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);

// update voor de brand controller
Route::get('/brands/{brand_id}/{brand_slug}', [BrandController::class, 'edit'])->name('brands.edit');
Route::post('/brands/{brand_id}/{brand_slug}', [BrandController::class, 'update'])->name('brands.update');

// Detail page for a manual
Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show']);

// Generate sitemaps
Route::get('/generateSitemap/', [SitemapController::class, 'generate']);

// update database
Route::Post('brands/{brand_id}/{brand_slug}', [BrandController::class, 'update'])->name('brands.update');

Route::get('/manuals/{id}', [ManualController::class, 'show'])->name('manuals.show');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');

Route::get('/brand/{brand}', [ManualController::class, 'showByBrand'])->name('manuals.byBrand');
