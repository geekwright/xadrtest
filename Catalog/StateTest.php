<?php
namespace Xmf\Xadr\Catalog;

require_once __DIR__ . '/../../../../init_mini.php';

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class StateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var State
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new State($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Catalog\State::get
     * @covers Xmf\Xadr\Catalog\State::set
     * @covers Xmf\Xadr\Catalog\State::remove
     */
    public function testGetSet()
    {
        $this->assertNull($this->object->get('key'));
        $this->assertEquals('fred', $this->object->get('key', 'fred'));
        $this->assertNull($this->object->set('key', 'value'));
        $this->assertEquals('value', $this->object->get('key'));
        $this->assertEquals('value', $this->object->get('key', 'fred'));
        $this->assertNull($this->object->set('anotherkey', 'anothervalue'));
        $this->assertEquals('anothervalue', $this->object->get('anotherkey'));
        $this->assertEquals('value', $this->object->get('key'));
        $this->assertEquals('value', $this->object->remove('key'));
        $this->assertNull($this->object->remove('key'));
        $this->assertNull($this->object->get('key'));
    }

    /**
     * @covers Xmf\Xadr\Catalog\State::save
     */
    public function testSave()
    {
        $this->assertNull($this->object->save('key'));
    }

    /**
     * @covers Xmf\Xadr\Catalog\State::fetch
     */
    public function testFetch()
    {
        $this->assertFalse($this->object->fetch('key'));
    }

    /**
     * @covers Xmf\Xadr\Catalog\State::expire
     */
    public function testExpire()
    {
        $this->assertFalse($this->object->expire('key'));
    }
}
