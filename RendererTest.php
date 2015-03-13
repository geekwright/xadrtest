<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class RendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Renderer
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\Renderer', array($context));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Renderer::__construct
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\Xmf\Xadr\Renderer', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
    }

    /**
     * @covers Xmf\Xadr\Renderer::execute
     */
    public function testExecute()
    {
        $this->assertTrue(method_exists($this->object , 'execute'));
    }

    /**
     * @covers Xmf\Xadr\Renderer::clearResult
     */
    public function testClearResult()
    {
        $this->assertNull($this->object->clearResult());
    }

    /**
     * @covers Xmf\Xadr\Renderer::fetchResult
     */
    public function testFetchResult()
    {
        $this->assertSame('', $this->object->fetchResult());
    }

    /**
     * @covers Xmf\Xadr\Renderer::getMode
     */
    public function testGetMode()
    {
        $this->assertEquals(Xadr::RENDER_CLIENT, $this->object->getMode());
    }

    /**
     * @covers Xmf\Xadr\Renderer::setMode
     */
    public function testSetMode()
    {
        $this->assertEquals(Xadr::RENDER_CLIENT, $this->object->getMode());
        $this->object->setMode(Xadr::RENDER_VARIABLE);
        $this->assertEquals(Xadr::RENDER_VARIABLE, $this->object->getMode());
    }

    /**
     * @covers Xmf\Xadr\Renderer::getTemplate
     */
    public function testGetTemplate()
    {
        $this->assertNull($this->object->getTemplate());
    }

    /**
     * @covers Xmf\Xadr\Renderer::setTemplate
     */
    public function testSetTemplate()
    {
        $this->assertNull($this->object->getTemplate());
        $this->object->setTemplate('templatename');
        $this->assertEquals('templatename', $this->object->getTemplate());
    }

    /**
     * @covers Xmf\Xadr\Renderer::getTemplateDir
     */
    public function testGetTemplateDir()
    {
        $this->assertNull($this->object->getTemplateDir());
    }

    /**
     * @covers Xmf\Xadr\Renderer::setTemplateDir
     */
    public function testSetTemplateDir()
    {
        $this->assertNull($this->object->getTemplateDir());
        $this->object->setTemplateDir('templatedir');
        $this->assertEquals('templatedir', $this->object->getTemplateDir());
    }
}
