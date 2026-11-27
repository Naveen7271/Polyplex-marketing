<?php

use App\Http\Controllers\Admin\AdminApplicationController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBrandCompatibilityController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminBrandFeatureController;
use App\Http\Controllers\Admin\AdminProductApplicationCategoryController;
use App\Http\Controllers\Admin\AdminProductApplicationCategoryItemController;
use App\Http\Controllers\Admin\AdminProductBenefitController;
use App\Http\Controllers\Admin\AdminProductBrandController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Models\Brand;
use App\Support\BlogData;
use App\Support\NewsData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

// ─── Admin Routes ────────────────────────────────────────────────────────────

Route::prefix('admin')->name('admin.')->group(function () {

    // Auth (no middleware)
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminProductController::class, 'dashboard'])->name('dashboard');

        // Products CRUD
        Route::resource('products', AdminProductController::class)->except(['show']);

        // Brands CRUD
        Route::resource('brands', AdminBrandController::class)->except(['show']);

        // Applications CRUD (Diverse Applications)
        Route::resource('applications', AdminApplicationController::class)->except(['show']);

        // Brand Features (nested)
        Route::prefix('brands/{brand}/features')->name('brands.features.')->group(function () {
            Route::post('/', [AdminBrandFeatureController::class, 'store'])->name('store');
            Route::put('{feature}', [AdminBrandFeatureController::class, 'update'])->name('update');
            Route::delete('{feature}', [AdminBrandFeatureController::class, 'destroy'])->name('destroy');
        });

        // Brand Compatibilities (nested)
        Route::prefix('brands/{brand}/compatibilities')->name('brands.compatibilities.')->group(function () {
            Route::post('/', [AdminBrandCompatibilityController::class, 'store'])->name('store');
            Route::put('{compatibility}', [AdminBrandCompatibilityController::class, 'update'])->name('update');
            Route::delete('{compatibility}', [AdminBrandCompatibilityController::class, 'destroy'])->name('destroy');
        });

        // Product Brands (attach / detach / create)
        Route::prefix('products/{product}/brands')->name('products.brands.')->group(function () {
            Route::post('/', [AdminProductBrandController::class, 'attach'])->name('attach');
            Route::delete('{brand}', [AdminProductBrandController::class, 'detach'])->name('detach');
            Route::post('create', [AdminProductBrandController::class, 'storeAndAttach'])->name('store');
        });

        // Product Applications (nested)
        Route::prefix('products/{product}/applications')->name('products.applications.')->group(function () {
            Route::get('create', [AdminApplicationController::class, 'create'])->name('create');
            Route::post('/', [AdminApplicationController::class, 'store'])->name('store');
            Route::get('{application}/edit', [AdminApplicationController::class, 'edit'])->name('edit');
            Route::put('{application}', [AdminApplicationController::class, 'update'])->name('update');
            Route::delete('{application}', [AdminApplicationController::class, 'destroy'])->name('destroy');
        });

        // Product Key Benefits (nested)
        Route::prefix('products/{product}/benefits')->name('products.benefits.')->group(function () {
            Route::post('/', [AdminProductBenefitController::class, 'store'])->name('store');
            Route::put('{benefit}', [AdminProductBenefitController::class, 'update'])->name('update');
            Route::delete('{benefit}', [AdminProductBenefitController::class, 'destroy'])->name('destroy');
        });

        // Product Application Categories & Items (nested)
        Route::prefix('products/{product}/application-categories')->name('products.application-categories.')->group(function () {
            Route::post('/', [AdminProductApplicationCategoryController::class, 'store'])->name('store');
            Route::put('{category}', [AdminProductApplicationCategoryController::class, 'update'])->name('update');
            Route::delete('{category}', [AdminProductApplicationCategoryController::class, 'destroy'])->name('destroy');

            Route::prefix('{category}/items')->name('items.')->group(function () {
                Route::post('/', [AdminProductApplicationCategoryItemController::class, 'store'])->name('store');
                Route::put('{item}', [AdminProductApplicationCategoryItemController::class, 'update'])->name('update');
                Route::delete('{item}', [AdminProductApplicationCategoryItemController::class, 'destroy'])->name('destroy');
            });
        });
    });
});

// ─── Public Routes ───────────────────────────────────────────────────────────

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/about-us', function () {
    return redirect()->route('about');
});

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/product', function () {
    return redirect()->route('products');
});

Route::get('/industries', function () {
    return view('industries');
})->name('industries');

Route::get('/industry', function () {
    return redirect()->route('industries');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/contact-us', function () {
    return redirect()->route('contact');
});

Route::get('/careers', function () {
    return view('careers');
})->name('careers');

Route::get('/career', function () {
    return redirect()->route('careers');
});

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/blogs', function () {
    return redirect()->route('blog');
});

Route::get('/blog-and-news', function () {
    return redirect()->route('blog');
});

Route::get('/news', function () {
    return redirect()->route('blog', ['tab' => 'news']);
})->name('news');

Route::get('/news/{slug}', function (string $slug) {
    $article = NewsData::find($slug);

    return view('news.show', [
        'slug' => $slug,
        'article' => $article,
    ]);
})->name('news.show');

Route::get('/blog/{slug}', function (string $slug) {
    $post = BlogData::find($slug);

    return view('blog.show', [
        'slug' => $slug,
        'post' => $post,
    ]);
})->name('blog.show');

Route::get('/blogs/{slug}', function (string $slug) {
    return redirect()->route('blog.show', ['slug' => $slug]);
});

Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:50',
        'message' => 'required|string|max:5000',
    ]);

    return back()->with('success', 'Thank you for reaching out! Your message has been sent successfully. Our team will get back to you shortly.');
})->name('contact.submit');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/privacy', function () {
    return redirect()->route('privacy-policy');
})->name('privacy');

Route::get('/terms-of-use', function () {
    return view('terms-of-use');
})->name('terms-of-use');

Route::get('/terms', function () {
    return redirect()->route('terms-of-use');
})->name('terms');

Route::get('/products/{slug}', function (string $slug) {
    $brandSlugs = [
        'novajet',
        'novalife',
        'saraprint',
        'novacad',
        'novadom',
        'novasharp',
        'novasign',
        'novastick',
        'polijet',
        'posijet',
        'novatrace',
    ];

    $normalizedSlug = strtolower($slug);

    if ($normalizedSlug === 'novacard') {
        return redirect()->route('products.novacad');
    }

    $isBrand = in_array($normalizedSlug, $brandSlugs, true);

    if (! $isBrand) {
        try {
            $isBrand = Schema::hasTable('brands')
                && Brand::where('slug', $normalizedSlug)->exists();
        } catch (Throwable) {
            $isBrand = false;
        }
    }

    if ($isBrand) {
        return view('products.brand', ['slug' => $normalizedSlug]);
    }

    return view('products.show', ['slug' => $slug]);
})->name('products.show');

Route::get('/product/{slug}', function (string $slug) {
    return redirect()->route('products.show', ['slug' => $slug]);
});

// Direct alias routes for internal product pages
Route::get('/non-tear-media', function () {
    return view('products.show', ['slug' => 'non-tear-media']);
})->name('products.non-tear-media');

Route::get('/gloss-art-paper-media', function () {
    return view('products.show', ['slug' => 'gloss-art-paper-media']);
})->name('products.gloss-art-paper-media');

Route::get('/gloss-art-paper', function () {
    return redirect()->route('products.gloss-art-paper-media');
});

Route::get('/inkjet-photo-media', function () {
    return view('products.show', ['slug' => 'inkjet-photo-media']);
})->name('products.inkjet-photo-media');

Route::get('/inkjet-photo', function () {
    return redirect()->route('products.inkjet-photo-media');
});

Route::get('/digital-labels', function () {
    return view('products.show', ['slug' => 'digital-labels']);
})->name('products.digital-labels');

Route::get('/multi-purpose-labels', function () {
    return view('products.show', ['slug' => 'multi-purpose-labels']);
})->name('products.multi-purpose-labels');

Route::get('/multi-purpose-label', function () {
    return redirect()->route('products.multi-purpose-labels');
});

Route::get('/digital-wide-format-media', function () {
    return view('products.show', ['slug' => 'digital-wide-format-media']);
})->name('products.digital-wide-format-media');

Route::get('/digital-wide-format', function () {
    return redirect()->route('products.digital-wide-format-media');
});

Route::get('/reprographic-media', function () {
    return view('products.show', ['slug' => 'reprographic-media']);
})->name('products.reprographic-media');

Route::get('/reprographic', function () {
    return redirect()->route('products.reprographic-media');
});

Route::get('/polyester-offset-plates', function () {
    return view('products.show', ['slug' => 'polyester-offset-plates']);
})->name('products.polyester-offset-plates');

Route::get('/polyester-offset', function () {
    return redirect()->route('products.polyester-offset-plates');
});

Route::get('/laser-and-inkjet-positive-films', function () {
    return view('products.show', ['slug' => 'laser-and-inkjet-positive-films']);
})->name('products.laser-and-inkjet-positive-films');

Route::get('/laser-inkjet-positive-films', function () {
    return redirect()->route('products.laser-and-inkjet-positive-films');
});

// Direct alias routes for brand and product items
Route::get('/novajet', function () {
    return view('products.brand', ['slug' => 'novajet']);
})->name('products.novajet');

Route::get('/novalife', function () {
    return view('products.brand', ['slug' => 'novalife']);
})->name('products.novalife');

Route::get('/saraprint', function () {
    return view('products.brand', ['slug' => 'saraprint']);
})->name('products.saraprint');

Route::get('/novacad', function () {
    return view('products.brand', ['slug' => 'novacad']);
})->name('products.novacad');

Route::get('/novacard', function () {
    return redirect()->route('products.novacad');
});

Route::get('/novadom', function () {
    return view('products.brand', ['slug' => 'novadom']);
})->name('products.novadom');

Route::get('/novasharp', function () {
    return view('products.brand', ['slug' => 'novasharp']);
})->name('products.novasharp');

Route::get('/novasign', function () {
    return view('products.brand', ['slug' => 'novasign']);
})->name('products.novasign');

Route::get('/novastick', function () {
    return view('products.brand', ['slug' => 'novastick']);
})->name('products.novastick');

Route::get('/polijet', function () {
    return view('products.brand', ['slug' => 'polijet']);
})->name('products.polijet');

Route::get('/posijet', function () {
    return view('products.brand', ['slug' => 'posijet']);
})->name('products.posijet');

Route::get('/novatrace', function () {
    return view('products.brand', ['slug' => 'novatrace']);
})->name('products.novatrace');

// Dynamic fallback route for brands created in the admin panel
Route::get('/{slug}', function (string $slug) {
    $normalizedSlug = strtolower($slug);

    try {
        if (Schema::hasTable('brands') && Brand::where('slug', $normalizedSlug)->exists()) {
            return view('products.brand', ['slug' => $normalizedSlug]);
        }
    } catch (Throwable) {
        // Fall through to 404 when database is unavailable
    }

    abort(404);
})->where('slug', '[A-Za-z0-9\-_]+')->name('brands.show');
