<?php namespace Klink\DmsPreviews\Thumbnails;

use Illuminate\Support\ServiceProvider;

/**
 * Register the {@see ThumbnailService}
 */
class ThumbnailsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('thumbnails', function ($app) {

			return new ThumbnailsService(app('klinkadapter'));
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['Klink\DmsPreviews\Thumbnails\ThumbnailsService', 'thumbnails'];
	}

}