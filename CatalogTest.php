<?php
namespace Xmf\Xadr;

use Xmf\Xadr\Catalog\Entry;

require_once(dirname(__FILE__).'/../../../init_mini.php');

class CatalogTestCatalog extends Catalog
{
}

class CatalogTestEntry extends Entry
{
    public function __construct($entryName, $arg1, $arg2 = null, $arg3 = null, $arg4 = null)
    {
        $this->entryType = $arg1;
        $this->entryName = $entryName;
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

    public function testContracts()
    {
        $this->assertInstanceOf('\Xmf\Xadr\Catalog', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\Domain', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
        $this->assertInstanceOf('\ArrayAccess', $this->object);
        $this->assertInstanceOf('\IteratorAggregate', $this->object);
        $this->assertInstanceOf('\Countable', $this->object);
    }

    /**
     * @covers Xmf\Xadr\Catalog::addEntry
     * @covers Xmf\Xadr\Catalog::getEntry
     */
    public function testGetAddEntry()
    {
        $name = 'name';
        $type = 'test';

        $entry = new CatalogTestEntry($name, $type);
        $this->object->addEntry($entry);
        $this->assertSame($this->object, $entry->catalog());

        $actual = $this->object->getEntry($type, $name);
        $this->assertSame($entry, $actual);

        $replaced = new CatalogTestEntry($name, $type);
        $this->object->addEntry($replaced, true);
        $actual = $this->object->getEntry($type, $name);

        $this->assertSame($replaced, $actual);
        $this->assertNotSame($replaced, $entry);

        $this->assertNull($this->object->getEntry('wrong', 'bad'));
    }

    /**
     * @covers Xmf\Xadr\Catalog::addEntry
     */
    public function testAddEntryException()
    {
        $entry = new CatalogTestEntry('name', 'test');
        $this->object->addEntry($entry);
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogEntryException');
        $this->object->addEntry($entry);
    }

    /**
     * @covers Xmf\Xadr\Catalog::newEntry
     * @covers Xmf\Xadr\Catalog::getEntry
     */
    public function testNewEntry()
    {
        $name = 'name';

        $entry = $this->object->newEntry('\Xmf\Xadr\Catalog\Field', $name);
        $this->assertInstanceOf('\Xmf\Xadr\Catalog\Entry', $entry);
        $this->assertInstanceOf('\Xmf\Xadr\Catalog\Field', $entry);
        $this->assertEquals($entry->getEntryName(), $name);
        $this->assertSame($entry, $this->object->getEntry(Entry::FIELD, $name));

        $this->object->newEntry('\Xmf\Xadr\CatalogTestEntry', 'name1', 'test');
        $this->object->newEntry('\Xmf\Xadr\CatalogTestEntry', 'name2', 'test', 'arg2');
        $this->object->newEntry('\Xmf\Xadr\CatalogTestEntry', 'name3', 'test', 'arg2', 'arg3');
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogEntryException');
        $this->object->newEntry('\Xmf\Xadr\CatalogTestEntry', 'name4', 'test', 'arg2', 'arg3', 'arg4');
    }

    /**
     * @covers Xmf\Xadr\Catalog::newEntry
     */
    public function testNewEntryException1()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogEntryException');
        $entry = $this->object->newEntry('xfield', 'name');
    }

    /**
     * @covers Xmf\Xadr\Catalog::newEntry
     */
    public function testNewEntryException2()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogEntryException');
        $entry = $this->object->newEntry('\Xmf\Xadr\Catalog\Field', 'name');
        $entry = $this->object->newEntry('\Xmf\Xadr\Catalog\Field', 'name');
    }

    /**
     * @covers Xmf\Xadr\Catalog::newEntry
     */
    public function testNewEntryException3()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogEntryException');
        $entry = $this->object->newEntry('\Xmf\Xadr\Catalog\Field', 'name', 'one', 'two', 'three', 'four');
    }

    /**
     * @covers Xmf\Xadr\Catalog::getEntries
     * @covers Xmf\Xadr\Catalog::addEntry
     */
    public function testGetEntries()
    {
        $names = array('name1', 'name2', 'name3');
        $type = 'test';
        $entries = array();
        foreach ($names as $name) {
            $entries[$name] = new CatalogTestEntry($name, $type);
            $this->object->addEntry($entries[$name]);
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

        $entry = new CatalogTestEntry($name, $type);
        $this->object->addEntry($entry);
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
     * @covers Xmf\Xadr\Catalog::initialize
     */
    public function testInitialize()
    {
        $this->assertTrue($this->object->initialize());
    }

    /**
     * @covers Xmf\Xadr\Catalog::cleanup
     */
    public function testCleanup()
    {
        $this->assertTrue($this->object->cleanup());
    }

    /**
     * @covers Xmf\Xadr\Catalog::state
     */
    public function testState()
    {
        $actual = $this->object->state();
        $this->assertInstanceOf('\Xmf\Xadr\Catalog\State', $actual);
        $this->assertInstanceOf('\Xmf\Xadr\DomainState', $actual);
    }

    /**
     * @covers Xmf\Xadr\Catalog::offsetSet
     * @covers Xmf\Xadr\Catalog::offsetExists
     * @covers Xmf\Xadr\Catalog::offsetUnset
     * @covers Xmf\Xadr\Catalog::offsetGet
     */
    public function testArrayAccess()
    {
        $entry = new CatalogTestEntry('name', 'test');
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
            $this->object->addEntry(new CatalogTestEntry($v['name'], $v['type']));
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
     */
    public function testCount()
    {
        $this->assertEquals(0, count($this->object));

        $this->object->newEntry('\Xmf\Xadr\Catalog\Field', 'name1');
        $this->assertEquals(1, count($this->object));

        $this->object->newEntry('\Xmf\Xadr\Catalog\Field', 'name2');
        $this->assertEquals(2, count($this->object));
    }
}
