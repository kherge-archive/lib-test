<?php

namespace Phine\Test;

use Phine\Test\Exception\MethodException;
use ReflectionClass;
use ReflectionMethod;

/**
 * Manages access to a protected or private class method.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Method
{
    /**
     * Finds a method for the given class.
     *
     * @param object|string $class  The class instance or name.
     * @param string        $name   The name of the method.
     * @param boolean       $access Make the method accessible?
     *
     * @return ReflectionMethod The method.
     *
     * @throws MethodException If the method does not exist.
     */
    public static function find($class, $name, $access = true)
    {
        $reflection = new ReflectionClass($class);

        while (!$reflection->hasMethod($name)) {
            if (!($reflection = $reflection->getParentClass())) {
                throw MethodException::notExist($class, $name);
            }
        }

        $method = $reflection->getMethod($name);
        $method->setAccessible($access);

        return $method;
    }

    /**
     * Invokes a method for the given class.
     *
     * @param object|string $class   The class instance or name.
     * @param string        $name    The name of the method.
     * @param mixed         $arg,... A method argument to pass.
     *
     * @return mixed The result of the invocation.
     */
    public static function invoke($class, $name)
    {
        return self::invokeArgs($class, $name, array_slice(func_get_args(), 2));
    }

    /**
     * Invokes a method for the given class using a list of arguments.
     *
     * @param object|string $class   The class instance or name.
     * @param string        $name    The name of the method.
     * @param array         $args    A list of method arguments to pass.
     *
     * @return mixed The result of the invocation.
     */
    public static function invokeArgs($class, $name, array $args)
    {
        return self::find($class, $name)->invokeArgs(
            is_object($class) ? $class : null,
            $args
        );
    }
}
