<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

class CatalogTestCatalog extends Catalog
{
}

class CatalogTestEntry extends Catalog\Entry
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
class CatalogTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Catalog
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new CatalogTestCatalog;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testConstruct()
    {
        $this->assertInstanceOf('\Xmf\Xadr\Catalog', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\Domain', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
        $this->assertInstanceOf('\ArrayAccess', $this->object);
        $this->assertInstanceOf('\IteratorAggregate', $this->object);
        $this->assertInstanceOf('\Countable', $this->object);
    }

    /**
     * @covers Xmf\Xadr\Catalog::setEntry
     * @covers Xmf\Xadr\Catalog::getEntry
     */
    public function testGetSetEntry()
    {
        $name = 'name';
        $type = 'test';

        $entry = new CatalogTestEntry($type, $name);
        $this->assertNull($entry->catalog());
        $this->object->setEntry($entry);
        $this->assertSame($this->object, $entry->catalog());

        $actual = $this->object->getEntry($type, $name);
        $this->assertSame($entry, $actual);

        $replaced = new CatalogTestEntry($type, $name);
        $this->object->setEntry($replaced);
        $actual = $this->object->getEntry($type, $name);

        $this->assertSame($replaced, $actual);
        $this->assertNotSame($replaced, $entry);
    }

    /**
     * @covers Xmf\Xadr\Catalog::getEntries
     * @covers Xmf\Xadr\Catalog::setEntry
     */
    public function testGetEntries()
    {
        $names = array('name1', 'name2', 'name3');
        $type = 'test';
        $entries = array();
        foreach ($names as $name) {
            $entries[$name] = new CatalogTestEntry($type, $name);
            $this->object->setEntry($entries[$name]);
        }

        $actual = $this->object->getEntries($type, $names);
        $this->assertEquals($entries, $actual);

        foreach ($names as $name) {
            $this->assertSame($entries[$name], $actual[$name]);
        }
    }


    /**
     * @covers Xmf\Xadr\Catalog::hasEntry
     */
    public function testHasEntry()
    {
        $name = 'name';
        $type = 'test';

        $entry = new CatalogTestEntry($type, $name);
        $this->object->setEntry($entry);
        $this->assertTrue($this->object->hasEntry($type, $name));
        $this->assertFalse($this->object->hasEntry($type, 'garbage'));
        $this->assertFalse($this->object->hasEntry('garbage', $name));
    }

    /**
     * @covers Xmf\Xadr\Catalog::buildCatalogKey
     */
    public function testBuildCatalogKey()
    {
        $this->assertEquals('type/name', $this->object->buildCatalogKey('type', 'name'));
    }

    /**
     * @covers Xmf\Xadr\Catalog::initalize
     */
    public function testInitalize()
    {
        $this->assertTrue($this->object->initalize());
    }

    /**
     * @covers Xmf\Xadr\Catalog::cleanup
     */
    public function testCleanup()
    {
        $this->assertTrue($this->object->cleanup());
    }

    /**
     * @covers Xmf\Xadr\Catalog::offsetSet
     * @covers Xmf\Xadr\Catalog::offsetExists
     * @covers Xmf\Xadr\Catalog::offsetUnset
     * @covers Xmf\Xadr\Catalog::offsetGet
     */
    public function testArrayAccess()
    {
        $entry = new CatalogTestEntry('test', 'name');
        $key = $this->object->buildCatalogKey('test', 'name');

        $this->object->offsetSet($key, $entry);
        $this->assertTrue($this->object->offsetExists($key));
        $this->assertTrue(isset($this->object[$key]));

        $this->assertSame($entry, $this->object->offsetGet($key));
        $this->assertSame($entry, $this->object[$key]);

        $garbageKey = $this->object->buildCatalogKey('random', 'garbage');
        $this->assertFalse($this->object->offsetExists($garbageKey));
        $this->assertFalse(isset($this->object[$garbageKey]));

        $this->object->offsetUnset($key);
        $this->assertFalse(isset($this->object[$key]));

        $this->object[$key] = $entry;
        $this->assertSame($entry, $this->object->offsetGet($key));
        $this->assertSame($entry, $this->object[$key]);

        unset($this->object[$key]);
        $this->assertFalse($this->object->offsetExists($key));
    }

    /**
     * @covers Xmf\Xadr\Catalog::offsetSet
     */
    public function testException()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogEntryException');
        $this->object->offsetSet('', 'crap');
    }

    /**
     * @covers Xmf\Xadr\Catalog::offsetSet
     */
    public function testException2()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogEntryException');
        $this->object['']='crap';
    }

    /**
     * @covers Xmf\Xadr\Catalog::getIterator
     */
    public function testGetIterator()
    {
        $values = array(
            array('type' => 'test', 'name' => 'name1'),
            array('type' => 'test', 'name' => 'name2'),
        );
        foreach ($values as $v) {
            $this->object->setEntry(new CatalogTestEntry($v['type'], $v['name']));
        }

        $actual = array();
        $v=array();
        foreach ($this->object as $entry) {
            $v['type'] = $entry->getEntryType();
            $v['name'] = $entry->getEntryName();
            $actual[] = $v;
        }
        $this->assertEquals($values, $actual);
    }

    /**
     * @covers Xmf\Xadr\Catalog::count
     * @todo   Implement testCount().
     */
    public function testCount()
    {
        $this->assertEquals(0, count($this->object));

        $this->object->setEntry(new CatalogTestEntry('test', 'name1'));
        $this->assertEquals(1, count($this->object));

        $this->object->setEntry(new CatalogTestEntry('test', 'name2'));
        $this->assertEquals(2, count($this->object));
    }
}
