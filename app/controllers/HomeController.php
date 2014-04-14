<?php

use ZendService\Amazon\S3\S3;

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

		// Store the layout to a html file
		file_put_contents(getcwd() . '/index.html', $this->layout->render());

		// Push all changed filed to S3
		$this->publishToAmazonS3();
	}

	/**
	 * @return Illuminate\View\View;
	 */
	public function tweets()
	{
		try {

			return Cache::rememberForever('tweets', function()  {

				$mentions = Twitter::getMentionsTimeline(array('count' => 8));

				if(!$mentions->errors) {
					throw new Exception();
				}

				return View::make('home.tweets', compact('mentions'));

			});

		}
		catch(Exception $e) {

			return Cache::get('tweets');

		}

	}

	/**
	 * @return Illuminate\View\View;
	 */
	public function contact()
	{
		return View::make('home.contact');
	}

	/**
	 * Write all static files in the public folder to Amazon S3.
	 *
	 * It will check if the file is changed in the last 5 minutes. This is
	 * the same time this cronjob runs, so all files are always in sync.
	 */
	protected function publishToAmazonS3() {

		$path 		= getcwd();
		$objects 	= new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
		$s3 		= App::make('aws')->get('s3');
		$treshold 	= 60*5; // cron runs every 5 minutes...

		foreach ($objects as $fileinfo) {

			if($fileinfo->isFile()) {

				// current file has been modified more recently
				// than any other file we've checked until now
				$path = $fileinfo->getPathname();
				$time = $fileinfo->getMTime();

				$relativePath = str_replace(getcwd(), '', $path);
				$relativePath = str_replace('\\', '/', $relativePath);

				if($time > time() - $treshold) {

					$s3->putObject(array(
						'Bucket'     	=> $_ENV['S3_BUCKET'],
						'Key'        	=> $relativePath,
						'SourceFile' 	=> $path,
						'ACL'    	 	=> 'public-read',
					));
				}
			}
		}

	}

}