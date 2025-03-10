<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HighlightedQuoteController;
use App\Http\Controllers\KindleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReadingProgressController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('authors', AuthorController::class);
    Route::resource('books', BookController::class);
    Route::resource('bookmarks', BookmarkController::class);
    Route::resource('downloads', DownloadController::class);
    Route::resource('highlightedQuotes', HighlightedQuoteController::class);
    Route::resource('kindles', KindleController::class);
    Route::resource('publishers', PublisherController::class);
    Route::resource('reading_progress', ReadingProgressController::class);
    Route::post('/books/{book}/kindles/{kindle}/attach', [BookController::class, 'attachKindle'])->name('books.attachKindle');
    Route::post('/books/{book}/kindles/{kindle}/detach', [BookController::class, 'detachKindle'])->name('books.detachKindle');
    Route::post('/books/{book}/authors/{author}/attach', [BookController::class, 'attachAuthor'])->name('books.attachAuthor');
    Route::post('/books/{book}/authors/{author}/detach', [BookController::class, 'detachAuthor'])->name('books.detachAuthor');
    Route::post('/kindles/{kindle}/books/{book}/attach', [KindleController::class, 'attachBook'])->name('kindles.attachBook');
    Route::post('/kindles/{kindle}/books/{book}/detach', [KindleController::class, 'detachBook'])->name('kindles.detachBook');


});

require __DIR__.'/auth.php';
