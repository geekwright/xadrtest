<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

class DomainManagerTestCatalog extends Catalog
{
}

class DomainManagerTestExceptionCatalog extends Catalog
{
    public function initalize()
    {
        return false;
    }
}

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class DomainManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DomainManager
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        //$context = \Xmf\Xadr\Controller::getNew();
        $stub = $this->getMockBuilder('\Xmf\Xadr\Controller')
            ->disableOriginalConstructor()
            ->getMock();

        // Configure the stub.

        $map = array(
          array('Domain', 'Unit', new DomainManagerTestCatalog($stub)),
          array('BadDomain', 'Unit', new DomainManagerTestExceptionCatalog($stub)),
          array('Garbage', 'Unit', new \ArrayObject),
        );

        $stub->method('getDomain')
            ->will($this->returnValueMap($map));

        $stub->method('getCurrentUnit')
            ->willReturn('Unit');


        $this->object = new DomainManager($stub);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\DomainManager::loadDomain
     */
    public function testLoadDomain()
    {
        $domain = $this->object->loadDomain('Domain', 'Unit');
        $this->assertInstanceOf('\Xmf\Xadr\Domain', $domain);
        $actual = $this->object->loadDomain('Domain');
        $this->assertSame($domain, $actual);
        $actual = $this->object->loadDomain('Domain', 'Unit');
        $this->assertSame($domain, $actual);
    }

    /**
     * @covers Xmf\Xadr\DomainManager::loadDomain
     */
    public function testLoadDomainException()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidDomainException');
        $domain = $this->object->loadDomain('Garbage', 'Unit');
    }

    /**
     * @covers Xmf\Xadr\DomainManager::loadDomain
     */
    public function testLoadDomainFailureException()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\DomainFailureException');
        $domain = $this->object->loadDomain('BadDomain', 'Unit');
    }

    /**
     * @covers Xmf\Xadr\DomainManager::shutdown
     * @todo   Implement testShutdown().
     */
    public function testShutdown()
    {
        $domain = $this->object->loadDomain('Domain', 'Unit');
        $this->assertInstanceOf('\Xmf\Xadr\Domain', $domain);
        $this->assertTrue($this->object->shutdown());
    }
}
