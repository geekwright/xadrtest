<?php
namespace Xmf\Xadr\Lib;

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-05-28 at 09:05:02.
 */
class FormTest extends \MY_UnitTestCase
{
    /**
     * @var Form
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new Form($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Lib\Form::renderForm
     * @todo   Implement testRenderForm().
     */
    public function testRenderForm()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Lib\Form::assignForm
     * @todo   Implement testAssignForm().
     */
    public function testAssignForm()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}