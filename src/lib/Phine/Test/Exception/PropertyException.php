<?php

namespace Phine\Test\Exception;

use Phine\Exception\Exception;

/**
 * Exception thrown for class property related errors.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class PropertyException extends Exception
{
    /**
     * Creates a new exception for a property that does not exist.
     *
     * @param object|string $class The class instance or name.
     * @param string        $name  The name of the property.
     *
     * @return PropertyException A new exception.
     */
    public static function notExist($class, $name)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        return new self(
            "The property \"$name\" does not exist in the class \"$class\"."
        );
    }
}
