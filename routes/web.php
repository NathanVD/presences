<?php

use Illuminate\Support\Facades\Route;
use App\Hero_Catch; use App\Hero; use App\About; use App\About_Counter; use App\About_Images;use App\Testimonial;
use App\Testimonials_Title;use App\Contact;use App\Contact_Title;use App\Contact_Map;use App\News_Title;


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

Route::get('/', function () {
    $catch = Hero_Catch::find(1);
    $slides = Hero::all();
    $about = About::find(1);
    $about_counters = About_Counter::find(1);
    $about_images = About_Images::find(1);
    $testimonials_title = Testimonials_Title::find(1);
    $testimonials = Testimonial::all();
    $contact = contact::find(1);
    $contact_titles = Contact_Title::find(1);
    $map = Contact_Map::find(1);
    $newsletter = News_Title::find(1);
    return view('home',compact('catch','slides','about','about_counters','about_images','testimonials_title','testimonials',
    'contact','contact_titles','map','newsletter'));
});


// Admin dashboard
Route::get('/admin', 'AdminController@index')->name('admin');

// Admin Hero
Route::post('/admin/hero/catchphrase/update', 'HeroController@catchUpdate')->name('hero.catch.update');
Route::resource('admin/hero', 'HeroController');

// Admin About
Route::get('/admin/about', 'AboutController@edit')->name('about');
Route::post('/admin/about/update', 'AboutController@update')->name('about.update');
Route::post('/admin/about_images/update', 'AboutController@imagesUpdate')->name('about.images.update');
Route::post('/admin/about_counter/update', 'AboutController@counterUpdate')->name('about.counters.update');

// Admin Testimonials
Route::post('/admin/testimonials/title/update', 'TestimonialController@titleUpdate')->name('testimonials.title.update');
Route::resource('/admin/testimonials', 'TestimonialController');

// Admin Contact
Route::get('/admin/contact', 'ContactController@edit')->name('contact');
Route::post('/admin/contact/update', 'ContactController@update')->name('contact.update');
Route::post('/admin/contact_titles/update', 'ContactController@titlesUpdate')->name('contact.titles.update');
Route::post('/admin/contact_map/update', 'ContactController@mapUpdate')->name('contact.map.update');

// Admin Newsletter
Route::get('/admin/newsletter', 'NewsletterController@edit')->name('newsletter');
Route::post('/admin/newsletter/update', 'NewsletterController@update')->name('newsletter.update');
Route::post('/newsletter/subscribe', 'NewsletterController@subscribe')->name('newsletter.subscribe');
Route::delete('/newsletter/{email}/unsubscribe', 'NewsletterController@unsubscribe')->name('newsletter.unsubscribe');

//Messages
Route::resource('/admin/messages', 'MessageController');
