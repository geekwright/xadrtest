<?php
namespace Xmf\Xadr\Catalog;

require_once __DIR__ . '/../../../../init_mini.php';

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class NullMapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NullMap
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new NullMap('testmap');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Catalog\NullMap::mapName
     * @todo   Implement testMapName().
     */
    public function testMapName()
    {
        $names = array('fred', 'barney', 'wilma', 'betty');
        foreach ($names as $name) {
            $this->assertSame($name, $this->object->mapName($name));
        }
    }
}
