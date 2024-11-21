<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()
        ->route('books.index');
});


Route::get('/home', function(){

});

Route::resource('books',
    BookController::class)
    ->only(['index', 'show']);

Route::resource('books.reviews',
    ReviewController::class)
    ->scoped(['review' => 'book'])
    ->only(['create', 'store']);


Route::get('/test-scopes-last', function () {
    $booksLastMonth = App\Models\Book::popular(now()->subMonth(), now())->get();
//    $booksLast6Months = App\Models\Book::popular(now()->subMonths(6), now())->get();

    return response()->json([
        'booksLastMonth' => $booksLastMonth
//        'booksLast6Months' => $booksLast6Months,
    ]);
});


Route::get('/test-scopes-last6', function () {
//    $booksLastMonth = App\Models\Book::popular(now()->subMonth(), now())->get();
    $booksLast6Months = App\Models\Book::popular(now()->subMonths(6), now())->get();

    return response()->json([
//        'booksLastMonth' => $booksLastMonth,
        'booksLast6Months' => $booksLast6Months
    ]);
});
