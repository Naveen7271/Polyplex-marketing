<?php

use Illuminate\Http\Request;
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

    if (strtolower($slug) === 'novacard') {
        return redirect()->route('products.novacad');
    }

    if (in_array(strtolower($slug), $brandSlugs, true)) {
        return view('products.brand', ['slug' => strtolower($slug)]);
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
