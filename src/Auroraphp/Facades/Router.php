<?php
namespace Auroraphp\Facades;

class Router extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'web_router'; }

}