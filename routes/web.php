<?php

use App\Livewire\Announcement\AnnouncementIndex;
use App\Livewire\FAQS\Faq;
use App\Livewire\News\NewsIndex;
use App\Livewire\Pages\About;
use App\Livewire\Pages\About\AboutZhc;
use App\Livewire\Pages\About\OrganizationStructure;
use App\Livewire\Pages\Contacts;
use App\Livewire\Pages\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/about',AboutZhc::class)->name('pages.about.about_zhc');
Route::get('/organization-structure',OrganizationStructure::class)->name('pages.about.structure');
Route::get('/contacts',Contacts::class)->name('pages.contacts');
Route::get('/services',Service::class)->name('pages.services');
Route::get('/faqs',Faq::class)->name('pages.faqs');
Route::get('/news',NewsIndex::class)->name('news.index');
Route::get('/public-notice',AnnouncementIndex::class)->name('announcement.index');