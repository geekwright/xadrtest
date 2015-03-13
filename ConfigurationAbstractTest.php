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

    /**
     * @covers Xmf\Xadr\ConfigurationAbstract::__construct
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\Xmf\Xadr\ConfigurationAbstract', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
    }

    /**
     * @covers Xmf\Xadr\ConfigurationAbstract::initContextAware
     */
    public function testInheritedConfigContext()
    {
        $this->assertInstanceOf('Xmf\Xadr\Config', $this->object->config());
    }

    /**
     * @covers Xmf\Xadr\ConfigurationAbstract::initialize
     */
    public function testinitialize()
    {
        $this->assertTrue(method_exists($this->object, 'initialize'));
    }
}
