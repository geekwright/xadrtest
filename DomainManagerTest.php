<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

class DomainManagerTestCatalog extends Catalog
{
}

class DomainManagerTestExceptionCatalog extends Catalog
{
    public function initialize()
    {
        return false;
    }
}

class DomainManagerTestChainedExceptionCatalog extends Catalog
{
    public function initialize()
    {
        throw new \InvalidArgumentException('Testing chained Exceptions');
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
          array('Chained', 'Unit', new DomainManagerTestChainedExceptionCatalog($stub)),
          array('Garbage', 'Unit', new \ArrayObject),
        );

        $stub->method('getDomainComponent')
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
     * @covers Xmf\Xadr\DomainManager::__construct
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\Xmf\Xadr\DomainManager', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
    }

    /**
     * @covers Xmf\Xadr\DomainManager::getDomain
     */
    public function testGetDomain()
    {
        $domain = $this->object->getDomain('Domain', 'Unit');
        $this->assertInstanceOf('\Xmf\Xadr\Domain', $domain);
        $actual = $this->object->getDomain('Domain');
        $this->assertSame($domain, $actual);
        $actual = $this->object->getDomain('Domain', 'Unit');
        $this->assertSame($domain, $actual);
    }

    /**
     * @covers Xmf\Xadr\DomainManager::getDomain
     */
    public function testGetDomainException()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\InvalidDomainException');
        $domain = $this->object->getDomain('Garbage', 'Unit');
    }

    /**
     * @covers Xmf\Xadr\DomainManager::getDomain
     */
    public function testGetDomainFailureException()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\DomainFailureException');
        $domain = $this->object->getDomain('BadDomain', 'Unit');
    }

    /**
     * @covers Xmf\Xadr\DomainManager::getDomain
     */
    public function testGetDomainFailureChainedException()
    {
        $this->setExpectedException('Xmf\Xadr\Exceptions\DomainFailureException');
        $domain = $this->object->getDomain('Chained', 'Unit');
    }

    /**
     * @covers Xmf\Xadr\DomainManager::shutdown
     */
    public function testShutdown()
    {
        $domain = $this->object->getDomain('Domain', 'Unit');
        $this->assertInstanceOf('\Xmf\Xadr\Domain', $domain);
        $this->assertTrue($this->object->shutdown());
    }
}
