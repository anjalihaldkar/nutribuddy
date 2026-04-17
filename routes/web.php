<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index')->name('home');
Route::view('/about', 'pages.about-us')->name('about');
Route::view('/product', 'pages.product')->name('product');
Route::view('/diet-chart', 'pages.diet-chart')->name('diet_chart');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/checkout', 'pages.checkout')->name('checkout');
Route::view('/change-password', 'pages.user-panel.change-password')->name('change-password');
Route::view('/order', 'pages.user-panel.order')->name('order');
Route::view('/personal-info', 'pages.user-panel.personal-info')->name('personal-info');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/return-policy', 'pages.return-policy')->name('return-policy');
Route::view('/subscription', 'pages.user-panel.subscription')->name('subscription');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/user-return', 'pages.user-panel.user-return')->name('user-return');
Route::view('/userdashboard', 'pages.user-panel.userdashboard')->name('userdashboard');
