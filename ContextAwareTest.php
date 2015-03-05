<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ContextAwareTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ContextAware
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        // user be set until Controller::dispatch() or Controller::setUser() is called
        $context->setUser(new User($context));
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\ContextAware', array($context));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\ContextAware::config
     */
    public function testConfig()
    {
        $this->assertInstanceOf('Xmf\Xadr\Config', $this->object->config());
    }

    /**
     * @covers Xmf\Xadr\ContextAware::context
     * @todo   Implement testContext().
     */
    public function testContext()
    {
        $this->assertInstanceOf('Xmf\Xadr\Controller', $this->object->context());
    }

    /**
     * @covers Xmf\Xadr\ContextAware::controller
     */
    public function testController()
    {
        $this->assertInstanceOf('Xmf\Xadr\Controller', $this->object->controller());
    }

    /**
     * @covers Xmf\Xadr\ContextAware::request
     */
    public function testRequest()
    {
        $this->assertInstanceOf('Xmf\Xadr\Request', $this->object->request());
    }

    /**
     * @covers Xmf\Xadr\ContextAware::user
     */
    public function testUser()
    {
        $this->assertInstanceOf('Xmf\Xadr\User', $this->object->user());
    }

    /**
     * @covers Xmf\Xadr\ContextAware::domain
     */
    public function testDomain()
    {
        $this->assertInstanceOf('Xmf\Xadr\DomainManager', $this->object->domain());
    }
}
