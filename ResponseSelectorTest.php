<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ResponseSelectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ResponseSelector
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ResponseSelector(Xadr::RESPONSE_INPUT, 'unit', 'action');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\ResponseSelector::getResponseCode
     */
    public function testGetResponseCode()
    {
        $this->assertSame(Xadr::RESPONSE_INPUT, $this->object->getResponseCode());
    }

    /**
     * @covers Xmf\Xadr\ResponseSelector::getResponseUnit
     */
    public function testGetResponseUnit()
    {
        $this->assertSame('unit', $this->object->getResponseUnit());
    }

    /**
     * @covers Xmf\Xadr\ResponseSelector::getResponseAction
     */
    public function testGetResponseAction()
    {
        $this->assertSame('action', $this->object->getResponseAction());
    }

    /**
     * @covers Xmf\Xadr\ResponseSelector::setDefaultAction
     */
    public function testSetDefaultAction()
    {
        $this->object->setDefaultAction('newunit', 'newaction');
        $this->assertSame(Xadr::RESPONSE_INPUT, $this->object->getResponseCode());
        $this->assertSame('unit', $this->object->getResponseUnit());
        $this->assertSame('action', $this->object->getResponseAction());

        $testObject = new ResponseSelector(Xadr::RESPONSE_ERROR);
        $this->assertSame(Xadr::RESPONSE_ERROR, $testObject->getResponseCode());
        $this->assertNull($testObject->getResponseUnit());
        $this->assertNull($testObject->getResponseAction());
        $testObject->setDefaultAction('newunit', 'newaction');
        $this->assertSame(Xadr::RESPONSE_ERROR, $testObject->getResponseCode());
        $this->assertSame('newunit', $testObject->getResponseUnit());
        $this->assertSame('newaction', $testObject->getResponseAction());
    }
}
