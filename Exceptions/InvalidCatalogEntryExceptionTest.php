<?php
namespace Xmf\Xadr\Exceptions;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class InvalidCatalogEntryExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InvalidCatalogEntryException
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new InvalidCatalogEntryException;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testException()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidCatalogEntryException');
        throw $this->object;
    }
}
