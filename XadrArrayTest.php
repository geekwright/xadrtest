<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class XadrArrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var XadrArray
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new XadrArray;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\XadrArray::get
     */
    public function testGet()
    {
        $this->assertNull($this->object->get('--NoNameLikeThisAtAll--'));
        $this->assertSame('OK', $this->object->get('testvalue', 'OK'));
    }

    /**
     * @covers Xmf\Xadr\XadrArray::set
     */
    public function testSet()
    {
        $this->object->set('testvalue', 'OK');
        $this->assertSame('OK', $this->object->get('testvalue', 'NotOK'));
    }

    /**
     * @covers Xmf\Xadr\XadrArray::getAll
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
     * @covers Xmf\Xadr\XadrArray::getNames
     */
    public function testGetNames()
    {
        $this->object->set('test1', 'OK1');
        $this->object->set('test2', 'OK2');
        $all = $this->object->getNames();
        $this->assertEquals(array('test1', 'test2'), $all);
    }

    /**
     * @covers Xmf\Xadr\XadrArray::hasName
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
     * @covers Xmf\Xadr\XadrArray::remove
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
     * @covers Xmf\Xadr\XadrArray::setAll
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
     * @covers Xmf\Xadr\XadrArray::setMerge
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
     * @covers Xmf\Xadr\XadrArray::setArrayItem
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

        $this->object->set('test', 'NOTOK1');
        $this->object->setArrayItem('test', null, 'OK1');
        $this->object->setArrayItem('test', null, 'OK2');

        $expected = array(
            0 => 'OK1',
            1 => 'OK2',
        );
        $actual = $this->object->get('test');
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers Xmf\Xadr\XadrArray::getAllLike
     */
    public function testGetAllLike()
    {
        $this->object->set('oddball', 'odd');
        $this->object->set('test1', 'OK1');
        $this->object->set('text1', 'NOTOK1');
        $this->object->set('text2', 'NOTOK2');
        $this->object->set('test2', 'OK2');

        $subset = $this->object->getAllLike('test');
        $this->assertCount(2, $subset);
        $this->assertArrayHasKey('test1', $subset);
        $this->assertArrayHasKey('test2', $subset);
        $this->assertEquals('OK1', $subset['test1']);
        $this->assertEquals('OK2', $subset['test2']);

        $subset = $this->object->getAllLike('oddball');
        $this->assertCount(1, $subset);
        $this->assertArrayHasKey('oddball', $subset);
        $this->assertEquals('odd', $subset['oddball']);

        $subset = $this->object->getAllLike('garbage');
        $this->assertCount(0, $subset);

        $subset = $this->object->getAllLike();
        $this->assertArrayHasKey('oddball', $subset);
        $this->assertArrayHasKey('test1', $subset);
        $this->assertArrayHasKey('test2', $subset);
        $this->assertArrayHasKey('text1', $subset);
        $this->assertArrayHasKey('text2', $subset);
        $this->assertCount(5, $subset);
    }

    public function testArrayAccess()
    {
        $this->object['test1'] = 'OK1';
        $this->object->set('test2', 'OK2');

        $this->assertSame('OK1', $this->object->get('test1'));
        $this->assertSame('OK2', $this->object['test2']);
        $this->assertEquals(2, count($this->object));
        $i = 0;
        foreach ($this->object as $v) {
            ++$i;
        }
        $this->assertEquals($i, count($this->object));
        $this->assertSame('OK2', $v);
    }
}
