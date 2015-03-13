<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class AuthorizationHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AuthorizationHandler
     */
    protected $object;

    /**
     * @var Controller
     */
    protected $context;

    /**
     * @var Action
     */
    protected $action;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\AuthorizationHandler', array($this->context));
        $this->action = $this->getMockForAbstractClass('Xmf\Xadr\Action', array($this->context));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\AuthorizationHandler::__construct
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\Xmf\Xadr\AuthorizationHandler', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
    }

    public function testExecute()
    {
        $this->assertNull($this->object->execute($this->action));
    }
}
