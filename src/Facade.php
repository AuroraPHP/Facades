<?php
namespace Auroraphp\Facades;

use Illuminate\Support\Facades\Facade as AwesomeFacade;

class Facade extends AwesomeFacade
{
    protected static $aura;

    public static function registerAliases($aliases = null)
    {
        if (!$aliases) {
            $aliases = array(
                // aliases go here
            );
        }

        foreach ($aliases as $alias => $class) {
            class_alias($class, $alias);
        }
    }

    public static function setFacadeApplication($app)
    {
        parent::$app = $app->container;
        self::$app   = $app->container;

        self::$aura = $app;
    }
}