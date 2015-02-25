<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ContextAwareTest extends \MY_UnitTestCase
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
     * @todo   Implement testConfig().
     */
    public function testConfig()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\ContextAware::context
     * @todo   Implement testContext().
     */
    public function testContext()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\ContextAware::controller
     * @todo   Implement testController().
     */
    public function testController()
    {
        $this->assertInstanceOf('Xmf\Xadr\Controller', $this->object->Controller());
    }

    /**
     * @covers Xmf\Xadr\ContextAware::request
     * @todo   Implement testRequest().
     */
    public function testRequest()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\ContextAware::user
     * @todo   Implement testUser().
     */
    public function testUser()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\ContextAware::domain
     * @todo   Implement testDomain().
     */
    public function testDomain()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
