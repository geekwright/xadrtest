<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Config
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Config;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Config::get
     * @todo   Implement testGet().
     */
    public function testGet()
    {
        $this->assertNull($this->object->get('--NoNameLikeThisAtAll--'));
    }

    /**
     * @covers Xmf\Xadr\Config::set
     * @todo   Implement testSet().
     */
    public function testSet()
    {
        $this->object->set('testvalue','OK');
        $this->assertSame('OK', $this->object->get('testvalue', 'NotOK'));
    }

    /**
     * @covers Xmf\Xadr\Config::getConfigs
     * @todo   Implement testGetConfigs().
     */
    public function testGetConfigs()
    {
        $this->assertTrue(is_array($this->object->getConfigs()));
    }
}
