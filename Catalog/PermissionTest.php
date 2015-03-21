<?php
namespace Xmf\Xadr\Catalog;

require_once __DIR__ . '/../../../../init_mini.php';

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class PermissionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Permission
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Permission('permtest', 'Permission Test', 'Test permission description');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Catalog\Permission::addItem
     */
    public function testAddItem()
    {
        $actual = $this->object
            ->addItem(1, 'fred', 'Fred Label')
            ->addItem(2, 'barney', 'Barney Label');
        $this->assertSame($this->object, $actual);
    }

    /**
     * @covers Xmf\Xadr\Catalog\Permission::addItem
     */
    public function testAddItemException()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogException');
        $this->object
            ->addItem(1, 'fred', 'Fred Label')
            ->addItem(2, 'barney', 'Barney Label')
            ->addItem(1, 'wilma', 'Wilma Label');
    }

    /**
     * @covers Xmf\Xadr\Catalog\Permission::__construct
     * @covers Xmf\Xadr\Catalog\Permission::translateNameToItemId
     */
    public function testTranslateNameToItemId()
    {
        $permission = new Permission('test2', 'Test2', 'description2');
        $permission
            ->addItem(1, 'fred', 'Fred Label')
            ->addItem(2, 'barney', 'Barney Label');
        $this->assertEquals($permission->translateNameToItemId('fred'), 1);
        $this->assertEquals($permission->translateNameToItemId('barney'), 2);
        $this->assertFalse($permission->translateNameToItemId('wilma'));
    }

    /**
     * @covers Xmf\Xadr\Catalog\Permission::renderPermissionForm
     */
    public function testRenderPermissionForm()
    {

        $render = $this->object
            ->addItem(1, 'fred', 'Fred Label')
            ->addItem(2, 'barney', 'Barney Label')
            ->renderPermissionForm();
        // looks like the right form?
        $this->assertEquals(true, strpos($render, '<form title="Permission Test"'));
        $this->assertEquals(true, strpos($render, 'name="perms[permtest][groups]'));
        $this->assertEquals(true, strpos($render, 'Fred')); // occurs in label
        $this->assertEquals(false, strpos($render, 'fred')); // name should not show up
    }
}
