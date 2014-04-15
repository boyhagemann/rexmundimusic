<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DeployCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'deploy:s3';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create html and deploy to S3';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		try {

			$this->info('Start deploying...');

			$view = API::get('/');

			$this->info('HTML rendered!');


			$path = public_path('index.html');

			$this->info(sprintf('Saving file: %s', $path));

			// Store the layout to a html file
			file_put_contents($path, $view->render());

			$this->info('index.html saved!');

			$this->info('Publishing to S3...');

			// Push all changed filed to S3
			$this->publishToAmazonS3();

			$this->info('Deployment successful!');

		}
		catch(Exception $e) {

			$this->error(sprintf('Error in deploying: %s', $e->getMessage()));

		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

	/**
	 * Write all static files in the public folder to Amazon S3.
	 *
	 * It will check if the file is changed in the last 5 minutes. This is
	 * the same time this cronjob runs, so all files are always in sync.
	 */
	protected function publishToAmazonS3() {

		$path 		= public_path();
		$objects 	= new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
		$s3 		= App::make('aws')->get('s3');
		$treshold 	= 60*5; // cron runs every 5 minutes...

		foreach ($objects as $fileinfo) {

			if($fileinfo->isFile()) {

				// current file has been modified more recently
				// than any other file we've checked until now
				$path = $fileinfo->getPathname();
				$time = $fileinfo->getMTime();

				$relativePath = str_replace(public_path(), '', $path);
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
