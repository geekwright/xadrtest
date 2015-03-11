<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class XadrTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Xadr
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Xadr;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testXadr()
    {
        $this->assertNotNull(Xadr::RENDER_CLIENT);
        $this->assertNotNull(Xadr::RENDER_VARIABLE);
        $this->assertNotNull(Xadr::REQUEST_NONE);
        $this->assertNotNull(Xadr::REQUEST_GET);
        $this->assertNotNull(Xadr::REQUEST_POST);
        $this->assertNotNull(Xadr::REQUEST_ALL);
        $this->assertNotNull(Xadr::RESPONSE_ALERT);
        $this->assertNotNull(Xadr::RESPONSE_ERROR);
        $this->assertNotNull(Xadr::RESPONSE_INDEX);
        $this->assertNotNull(Xadr::RESPONSE_INPUT);
        $this->assertNull(Xadr::RESPONSE_NONE);
        $this->assertNotNull(Xadr::RESPONSE_SUCCESS);
    }
}
