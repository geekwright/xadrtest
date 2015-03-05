<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ExternalComTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ExternalCom
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ExternalCom;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\ExternalCom::__construct
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('Xmf\Xadr\Request', $this->object);
    }

    /**
     * @covers Xmf\Xadr\ExternalCom::getDirname
     * @covers Xmf\Xadr\ExternalCom::setDirname
     */
    public function testGetSetDirname()
    {
        $this->assertNull($this->object->getDirname());
        $expected = 'xadrtest';
        $this->object->setDirname($expected);
        $this->assertEquals($expected, $this->object->getDirname());
    }
}
