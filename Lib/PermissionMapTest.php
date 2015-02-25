<?php
namespace Xmf\Xadr\Lib;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class PermissionMapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PermissionMap
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new PermissionMap;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Lib\PermissionMap::addNamespace
     * @todo   Implement testAddNamespace().
     */
    public function testAddNamespace()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Lib\PermissionMap::getMap
     * @todo   Implement testGetMap().
     */
    public function testGetMap()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Lib\PermissionMap::renderPermissionForm
     * @todo   Implement testRenderPermissionForm().
     */
    public function testRenderPermissionForm()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
