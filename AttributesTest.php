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
    }

    /**
     * @covers Xmf\Xadr\Attributes::set
     * @todo   Implement testSet().
     */
    public function testSet()
    {
        $this->object->set('testvalue','OK');
        $this->assertSame('OK', $this->object->get('testvalue', 'NotOK'));
    }

    /**
     * @covers Xmf\Xadr\Attributes::getAll
     * @todo   Implement testGetAll().
     */
    public function testGetAll()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Attributes::getNames
     * @todo   Implement testGetNames().
     */
    public function testGetNames()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Attributes::hasName
     * @todo   Implement testHasName().
     */
    public function testHasName()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Attributes::remove
     * @todo   Implement testRemove().
     */
    public function testRemove()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Attributes::setByRef
     * @todo   Implement testSetByRef().
     */
    public function testSetByRef()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Attributes::setAll
     * @todo   Implement testSetAll().
     */
    public function testSetAll()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Attributes::setMerge
     * @todo   Implement testSetMerge().
     */
    public function testSetMerge()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Attributes::setArrayItem
     * @todo   Implement testSetArrayItem().
     */
    public function testSetArrayItem()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
