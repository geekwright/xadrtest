<?php
namespace Xmf\Xadr\Catalog;

require_once __DIR__ . '/../../../../init_mini.php';

class FieldSetTestCatalog extends \Xmf\Xadr\Catalog
{
}

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class FieldSetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FieldSet
     */
    protected $object;

    protected $fieldList = array('one', 'two', 'three');

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new FieldSet('test', $this->fieldList);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Catalog\FieldSet::getFieldNames
     */
    public function testGetFieldNames()
    {
        $this->assertEquals($this->fieldList, $this->object->getFieldNames());
    }

    /**
     * @covers Xmf\Xadr\Catalog\FieldSet::getFields
     * @todo   Implement testGetFields().
     */
    public function testGetFields()
    {
        $cat = new FieldSetTestCatalog;
        $cat->addEntry($this->object);
        $obj1 = $cat->newEntry('\Xmf\Xadr\Catalog\Field', 'one');
        $obj3 = $cat->newEntry('\Xmf\Xadr\Catalog\Field', 'three');

        $fields = $this->object->getFields();

        $this->assertSame($fields['one'], $obj1);
        $this->assertNull($fields['two']);
        $this->assertSame($fields['three'], $obj3);
    }
}
