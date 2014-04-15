<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.default';

	/**
	 *
	 */
	public function index()
	{        
		// Add the tweets to the layout
		$this->layout->tweets = $this->tweets();

		// Show a contact form
		$this->layout->contact = $this->contact();
	}

	/**
	 * @return Illuminate\View\View;
	 */
	public function tweets()
	{
		try {

			$mentions = Twitter::getMentionsTimeline(array('count' => 8));

			if(isset($mentions->errors)) {
				throw new Exception($mentions->errors[0]->message);
			}

			Cache::forever('tweets', $mentions);

		}
		catch(Exception $e) {

			$mentions =  Cache::get('tweets');

		}

		return View::make('home.tweets', compact('mentions'));

	}

	/**
	 * @return Illuminate\View\View;
	 */
	public function contact()
	{
		return View::make('home.contact');
	}

}