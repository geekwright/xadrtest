<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class UserTest extends \MY_UnitTestCase
{
    /**
     * @var User
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new User($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\User::clearAll
     * @todo   Implement testClearAll().
     */
    public function testClearAll()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\User::isAuthenticated
     * @todo   Implement testIsAuthenticated().
     */
    public function testIsAuthenticated()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\User::setAuthenticated
     * @todo   Implement testSetAuthenticated().
     */
    public function testSetAuthenticated()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\User::hasPrivilege
     * @todo   Implement testHasPrivilege().
     */
    public function testHasPrivilege()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
