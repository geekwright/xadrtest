<?php
namespace Xmf\Xadr;

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-05-28 at 09:05:01.
 */
class FilterListTest extends \MY_UnitTestCase
{
    /**
     * @var FilterList
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        //$this->object = new FilterList($context);
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\FilterList', array($context));
   }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\FilterList::registerFilters
     * @todo   Implement testRegisterFilters().
     */
    public function testRegisterFilters()
    {
        $this->assertInstanceOf('Xmf\Xadr\FilterList', $this->object);
        $filterChain = new FilterChain;
        $this->object->registerFilters($filterChain);
    }
}
