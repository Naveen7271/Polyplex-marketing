<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/products/{slug}', function (string $slug) {
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
