<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class XoopsSmartyRendererTest extends \MY_UnitTestCase
{
    /**
     * @var XoopsSmartyRenderer
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new XoopsSmartyRenderer($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\XoopsSmartyRenderer::execute
     * @todo   Implement testExecute().
     */
    public function testExecute()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\XoopsSmartyRenderer::addStylesheet
     * @todo   Implement testAddStylesheet().
     */
    public function testAddStylesheet()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\XoopsSmartyRenderer::addScript
     * @todo   Implement testAddScript().
     */
    public function testAddScript()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\XoopsSmartyRenderer::addPageTitle
     * @todo   Implement testAddPageTitle().
     */
    public function testAddPageTitle()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\XoopsSmartyRenderer::addMetaKeywords
     * @todo   Implement testAddMetaKeywords().
     */
    public function testAddMetaKeywords()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\XoopsSmartyRenderer::addMetaDescription
     * @todo   Implement testAddMetaDescription().
     */
    public function testAddMetaDescription()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
