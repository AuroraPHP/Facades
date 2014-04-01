<?php
namespace Auroraphp\Facades;

class Facade
{
    public static $aura;

    /**
     * The application instance being facaded.
     */
    public static $app;

    /**
     * The resolved object instances.
     *
     * @var array
     */
    protected static $resolvedInstance;

    public static function registerAliases($aliases = null)
    {
        if (!$aliases) {
            $aliases = array(
                 // load facades
                'Logger'   => 'Auroraphp\Facades\Logger',
                'Router'   => 'Auroraphp\Facades\Router',
                'Request'  => 'Auroraphp\Facades\Request',
                'Response' => 'Auroraphp\Facades\Response'
            );
        }

        foreach ($aliases as $alias => $class) {
            class_alias($class, $alias);
        }
    }

    public static function newInstance($kernel) {
        return static::$app->newInstance($kernel);
    }

    public static function getInstance() {
        return static::$app;
    }

    public static function setFacadeApplication($app)
    {
        static::$app = $app;
        static::$aura = $app;
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array   $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::resolveFacadeInstance(static::getFacadeAccessor());

        if ($method == 'all') {
            return $instance;
        }

        switch (count($args))
        {
            case 0:
                return $instance->$method();

            case 1:
                return $instance->$method($args[0]);

            case 2:
                return $instance->$method($args[0], $args[1]);

            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);

            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array(array($instance, $method), $args);
        }
    }

    /**
     * Resolve the facade root instance from the container.
     *
     * @param  string  $name
     * @return mixed
     */
    protected static function resolveFacadeInstance($name)
    {
        if (is_object($name)) return $name;

        if (isset(static::$resolvedInstance[$name]))
        {
            return static::$resolvedInstance[$name];
        }

        return static::$resolvedInstance[$name] = static::$app->get($name);
    }
}