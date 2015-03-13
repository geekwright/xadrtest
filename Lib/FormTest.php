<?php
namespace Xmf\Xadr\Lib;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class FormTest extends \PHPUnit_Framework_TestCase
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
     * @covers Xmf\Xadr\Form::__construct
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\Xmf\Xadr\Lib\Form', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
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
