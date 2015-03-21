<?php
namespace Xmf\Xadr;

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class DomainStateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DomainState
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\DomainState', array($context));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\DomainState::__construct
     * @covers Xmf\Xadr\DomainState::initContextAware
     */
    public function testConstruct()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $state = $this->getMockForAbstractClass('Xmf\Xadr\DomainState', array($context));
        $this->assertInstanceOf('\Xmf\Xadr\DomainState', $state);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $state);
        $this->assertNull($state->get('key'));
    }

    /**
     * @covers Xmf\Xadr\DomainState::get
     * @covers Xmf\Xadr\DomainState::set
     * @covers Xmf\Xadr\DomainState::remove
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
     * @covers Xmf\Xadr\DomainState::save
     */
    public function testSave()
    {
        $this->assertNull($this->object->save('key'));
    }

    /**
     * @covers Xmf\Xadr\DomainState::fetch
     */
    public function testFetch()
    {
        $this->assertFalse($this->object->fetch('key'));
    }

    /**
     * @covers Xmf\Xadr\DomainState::expire
     */
    public function testExpire()
    {
        $this->assertFalse($this->object->expire('key'));
    }
}
