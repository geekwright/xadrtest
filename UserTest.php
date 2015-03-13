<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var User
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new User($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\User::__construct
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\Xmf\Xadr\User', $this->object);
        $this->assertInstanceOf('\Xmf\Xadr\ContextAware', $this->object);
    }

    /**
     * @covers Xmf\Xadr\User::clearAll
     * @covers Xmf\Xadr\User::isAuthenticated
     * @covers Xmf\Xadr\User::setAuthenticated
     */
    public function testClearAll()
    {
        $this->object->setAuthenticated(true);
        $this->assertTrue($this->object->isAuthenticated());
        $this->object->clearAll();
        $this->assertFalse($this->object->isAuthenticated());
    }

    /**
     * @covers Xmf\Xadr\User::hasPrivilege
     */
    public function testHasPrivilege()
    {
        $this->assertFalse($this->object->hasPrivilege());
    }
}
