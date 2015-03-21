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
        //$this->object = new CatalogedPrivilege('permname', 'item', $this->catalog);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\CatalogedPrivilege::__construct
     * @covers Xmf\Xadr\CatalogedPrivilege::getNormalizedPrivilegeItem
     * @todo   Implement testGetPemissionItem().
     */
    public function testDetNormalizedPrivilegeItem()
    {
        $this->catalog->newEntry(
            '\Xmf\Xadr\Catalog\Permission',
            'permname',
            'display name',
            'description'
        )
            ->addItem(1, 'item1', 'description1')
            ->addItem(2, 'item2', 'description2');

        $priv1 = new CatalogedPrivilege('permname', 'item', $this->catalog);
        $this->assertFalse($priv1->getNormalizedPrivilegeItem());
        $priv2 = new CatalogedPrivilege('permname', 42, $this->catalog);
        $this->assertEquals(42, $priv2->getNormalizedPrivilegeItem());
        $priv3 = new CatalogedPrivilege('permname', 'item1', $this->catalog);
        $this->assertEquals(1, $priv3->getNormalizedPrivilegeItem());
        $priv4 = new CatalogedPrivilege('permname', 'item2', $this->catalog);
        $this->assertEquals(2, $priv4->getNormalizedPrivilegeItem());
    }
}
