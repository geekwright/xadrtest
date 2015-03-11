<?php
namespace Xmf\Xadr;

require_once __DIR__ . '/../../../init_mini.php';

class CatalogedPrivilegeTestCatalog extends Catalog
{
}


/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class CatalogedPrivilegeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CatalogedPrivilege
     */
    protected $object;

    protected $catalog;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->catalog = new CatalogedPrivilegeTestCatalog;
        $this->object = new CatalogedPrivilege('permname', 'item', $this->catalog);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\CatalogedPrivilege::getNormalizedPrivilegeItem
     * @todo   Implement testGetPemissionItem().
     */
    public function testDetNormalizedPrivilegeItem()
    {
        $this->assertFalse($this->object->getNormalizedPrivilegeItem());
    }
}
