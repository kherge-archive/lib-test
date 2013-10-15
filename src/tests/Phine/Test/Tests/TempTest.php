<?php

namespace Phine\Test\Tests;

use Phine\Path\Path;
use Phine\Test\Property;
use Phine\Test\Temp;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods in the {@link TempTest} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class TempTest extends TestCase
{
    /**
     * The temp instance being tested.
     *
     * @var Temp
     */
    private $temp;

    /**
     * Make sure there are default values set.
     */
    public function testConstruct()
    {
        $this->assertEquals(
            sys_get_temp_dir(),
            Property::get($this->temp, 'dir'),
            'Make sure the directory path is the system temporary directory.'
        );

        $this->assertEquals(
            'test-',
            Property::get($this->temp, 'prefix'),
            'Make sure the path prefix is "test-".'
        );
    }

    /**
     * Make sure we can recursively copy a directory to a temporary path.
     */
    public function testCopyDir()
    {
        $dir = $this->temp->copyDir(__DIR__);

        $this->assertEquals(
            basename(__DIR__),
            basename($dir),
            'Make sure the original directory name is used for the temporary one.'
        );

        $this->assertFileEquals(
            __DIR__ . '/Exception/MethodExceptionTest.php',
            $dir . '/Exception/MethodExceptionTest.php',
            'Make sure the sub directory files are copied too.'
        );

        $this->assertEquals(
            array(dirname($dir)),
            Property::get($this->temp, 'paths'),
            'Make sure the path is added to the collection.'
        );

        Path::remove($dir);
    }

    /**
     * Make sure we can copy a file to a temporary path.
     */
    public function testCopyFile()
    {
        $file = $this->temp->copyFile(__FILE__);

        $this->assertEquals(
            basename(__FILE__),
            basename($file),
            'Make sure the original file name is used for the temporary one.'
        );

        $this->assertFileEquals(
            __FILE__,
            $file,
            'Make sure the file is copied.'
        );

        $this->assertEquals(
            array(dirname($file)),
            Property::get($this->temp, 'paths'),
            'Make sure the path is added to the collection.'
        );

        Path::remove($file);

        $this->setExpectedException(
            'Phine\\Test\\Exception\\TempException',
            '/does/not/exist'
        );

        $this->temp->copyFile('/does/not/exist');
    }

    /**
     * Make sure that we can create a new temporary directory path.
     */
    public function testCreateDir()
    {
        $dir = $this->temp->createDir();

        $this->assertTrue(
            is_dir($dir),
            'Make sure the path returned is an existing directory.'
        );

        $this->assertEquals(
            array($dir),
            Property::get($this->temp, 'paths'),
            'Make sure the path is added to the collection.'
        );
    }

    /**
     * Make sure that we can create a new temporary file.
     */
    public function testCreateFile()
    {
        $file = $this->temp->createFile();

        $this->assertTrue(
            is_file($file),
            'Make sure the path returned is an existing file.'
        );

        $this->assertEquals(
            array($file),
            Property::get($this->temp, 'paths'),
            'Make sure the path is added to the collection.'
        );
    }

    /**
     * Make sure that we can delete all of the paths we create.
     *
     * @depends testCreateDir
     * @depends testCreateFile
     */
    public function testPurgePaths()
    {
        $dir = $this->temp->createDir();
        $file = $this->temp->createFile();

        $this->assertEquals(
            2,
            $this->temp->purgePaths(),
            'Make sure that two paths are purged.'
        );

        $this->assertFileNotExists(
            $dir,
            'Make sure the temporary directory does not exist.'
        );

        $this->assertFileNotExists(
            $file,
            'Make sure the temporary file does not exist.'
        );

        $this->assertEquals(
            array(),
            Property::get($this->temp, 'paths'),
            'Make sure the paths collection is reset.'
        );
    }

    /**
     * Creates a new instance for testing.
     */
    protected function setUp()
    {
        $this->temp = new Temp();
    }
}
