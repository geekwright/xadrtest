<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Request
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $params = array(
            'key' => 'value',
        );
        $this->object = new Request($params);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Request::__construct
     * @covers Xmf\Xadr\Request::getXadrArrayObject
     */
    public function test__construct()
    {
        $attributes = new XadrArray;
        $object = new Request(array(), $attributes);
        $this->assertInstanceOf('\Xmf\Xadr\Request', $object);
        $this->assertInstanceOf('\Xmf\Xadr\XadrArray', $object->parameters());
        $this->assertInstanceOf('\Xmf\Xadr\XadrArray', $object->attributes());
        $this->assertSame($attributes, $object->attributes());
        $this->assertInstanceOf('\Xmf\Xadr\XadrArray', $object->errors());
    }

    /**
     * @covers Xmf\Xadr\Request::attributes
     */
    public function testAttributes()
    {
        $obj = $this->object->attributes();
        $this->assertInstanceOf('\Xmf\Xadr\XadrArray', $obj);
        $this->assertSame($obj, $this->object->attributes());
    }

    /**
     * @covers Xmf\Xadr\Request::getMethod
     * @covers Xmf\Xadr\Request::setMethod
     */
    public function testGetSetMethod()
    {
        $this->object->setMethod(Xadr::REQUEST_GET);
        $this->assertEquals(Xadr::REQUEST_GET, $this->object->getMethod());
        $this->object->setMethod(Xadr::REQUEST_POST);
        $this->assertEquals(Xadr::REQUEST_POST, $this->object->getMethod());
        $this->object->setMethod(42);
        $this->assertEquals(42, $this->object->getMethod());
    }

    /**
     * @covers Xmf\Xadr\Request::parameters
     */
    public function testParameters()
    {
        $obj = $this->object->parameters();
        $this->assertInstanceOf('\Xmf\Xadr\XadrArray', $obj);
        $this->assertSame($obj, $this->object->parameters());
    }

    /**
     * @covers Xmf\Xadr\Request::getParameter
     */
    public function testGetParameter()
    {
        $actual = $this->object->getParameter('key');
        $this->assertSame('value', $actual);
        $actual = $this->object->getParameter('nosuchkey');
        $this->assertNull($actual);
        $actual = $this->object->getParameter('nosuchkey', 'default');
        $this->assertSame('default', $actual);
    }

    /**
     * @covers Xmf\Xadr\Request::hasParameter
     */
    public function testHasParameter()
    {
        $this->assertTrue($this->object->hasParameter('key'));
        $this->assertFalse($this->object->hasParameter('nosuchkey'));
    }

    /**
     * @covers Xmf\Xadr\Request::errors
     */
    public function testErrors()
    {
        $obj = $this->object->errors();
        $this->assertInstanceOf('\Xmf\Xadr\XadrArray', $obj);
        $this->assertSame($obj, $this->object->errors());
    }

    /**
     * @covers Xmf\Xadr\Request::getError
     * @covers Xmf\Xadr\Request::getErrors
     * @covers Xmf\Xadr\Request::getErrorsAsHtml
     * @covers Xmf\Xadr\Request::hasError
     * @covers Xmf\Xadr\Request::hasErrors
     * @covers Xmf\Xadr\Request::setError
     * @covers Xmf\Xadr\Request::setErrors
     */
    public function testGetHasSetErrors()
    {
        $this->assertSame(array(), $this->object->getErrors());
        $this->assertFalse($this->object->hasErrors());
        $this->assertFalse($this->object->hasError('fubar'));
        $this->assertNull($this->object->getError('fubar'));
        $this->assertSame('', $this->object->getErrorsAsHtml());

        $this->object->setError('foo', 'bar');
        $this->assertSame('bar', $this->object->getError('foo'));
        $this->assertNull($this->object->getError('fubar'));
        $set = array(
            'foo' => 'baz',
            'fred' => '42'
        );
        $this->object->setError('notfoo', 'bar');
        $this->object->setErrors($set);
        $this->assertSame('bar', $this->object->getError('notfoo'));
        $this->assertSame('baz', $this->object->getError('foo'));
        $this->assertSame('42', $this->object->getError('fred'));
        $this->assertSame(array('foo' => 'baz'), $this->object->getErrors('foo'));
        $this->assertSame('', $this->object->getErrorsAsHtml('squawk'));
        $message = $this->object->getErrorsAsHtml('foo');
        $this->assertTrue(false!==mb_strpos($message, 'baz'));
    }

    /**
     * @covers Xmf\Xadr\Request::getHttpQueryParameters
     */
    public function testGetHttpQueryParameters()
    {
        $obj = $this->object->getHttpQueryParameters();
        $this->assertInstanceOf('\Xmf\Xadr\XadrArray', $obj);
    }

    /**
     * @covers Xmf\Xadr\Request::getHttpBodyParameters
     */
    public function testGetHttpBodyParameters()
    {
        $obj = $this->object->getHttpBodyParameters();
        $this->assertInstanceOf('\Xmf\Xadr\XadrArray', $obj);
    }
}
