<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ActionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Action
     */
    protected $object;

    /**
     * @var Context
     */
    protected $context;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\Action', array($this->context));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Action::__construct
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\Xmf\Xadr\Action', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
    }

    /**
     * @covers Xmf\Xadr\Action::getDefaultResponse
     */
    public function testGetDefaultResponse()
    {
        $response = $this->object->getDefaultResponse();
        $this->assertInstanceOf('\Xmf\Xadr\ResponseSelector', $response);
        $this->assertSame(Xadr::RESPONSE_INPUT, $response->getResponseCode());
    }

    /**
     * @covers Xmf\Xadr\Action::getRequiredPrivilege
     */
    public function testGetRequiredPrivilege()
    {
        $this->assertSame(null, $this->object->getRequiredPrivilege());
    }

    /**
     * @covers Xmf\Xadr\Action::getRequestMethods
     */
    public function testGetRequestMethods()
    {
        $this->assertSame(Xadr::REQUEST_GET | Xadr::REQUEST_POST, $this->object->getRequestMethods());
        $this->assertSame(Xadr::REQUEST_ALL, $this->object->getRequestMethods());
    }

    /**
     * @covers Xmf\Xadr\Action::getErrorResponse
     */
    public function testGetErrorResponse()
    {
        $response = $this->object->getErrorResponse();
        $this->assertInstanceOf('\Xmf\Xadr\ResponseSelector', $response);
        $this->assertSame(Xadr::RESPONSE_ERROR, $response->getResponseCode());
    }

    /**
     * @covers Xmf\Xadr\Action::initialize
     */
    public function testInitialize()
    {
        $this->assertTrue($this->object->initialize());
    }

    /**
     * @covers Xmf\Xadr\Action::isSecure
     */
    public function testIsSecure()
    {
        $this->assertFalse($this->object->isSecure());
    }

    /**
     * @covers Xmf\Xadr\Action::registerValidators
     */
    public function testRegisterValidators()
    {
        $vm = new ValidatorManager($this->context);
        $this->assertNull($this->object->registerValidators($vm));
    }

    /**
     * @covers Xmf\Xadr\Action::validate
     */
    public function testValidate()
    {
        $this->assertTrue($this->object->validate());
    }
}
