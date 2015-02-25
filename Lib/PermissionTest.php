<?php
namespace Xmf\Xadr\Lib;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class PermissionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Permission
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Lib\Permission::initNamespace
     * @todo   Implement testInitNamespace().
     */
    public function testInitNamespace()
    {
        $instance = Permission::initNamespace('namespace', 'title', 'description');
        $this->assertInstanceOf('Xmf\Xadr\Lib\Permission', $instance);
    }

    /**
     * @covers Xmf\Xadr\Lib\Permission::addItem
     * @todo   Implement testAddItem().
     */
    public function testAddItem()
    {
        $instance = Permission::initNamespace('namespace', 'title', 'description');
        $return = $instance->addItem(1, 'name1', 'label1');
        $this->assertSame($return, $instance);
    }

    /**
     * @covers Xmf\Xadr\Lib\Permission::addToMap
     * @todo   Implement testAddToMap().
     */
    public function testAddToMap()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
