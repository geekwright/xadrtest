<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class CatalogTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Catalog
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\Catalog', array($context));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Catalog::getEntry
     * @todo   Implement testGetEntry().
     */
    public function testGetEntry()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Catalog::setEntry
     * @todo   Implement testSetEntry().
     */
    public function testSetEntry()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Catalog::hasEntry
     * @todo   Implement testHasEntry().
     */
    public function testHasEntry()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Catalog::initalize
     * @todo   Implement testInitalize().
     */
    public function testInitalize()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Catalog::cleanup
     * @todo   Implement testCleanup().
     */
    public function testCleanup()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
