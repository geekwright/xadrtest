<?php
namespace Xmf\Xadr\Catalog;

require_once __DIR__ . '/../../../../init_mini.php';

class EntryTestCatalog extends \Xmf\Xadr\Catalog
{
}

class EntryTestEntry extends Entry
{
    public function __construct($type, $name)
    {
        $this->entryType = $type;
        $this->entryName = $name;
    }
}

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class EntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Entry
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new EntryTestEntry('test', 'entry');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Catalog\Entry::getEntryType
     */
    public function testGetEntryType()
    {
        $actual = $this->object->getEntryType();
        $this->assertEquals('test', $actual);
    }

    /**
     * @covers Xmf\Xadr\Catalog\Entry::getEntryName
     */
    public function testGetEntryName()
    {
        $actual = $this->object->getEntryName();
        $this->assertEquals('entry', $actual);
    }

    /**
     * @covers Xmf\Xadr\Catalog\Entry::catalog
     */
    public function testCatalog()
    {
        $actual = $this->object->catalog();
        $this->assertNull($actual);

        $cat = new EntryTestCatalog;

        $actual = $this->object->catalog($cat);
        $this->assertSame($cat, $actual);

        $actual = $this->object->catalog();
        $this->assertSame($cat, $actual);
    }

    /**
     * @covers Xmf\Xadr\Catalog\Entry::catalog
     */
    public function testException()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogException');
        $notCat = new \ArrayObject;
        $actual = $this->object->catalog($notCat);
    }
}
