<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Controller
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = Controller::getNew();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Controller::getNew
     * @todo   Implement testGetNew().
     */
    public function testGetNew()
    {
        $this->assertNotSame($this->object, Controller::getNew());
    }

    /**
     * @covers Xmf\Xadr\Controller::actionExists
     * @todo   Implement testActionExists().
     */
    public function testActionExists()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::dispatch
     * @todo   Implement testDispatch().
     */
    public function testDispatch()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::forward
     * @todo   Implement testForward().
     */
    public function testForward()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getAction
     * @todo   Implement testGetAction().
     */
    public function testGetAction()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getAuthorizationHandler
     * @todo   Implement testGetAuthorizationHandler().
     */
    public function testGetAuthorizationHandler()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getConfig
     * @todo   Implement testGetConfig().
     */
    public function testGetConfig()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getControllerPath
     * @todo   Implement testGetControllerPath().
     */
    public function testGetControllerPath()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getControllerPathWithParams
     * @todo   Implement testGetControllerPathWithParams().
     */
    public function testGetControllerPathWithParams()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::genURL
     * @todo   Implement testGenURL().
     */
    public function testGetContentType()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getCurrentAction
     * @todo   Implement testGetCurrentAction().
     */
    public function testGetCurrentAction()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getCurrentUnit
     * @todo   Implement testGetCurrentUnit().
     */
    public function testGetCurrentUnit()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getExecutionChain
     * @todo   Implement testGetExecutionChain().
     */
    public function testGetExecutionChain()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getUnitDir
     * @todo   Implement testGetUnitDir().
     */
    public function testGetUnitDir()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getMojavi
     * @todo   Implement testGetMojavi().
     */
    public function testGetMojavi()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getRenderMode
     * @todo   Implement testGetRenderMode().
     */
    public function testGetRenderMode()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getRequest
     * @todo   Implement testGetRequest().
     */
    public function testGetRequest()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getRequestAction
     * @todo   Implement testGetRequestAction().
     */
    public function testGetRequestAction()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getRequestUnit
     * @todo   Implement testGetRequestUnit().
     */
    public function testGetRequestUnit()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getUser
     * @todo   Implement testGetUser().
     */
    public function testGetUser()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getResponder
     * @todo   Implement testGetResponder().
     */
    public function testGetResponder()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::mapGlobalFilters
     * @todo   Implement testMapGlobalFilters().
     */
    public function testMapGlobalFilters()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::mapUnitFilters
     * @todo   Implement testMapUnitFilters().
     */
    public function testMapUnitFilters()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::redirect
     * @todo   Implement testRedirect().
     */
    public function testRedirect()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::setAuthorizationHandler
     * @todo   Implement testSetAuthorizationHandler().
     */
    public function testSetAuthorizationHandler()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::setContentType
     * @todo   Implement testSetContentType().
     */
    public function testSetContentType()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::setRenderMode
     * @todo   Implement testSetRenderMode().
     */
    public function testSetRenderMode()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::setUser
     * @todo   Implement testSetUser().
     */
    public function testSetUser()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::responseExists
     * @todo   Implement testResponseExists().
     */
    public function testResponseExists()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getFilter
     * @todo   Implement testGetFilter().
     */
    public function testGetFilter()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getExternalCom
     * @todo   Implement testGetExternalCom().
     */
    public function testGetExternalCom()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getDomainManager
     * @todo   Implement testGetDomainManager().
     */
    public function testGetDomainManager()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Controller::getDomain
     * @todo   Implement testGetDomain().
     */
    public function testGetDomain()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
