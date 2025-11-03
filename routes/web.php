<?php

use App\Http\Middleware\LogVisit;
use App\Livewire\Announcement\AnnouncementIndex;
use App\Livewire\FAQS\Faq;
use App\Livewire\Index;
use App\Livewire\News\NewsIndex;
use App\Livewire\News\NewsShow;
use App\Livewire\Pages\About;
use App\Livewire\Pages\About\AboutZhc;
use App\Livewire\Pages\About\DirectorsMessage;
use App\Livewire\Pages\About\OrganizationStructure;
use App\Livewire\Pages\Contacts;
use App\Livewire\Pages\Service;
use App\Livewire\Projects\ProjectShow;
use Illuminate\Support\Facades\Route;

Route::middleware(["web"])->group(function () {
    Route::get('/', Index::class)->middleware(LogVisit::class)->name('index');
    Route::get('/about/about_us', AboutZhc::class)->name('about_zhc');
    Route::get('/about/directors-message', DirectorsMessage::class)->name('director-message');
    Route::get('/about/organization-structure', OrganizationStructure::class)->name('structure');
    Route::get('/contacts', Contacts::class)->name('pages.contacts');
    Route::get('/services', Service::class)->name('pages.services');
    Route::get('/faqs', Faq::class)->name('pages.faqs');
    Route::get('/news/all', NewsIndex::class)->name('news.index');
    Route::get('/news/{news}', NewsShow::class)->name('news.show');
    Route::get('/public-notice', AnnouncementIndex::class)->name('announcement.index');
    Route::get('project/{status}/{slug}', ProjectShow::class)
        ->whereIn('status', ['ongoing', 'completed', 'upcoming']) // whitelist values
        ->where('page', '[A-Za-z0-9-_]+')
        ->name('projects.show');
});
