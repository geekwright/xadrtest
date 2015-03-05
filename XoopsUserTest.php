<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class XoopsUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var XoopsUser
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new XoopsUser($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\XoopsUser::isAuthenticated
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
     * @covers Xmf\Xadr\XoopsUser::lastPrivilegeChecked
     * @todo   Implement testLastPrivilegeChecked().
     */
    public function testLastPrivilegeChecked()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\XoopsUser::hasPrivilege
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
     * @covers Xmf\Xadr\XoopsUser::setXoopsPermissionMap
     * @todo   Implement testSetXoopsPermissionMap().
     */
    public function testSetXoopsPermissionMap()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\XoopsUser::id
     * @todo   Implement testId().
     */
    public function testId()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\XoopsUser::uname
     * @todo   Implement testUname().
     */
    public function testUname()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
