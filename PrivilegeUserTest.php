<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class PrivilegeUserTest extends \MY_UnitTestCase
{
    /**
     * @var PrivilegeUser
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new PrivilegeUser($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\PrivilegeUser::addPrivilege
     * @todo   Implement testAddPrivilege().
     */
    public function testAddPrivilege()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\PrivilegeUser::clearPrivileges
     * @todo   Implement testClearPrivileges().
     */
    public function testClearPrivileges()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\PrivilegeUser::getPrivilegeNamespace
     * @todo   Implement testGetPrivilegeNamespace().
     */
    public function testGetPrivilegeNamespace()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\PrivilegeUser::getPrivilegeNamespaces
     * @todo   Implement testGetPrivilegeNamespaces().
     */
    public function testGetPrivilegeNamespaces()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\PrivilegeUser::getPrivileges
     * @todo   Implement testGetPrivileges().
     */
    public function testGetPrivileges()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\PrivilegeUser::hasPrivilege
     * @todo   Implement testHasPrivilege().
     */
    public function testHasPrivilege()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\PrivilegeUser::mergePrivileges
     * @todo   Implement testMergePrivileges().
     */
    public function testMergePrivileges()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\PrivilegeUser::removePrivilege
     * @todo   Implement testRemovePrivilege().
     */
    public function testRemovePrivilege()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\PrivilegeUser::removePrivileges
     * @todo   Implement testRemovePrivileges().
     */
    public function testRemovePrivileges()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
