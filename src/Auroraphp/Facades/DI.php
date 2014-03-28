<?php
namespace Auroraphp\Facades;

class DI extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'container'; }

}