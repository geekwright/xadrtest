<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

class FilterListFilter extends Filter
{

}

class FilterListConcrete extends FilterList
{
    protected function initialize()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $filter = new FilterListFilter($context);
        $this->filters[] = $filter;
    }
}

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class FilterListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FilterList
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
        $this->context = \Xmf\Xadr\Controller::getNew();
        //$this->object = new FilterList($context);
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\FilterList', array($this->context));
   }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\FilterList::__construct
     * @covers Xmf\Xadr\FilterList::initContextAware
     * @covers Xmf\Xadr\FilterList::initialize
     * @covers Xmf\Xadr\FilterList::registerFilters
     */
    public function testConstruct()
    {
        $filterList = new FilterListConcrete($this->context);
        $this->assertInstanceOf('\Xmf\Xadr\FilterList', $filterList);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $filterList);
        $filterChain = new FilterChain;
        $filterList->registerFilters($filterChain);
        $filterChain->execute();
    }

    /**
     * @covers Xmf\Xadr\FilterList::registerFilters
     */
    public function testRegisterFilters()
    {
        $this->assertInstanceOf('Xmf\Xadr\FilterList', $this->object);
        $filterChain = new FilterChain;
        $this->object->registerFilters($filterChain);
    }
}
