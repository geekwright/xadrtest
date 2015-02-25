<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class XoopsTplRenderTest extends \MY_UnitTestCase
{
    /**
     * @var XoopsTplRender
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new XoopsTplRender;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\XoopsTplRender::setAttribute
     * @todo   Implement testSetAttribute().
     */
    public function testSetAttribute()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
