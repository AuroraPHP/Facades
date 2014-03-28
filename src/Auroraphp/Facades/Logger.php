<?php
namespace Auroraphp\Facades;

class Logger extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'logger'; }

}