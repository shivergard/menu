<?php namespace Shivergard\Menu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{

		//config publish
		$this->publishes([
		    __DIR__.'/menu.php' => config_path('menu.php'),
		    realpath(__DIR__ .'/../../migrations') => $this->app->databasePath().'/migrations',
		]);

		require __DIR__ .'/../../routes.php';
		$this->loadViewsFrom(__DIR__.'/../../views', 'menu');
		$this->commands('Shivergard\Menu\MenuConsole');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
