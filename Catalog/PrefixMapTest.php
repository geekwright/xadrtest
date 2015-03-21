<?php
namespace Xmf\Xadr\Catalog;

require_once __DIR__ . '/../../../../init_mini.php';

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class PrefixMapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PrefixMap
     */
    protected $object;

    protected $fieldPrefix = 'prefix_';

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
     * @covers Xmf\Xadr\Catalog\PrefixMap::__construct
     * @covers Xmf\Xadr\Catalog\PrefixMap::mapName
     */
    public function testMapName()
    {
        $this->object = new PrefixMap('testmap', $this->fieldPrefix);
        $names = array('fred', 'barney', 'wilma', 'betty');
        foreach ($names as $name) {
            $expected = $this->fieldPrefix . $name;
            $this->assertSame($expected, $this->object->mapName($name));
        }
    }
}
