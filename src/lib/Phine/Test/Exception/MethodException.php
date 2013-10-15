<?php

namespace Phine\Test\Exception;

use Phine\Exception\Exception;

/**
 * Exception thrown for class property related errors.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class MethodException extends Exception
{
    /**
     * Creates a new exception for a method that does not exist.
     *
     * @param object|string $class The class instance or name.
     * @param string        $name  The name of the method.
     *
     * @return PropertyException A new exception.
     */
    public static function notExist($class, $name)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        return new self(
            "The method \"$name\" does not exist in the class \"$class\"."
        );
    }
}
