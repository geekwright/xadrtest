<?php
namespace Xmf\Xadr;

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-05-28 at 09:05:02.
 */
class ResponderTest extends \MY_UnitTestCase
{
    /**
     * @var Responder
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\Responder', array($context));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Responder::cleanup
     * @todo   Implement testCleanup().
     */
    public function testCleanup()
    {
        $this->assertNull($this->object->cleanup());
    }

    /**
     * @covers Xmf\Xadr\Responder::initialize
     * @todo   Implement testInitialize().
     */
    public function testInitialize()
    {
        $this->assertNull($this->object->initialize());
    }
}