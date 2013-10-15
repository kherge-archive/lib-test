<small>Phine\Test</small>

Property
========

Manages access to a protected or private class property.

Signature
---------

- It is a(n) **class**.

Methods
-------

The class defines the following methods:

- [`find()`](#find) &mdash; Finds a property for the given class.
- [`get()`](#get) &mdash; Returns the current value of a property.
- [`set()`](#set) &mdash; Sets the new value of a property.

### `find()` <a name="find"></a>

Finds a property for the given class.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$class` (`object`|`string`) &mdash; The class instance or name.
    - `$name` (`string`) &mdash; The name of a property.
    - `$access` (`boolean`) &mdash; Make the property accessible?
- _Returns:_ The property.
    - [`ReflectionProperty`](http://php.net/class.ReflectionProperty)
- It throws one of the following exceptions:
    - `PropertyException` &mdash; If the property does not exist.

### `get()` <a name="get"></a>

Returns the current value of a property.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$class` (`object`|`string`) &mdash; The class instance or name.
    - `$name` (`string`) &mdash; The name of a property.
- _Returns:_ The current value of the property.
    - `mixed`

### `set()` <a name="set"></a>

Sets the new value of a property.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$class` (`object`|`string`) &mdash; The class instance or name.
    - `$name` (`string`) &mdash; The name of a property.
    - `$value` (`mixed`) &mdash; The new value.
- It does not return anything.

