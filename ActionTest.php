<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ActionTest extends \MY_UnitTestCase
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
        //$this->object = new Action;
        //$this->markTestSkipped(
        //  'Test for this abstract class has not been implemented yet.'
        //);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Action::getDefaultResponse
     * @todo   Implement testGetDefaultResponse().
     */
    public function testGetDefaultResponse()
    {
        $this->assertSame(Xadr::RESPONSE_INPUT, $this->object->getDefaultResponse());
    }

    /**
     * @covers Xmf\Xadr\Action::getPrivilege
     * @todo   Implement testGetPrivilege().
     */
    public function testGetPrivilege()
    {
        $this->assertSame(null, $this->object->getPrivilege());
    }

    /**
     * @covers Xmf\Xadr\Action::getRequestMethods
     * @todo   Implement testGetRequestMethods().
     */
    public function testGetRequestMethods()
    {
        $this->assertSame(Xadr::REQUEST_GET | Xadr::REQUEST_POST, $this->object->getRequestMethods());
    }

    /**
     * @covers Xmf\Xadr\Action::handleError
     * @todo   Implement testHandleError().
     */
    public function testHandleError()
    {
        $this->assertSame(Xadr::RESPONSE_ERROR, $this->object->handleError());
    }

    /**
     * @covers Xmf\Xadr\Action::initialize
     * @todo   Implement testInitialize().
     */
    public function testInitialize()
    {
        $this->assertTrue($this->object->initialize());
    }

    /**
     * @covers Xmf\Xadr\Action::isSecure
     * @todo   Implement testIsSecure().
     */
    public function testIsSecure()
    {
        $this->assertFalse($this->object->isSecure());
    }

    /**
     * @covers Xmf\Xadr\Action::registerValidators
     * @todo   Implement testRegisterValidators().
     */
    public function testRegisterValidators()
    {
        $vm = new ValidatorManager($this->context);
        $this->assertNull($this->object->registerValidators($vm));
    }

    /**
     * @covers Xmf\Xadr\Action::validate
     * @todo   Implement testValidate().
     */
    public function testValidate()
    {
        $this->assertTrue($this->object->validate());
    }
}
