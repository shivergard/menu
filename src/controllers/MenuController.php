<?php namespace Shivergard\Menu;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MenuController extends \Shivergard\Crud\CrudController {

	protected $layout = 'layouts.content';

	public $model = 'App\Settings\Menu';

}