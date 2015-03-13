<?php
namespace Xmf\Xadr;

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class DomainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Domain
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\Domain', array($context));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Domain::__construct
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\Xmf\Xadr\Domain', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
    }

    /**
     * @covers Xmf\Xadr\Catalog::initialize
     */
    public function testinitialize()
    {
        $this->assertTrue(method_exists($this->object, 'initialize'));
    }

    /**
     * @covers Xmf\Xadr\Catalog::cleanup
     */
    public function testCleanup()
    {
        $this->assertTrue(method_exists($this->object, 'cleanup'));
    }

    /**
     * @covers Xmf\Xadr\Catalog::state
     */
    public function testState()
    {
        $this->assertTrue(method_exists($this->object, 'state'));
    }
}
