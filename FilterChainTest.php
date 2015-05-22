<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

// this Filter just sets the 'ourmessage'
class FilterChainTestFilter extends Filter
{
    public function executePreAction(FilterChain $filterChain)
    {
        $this->request()->attributes()->set('ourmessage', 'fred');
    }
}

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class FilterChainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FilterChain
     */
    protected $object;

    /**
     * @var Controlller
     */
    protected $context;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->context = Controller::getNew();
        $this->object = new FilterChain;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testContracts()
    {
        $filterChain = new FilterChain;
        $this->assertInstanceOf('\Xmf\Xadr\FilterChain', $filterChain);
        $this->assertInstanceOf('\SplQueue', $filterChain);
    }

    /**
     * @covers Xmf\Xadr\FilterChain::register
     * @covers Xmf\Xadr\FilterChain::execute
     */
    public function testRegisterExecute()
    {
        $attrName = 'ourmessage';
        $attributes = $this->context->getRequest()->attributes();
        $attributes->remove($attrName);
        $this->object->register(new FilterChainTestFilter($this->context));
        $this->assertNull($attributes->get($attrName));
        $this->object->execute($this->object);
        $this->assertSame('fred', $attributes->get($attrName));
    }
}
