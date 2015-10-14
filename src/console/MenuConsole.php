<?php namespace Shivergard\Menu;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;
use \Schema;
use \Config;
use \DB;
use \Artisan;

use Illuminate\Container\Container;

class MenuConsole extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'menu:init';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Menu init.';


	private $role_id = false;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Container $app)
	{
		$this->app = $app;
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info('¯\(°_o)/¯');
		Model::unguard();
		if (class_exists('App\Model\Akwilon\Roles')){
			$this->createRole("App\Model\Akwilon\Roles");
		}else if (class_exists('App\User\Roles')){
			$this->createRole("App\User\Roles");
		}
		if (DB::table('users')->where('name' , 'menu')->select('id')->count() == 0){

			$user = 				array(
				'email'    => 'root@Menu.dev',
	            "password" => \Hash::make("menu"),
	            "name"  => "menu"
	        );

	        if (isset($this->role_id) && $this->role_id){
	        	$user["username"] = "menu";
	        	$user["confirmation_code"] = "menu";
	        	$user["role_id"] = $this->role_id;
	        }
			\App\User::create($user);
			$this->info(' Mail: root@Menu.dev');
			$this->info(' Passowrd: menu');

		}else{
			$this->info(' User exists');
		}
	}

	private function createRole($roleModel){

		$role = $roleModel::create(
			array(
				'name' => 'menu',
				'default_route' => '\Shivergard\Menu\MenuController@init',
				'parent_id' => 1
			)
		);
		$this->role_id = $role->id;
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}

}