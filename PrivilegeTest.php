<?php
namespace Xmf\Xadr;

require_once __DIR__ . '/../../../init_mini.php';

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class PrivilegeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Privilege
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Privilege('permname', 'item');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Privilege::getPrivilegeName
     */
    public function testGetPrivilegeName()
    {
        $this->assertEquals($this->object->getPrivilegeName(), 'permname');
    }

    /**
     * @covers Xmf\Xadr\Privilege::getPrivilegeItem
     */
    public function testGetPrivilegeItem()
    {
        $this->assertEquals($this->object->getPrivilegeItem(), 'item');
    }

    /**
     * @covers Xmf\Xadr\Privilege::getNormalizedPrivilegeItem
     */
    public function testGetNormalizedPrivilegeItem()
    {
        $this->assertEquals($this->object->getNormalizedPrivilegeItem(), 'item');
    }
}
