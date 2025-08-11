<?php

use App\Livewire\Pages\About;
use App\Livewire\Pages\About\AboutZhc;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about',AboutZhc::class)->name('pages.about.about_zhc');