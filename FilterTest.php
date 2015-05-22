<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class FilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Filter
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\Filter', array($context));
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
        $this->assertInstanceOf('\Xmf\Xadr\Filter', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
    }

    /**
     * @covers Xmf\Xadr\Filter::initContextAware
     */
    public function testInitContextAware()
    {
        $this->assertTrue(method_exists($this->object , 'initContextAware'));
    }

    /**
     * @covers Xmf\Xadr\Filter::executePreAction
     */
    public function testExecutePreAction()
    {
        $this->assertTrue(method_exists($this->object , 'executePreAction'));
        $this->assertNull($this->object->executePreAction());
    }

    /**
     * @covers Xmf\Xadr\Filter::executePostAction
     */
    public function testExecutePostAction()
    {
        $this->assertTrue(method_exists($this->object , 'executePostAction'));
        $this->assertNull($this->object->executePostAction());
    }

    /**
     * @covers Xmf\Xadr\Filter::execute
     */
    final public function testExecute(FilterChain $filterChain)
    {
        $this->assertTrue(method_exists($this->object , 'execute'));
        $chain = new FilterChain;
        $this->assertNull($this->object->execute($chain));
    }

}
