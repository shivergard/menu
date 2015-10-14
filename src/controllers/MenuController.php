<?php namespace Shivergard\Menu;

use App\Requests;

use Illuminate\Http\Request;

use \Carbon;

use \Config;


class MenuController extends \Shivergard\Menu\PackageController {

	public function test(){
		return false;
	}


	public function init(){
		return view('menu::menu');
	}

}