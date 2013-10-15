<small>Phine\Test</small>

Temp
====

Manages a collection of temporary file system paths.

Signature
---------

- It is a(n) **class**.

Methods
-------

The class defines the following methods:

- [`__construct()`](#__construct) &mdash; Sets the temporary directory path and path prefix.
- [`copyDir()`](#copyDir) &mdash; Copies an existing directory to a temporary path.
- [`copyFile()`](#copyFile) &mdash; Copies an existing file to a temporary path.
- [`createDir()`](#createDir) &mdash; Returns a new temporary directory path.
- [`createFile()`](#createFile) &mdash; Returns a new temporary file path.
- [`purgePaths()`](#purgePaths) &mdash; Removes all created directory and file paths.

### `__construct()` <a name="__construct"></a>

Sets the temporary directory path and path prefix.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$dir` (`string`) &mdash; The temporary directory path.
    - `$prefix` (`string`) &mdash; The temporary path prefix.
- It does not return anything.

### `copyDir()` <a name="copyDir"></a>

Copies an existing directory to a temporary path.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$dir` (`string`) &mdash; The directory to copy.
    - `$prefix` (`string`) &mdash; A path prefix.
- _Returns:_ The temporary directory path.
    - `string`

### `copyFile()` <a name="copyFile"></a>

Copies an existing file to a temporary path.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$file` (`string`) &mdash; The file to copy.
    - `$prefix` (`string`) &mdash; A path prefix.
- _Returns:_ The temporary file path.
    - `string`
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception)
    - `TempException` &mdash; If the file could not be copied.

### `createDir()` <a name="createDir"></a>

Returns a new temporary directory path.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$prefix` (`string`) &mdash; A path prefix.
- _Returns:_ The temporary directory path.
    - `string`
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception)
    - `TempException` &mdash; If the path could not be created.

### `createFile()` <a name="createFile"></a>

Returns a new temporary file path.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$prefix` (`string`) &mdash; A path prefix.
- _Returns:_ The temporary file path.
    - `string`
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception)
    - `TempException` &mdash; If the path could not be created.

### `purgePaths()` <a name="purgePaths"></a>

Removes all created directory and file paths.

#### Signature

- It is a **public** method.
- _Returns:_ The total number of paths deleted.
    - `integer`

