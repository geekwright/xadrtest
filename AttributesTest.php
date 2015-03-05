<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class AttributesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Attributes
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Attributes;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Attributes::get
     * @todo   Implement testGet().
     */
    public function testGet()
    {
        $this->assertNull($this->object->get('--NoNameLikeThisAtAll--'));
        $this->assertSame('OK', $this->object->get('testvalue', 'OK'));
    }

    /**
     * @covers Xmf\Xadr\Attributes::set
     * @todo   Implement testSet().
     */
    public function testSet()
    {
        $this->object->set('testvalue', 'OK');
        $this->assertSame('OK', $this->object->get('testvalue', 'NotOK'));
    }

    /**
     * @covers Xmf\Xadr\Attributes::getAll
     * @todo   Implement testGetAll().
     */
    public function testGetAll()
    {
        $this->object->set('test1', 'OK1');
        $this->object->set('test2', 'OK2');
        $all = $this->object->getAll();
        $this->assertArrayHasKey('test1', $all);
        $this->assertArrayHasKey('test2', $all);
        $this->assertEquals('OK1', $all['test1']);
        $this->assertEquals('OK2', $all['test2']);
    }

    /**
     * @covers Xmf\Xadr\Attributes::getNames
     * @todo   Implement testGetNames().
     */
    public function testGetNames()
    {
        $this->object->set('test1', 'OK1');
        $this->object->set('test2', 'OK2');
        $all = $this->object->getNames();
        $this->assertEquals(array('test1', 'test2'), $all);
    }

    /**
     * @covers Xmf\Xadr\Attributes::hasName
     * @todo   Implement testHasName().
     */
    public function testHasName()
    {
        $this->object->set('test1', 'OK1');
        $this->object->set('test2', 'OK2');
        $this->assertTrue($this->object->hasName('test1'));
        $this->assertTrue($this->object->hasName('test2'));
        $this->assertFalse($this->object->hasName('test3'));
    }

    /**
     * @covers Xmf\Xadr\Attributes::remove
     * @todo   Implement testRemove().
     */
    public function testRemove()
    {
        $this->object->set('test1', 'OK1');
        $this->object->set('test2', 'OK2');
        $this->assertTrue($this->object->hasName('test1'));
        $this->assertTrue($this->object->hasName('test2'));
        $this->object->remove('test1');
        $this->assertFalse($this->object->hasName('test1'));
    }

    /**
     * @covers Xmf\Xadr\Attributes::setAll
     * @todo   Implement testSetAll().
     */
    public function testSetAll()
    {
        $this->object->set('test1', 'OK1');
        $this->object->set('test2', 'OK2');
        $this->assertTrue($this->object->hasName('test1'));
        $this->assertTrue($this->object->hasName('test2'));

        $replacements = array(
            'test3' => 'OK3',
            'test4' => 'OK4',
        );
        $oldValues = $this->object->setAll($replacements);
        $this->assertArrayHasKey('test1', $oldValues);
        $this->assertArrayHasKey('test2', $oldValues);
        $this->assertArrayNotHasKey('test3', $oldValues);
        $this->assertArrayNotHasKey('test4', $oldValues);
        $this->assertTrue($this->object->hasName('test3'));
        $this->assertTrue($this->object->hasName('test4'));
        $this->assertFalse($this->object->hasName('test1'));
        $this->assertFalse($this->object->hasName('test2'));
        $this->assertSame('OK3', $this->object->get('test3'));
        $this->assertSame('OK4', $this->object->get('test4'));
    }

    /**
     * @covers Xmf\Xadr\Attributes::setMerge
     * @todo   Implement testSetMerge().
     */
    public function testSetMerge()
    {
        $this->object->set('test1', 'OK1');
        $this->object->set('test2', 'OK2');

        $this->assertTrue($this->object->hasName('test1'));
        $this->assertTrue($this->object->hasName('test2'));

        $replacements = array(
            'test2' => 'OK2new',
            'test3' => 'OK3',
        );
        $this->object->setMerge($replacements);

        $this->assertTrue($this->object->hasName('test1'));
        $this->assertTrue($this->object->hasName('test2'));
        $this->assertTrue($this->object->hasName('test3'));

        $this->assertSame('OK1', $this->object->get('test1'));
        $this->assertSame('OK2new', $this->object->get('test2'));
        $this->assertSame('OK3', $this->object->get('test3'));
    }

    /**
     * @covers Xmf\Xadr\Attributes::setArrayItem
     * @todo   Implement testSetArrayItem().
     */
    public function testSetArrayItem()
    {
        $this->object->setArrayItem('test', 'a', 'OK1');
        $this->object->setArrayItem('test', 'b', 'OK2');

        $expected = array(
            'a' => 'OK1',
            'b' => 'OK2',
        );
        $this->assertEquals($expected, $this->object->get('test'));
    }
}
