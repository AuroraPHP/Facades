Aura.Facades
============

A package to allow the use of facades within the wonderful Aura.Web_Project framework goodness.  Aura PHP is a great framework but getting started can be a pain.  So let's fix that, presenting Facades for Aura.



##Game Changer
We all know that Facades are quite possibly the best thing to happen to PHP in the past decade.  Facades are an innovation originally created by Taylor Otwell for the Laravel PHP project.  It's time to bring this magic to Aura, don't fight the revolution.



##Usage
The old clunky way of instantiating the router class

	use Aura\Router\RouterFactory;

	$router_factory = new RouterFactory;
	$router = $router_factory->newInstance();

	$router->add('hello', '/')
	  ->addValues(array(
        'controller' => 'blog',
        'action'  => 'read',
        'format' => '.html',
    ));


and here is the new artisanal way

	Router::add('hello', '/')
	  ->addValues([
        'controller' => 'blog',
        'action'     => 'read',
        'format'     => '.html',
    ]);



##Installation
Now that you're ready to leave the dark ages and start using Facades, let's install it.  Just add this to your composer.json:

	"auroraphp/facades": "dev-master"


This in your application bootstrapping just add this

	use AuraFacades\Facade;

	// initialize the Facade class
	Facade::registerAliases();


Done!
