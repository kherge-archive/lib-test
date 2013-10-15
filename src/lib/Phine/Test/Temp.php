<?php

namespace Phine\Test;

use Phine\Exception\Exception;
use Phine\Path\Path;
use Phine\Test\Exception\TempException;

/**
 * Manages a collection of temporary file system paths.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Temp
{
    /**
     * The temporary directory path.
     *
     * @var string
     */
    private $dir;

    /**
     * The created temporary paths.
     *
     * @var array
     */
    private $paths;

    /**
     * The temporary path prefix.
     *
     * @var string
     */
    private $prefix;

    /**
     * Sets the temporary directory path and path prefix.
     *
     * @param string $dir    The temporary directory path.
     * @param string $prefix The temporary path prefix.
     */
    public function __construct($dir = null, $prefix = 'test-')
    {
        if (null === $dir) {
            $dir = sys_get_temp_dir();
        }

        $this->dir = $dir;
        $this->prefix = $prefix;
    }

    /**
     * Copies an existing directory to a temporary path.
     *
     * @param string $dir     The directory to copy.
     * @param string $prefix  A path prefix.
     *
     * @return string The temporary directory path.
     */
    public function copyDir($dir, $prefix = null)
    {
        $temp = $this->createDir($prefix) . DIRECTORY_SEPARATOR . basename($dir);

        Path::copy($dir, $temp);

        return $temp;
    }

    /**
     * Copies an existing file to a temporary path.
     *
     * @param string $file   The file to copy.
     * @param string $prefix A path prefix.
     *
     * @return string The temporary file path.
     *
     * @throws Exception
     * @throws TempException If the file could not be copied.
     */
    public function copyFile($file, $prefix = null)
    {
        $temp = $this->createDir($prefix) . DIRECTORY_SEPARATOR . basename($file);

        if (!@copy($file, $temp)) {
            throw TempException::createUsingLastError();
        }

        return $temp;
    }

    /**
     * Returns a new temporary directory path.
     *
     * @param string $prefix A path prefix.
     *
     * @return string The temporary directory path.
     *
     * @throws Exception
     * @throws TempException If the path could not be created.
     */
    public function createDir($prefix = null)
    {
        if (null === $prefix) {
            $prefix = $this->prefix;
        }

        if (false === ($dir = @tempnam($this->dir, $prefix))) {
            throw TempException::createUsingLastError();
        }

        unlink($dir);

        if (!@mkdir($dir)) {
            throw TempException::createUsingLastError();
        }

        return $this->paths[] = $dir;
    }

    /**
     * Returns a new temporary file path.
     *
     * @param string $prefix A path prefix.
     *
     * @return string The temporary file path.
     *
     * @throws Exception
     * @throws TempException If the path could not be created.
     */
    public function createFile($prefix = null)
    {
        if (null === $prefix) {
            $prefix = $this->prefix;
        }

        if (false === ($file = @tempnam($this->dir, $prefix))) {
            throw TempException::createUsingLastError();
        }

        return $this->paths[] = $file;
    }

    /**
     * Removes all created directory and file paths.
     *
     * @return integer The total number of paths deleted.
     */
    public function purgePaths()
    {
        $count = 0;

        foreach ($this->paths as $path) {
            $count += Path::remove($path);
        }

        $this->paths = array();

        return $count;
    }
}
