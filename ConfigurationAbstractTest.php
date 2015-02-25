<?php
namespace Xmf\Xadr;

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ConfigurationAbstractTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ConfigurationAbstract
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\ConfigurationAbstract', array($this->context));

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testInheritedConfigContext()
    {
        $this->assertInstanceOf('Xmf\Xadr\Config', $this->object->config());
    }
}
