<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    $faker = fake();
    
    $chatMessages = $faker->sentences($faker->numberBetween(4,10));

    $recentUsers = User::orderBy('created_at', 'desc')->take(10)->get();

    return view('welcome',[
        'chatMessages'=> $chatMessages,
        'recentUsers'=>$recentUsers,
    ]);
});

Route::get('/about',function() {
    return view('about-us.about-us');

});



Route::get('/dashboard', function () {
    $faker = fake();
    return view('dashboard',[
        'welcomeMessages'=> $faker->paragraphs(5),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
