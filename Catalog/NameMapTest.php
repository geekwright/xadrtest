<?php
namespace Xmf\Xadr\Catalog;

require_once __DIR__ . '/../../../../init_mini.php';

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class NameMapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NameMap
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
     * @covers Xmf\Xadr\Action::__construct
     */
    public function testConstruct()
    {
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\Catalog\NameMap', array('testmap'));
        $this->assertInstanceOf('\Xmf\Xadr\Catalog\NameMap', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\Catalog\Entry', $this->object);
        $this->assertTrue(method_exists($this->object, 'mapName'));
    }
}
