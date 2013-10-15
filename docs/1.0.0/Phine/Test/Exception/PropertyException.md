<small>Phine\Test\Exception</small>

PropertyException
=================

Exception thrown for class property related errors.

Signature
---------

- It is a(n) **class**.
- It is a subclass of `Phine\Exception\Exception`.

Methods
-------

The class defines the following methods:

- [`notExist()`](#notExist) &mdash; Creates a new exception for a property that does not exist.

### `notExist()` <a name="notExist"></a>

Creates a new exception for a property that does not exist.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$class` (`object`|`string`) &mdash; The class instance or name.
    - `$name` (`string`) &mdash; The name of the property.
- _Returns:_ A new exception.
    - [`PropertyException`](../../../Phine/Test/Exception/PropertyException.md)

