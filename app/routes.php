<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Cache::get('website');
});

Route::get('/cache', function()
{
	Cache::forget('website');

	Cache::rememberForever('website', function() {

		Mail::send('emails.contact.notification', array('name' => 'Test name'), function($message) {
			$message->to('boyhagemann@gmail.com')
				    ->subject('Test email from RexMundiMusic.com');
		});

		return $_ENV['MAILGUN_API'];

	});

	return Redirect::to('/');
});