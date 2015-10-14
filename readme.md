To Start using it add to composer.json repozitory

    "repositories": [
      {
      "type": "git",
       "url": "git@github.com:shivergard/menu.git"
      }
    ],

and add requirements

	"require": {
		...
        "shivergard/menu" : "dev-master" 
    },

and add service provider

		'providers' => [
		...
      'Shivergard\Menu\MenuServiceProvider',
		...