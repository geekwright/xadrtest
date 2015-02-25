<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class DomainManagerTest extends \MY_UnitTestCase
{
    /**
     * @var DomainManager
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new DomainManager($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\DomainManager::loadDomain
     * @todo   Implement testLoadDomain().
     */
    public function testLoadDomain()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\DomainManager::shutdown
     * @todo   Implement testShutdown().
     */
    public function testShutdown()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
