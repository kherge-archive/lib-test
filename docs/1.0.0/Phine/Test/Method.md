<small>Phine\Test</small>

Method
======

Manages access to a protected or private class method.

Signature
---------

- It is a(n) **class**.

Methods
-------

The class defines the following methods:

- [`find()`](#find) &mdash; Finds a method for the given class.
- [`invoke()`](#invoke) &mdash; Invokes a method for the given class.
- [`invokeArgs()`](#invokeArgs) &mdash; Invokes a method for the given class using a list of arguments.

### `find()` <a name="find"></a>

Finds a method for the given class.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$class` (`object`|`string`) &mdash; The class instance or name.
    - `$name` (`string`) &mdash; The name of the method.
    - `$access` (`boolean`) &mdash; Make the method accessible?
- _Returns:_ The method.
    - [`ReflectionMethod`](http://php.net/class.ReflectionMethod)
- It throws one of the following exceptions:
    - `MethodException` &mdash; If the method does not exist.

### `invoke()` <a name="invoke"></a>

Invokes a method for the given class.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$class`
    - `$name`
- _Returns:_ The result of the invocation.
    - `mixed`

### `invokeArgs()` <a name="invokeArgs"></a>

Invokes a method for the given class using a list of arguments.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$class` (`object`|`string`) &mdash; The class instance or name.
    - `$name` (`string`) &mdash; The name of the method.
    - `$args` (`array`) &mdash; A list of method arguments to pass.
- _Returns:_ The result of the invocation.
    - `mixed`

