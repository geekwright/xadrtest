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
     * @covers Xmf\Xadr\Request::getMethod
     * @todo   Implement testGetMethod().
     */
    public function testGetMethod()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::setMethod
     * @todo   Implement testSetMethod().
     */
    public function testSetMethod()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
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
     * @covers Xmf\Xadr\Request::getParameters
     */
    public function testGetParameters()
    {
        $obj = $this->object->getParameters();
        $this->assertInstanceOf('\Xmf\Xadr\Attributes', $obj);
        $this->assertSame($obj, $this->object->getParameters());
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
     * @covers Xmf\Xadr\Request::setParameter
     */
    public function testSetParameter()
    {
        $actual = $this->object->getParameter('key');
        $this->assertSame('value', $actual);
        $this->object->setParameter('key', 'newvalue');
        $actual = $this->object->getParameter('key');
        $this->assertSame('newvalue', $actual);
        $this->assertFalse($this->object->hasParameter('nosuchkey'));
        $this->object->setParameter('nosuchkey', 'somevalue');
        $this->assertSame('somevalue', $this->object->getParameter('nosuchkey'));

    }

    /**
     * @covers Xmf\Xadr\Request::setParameterByRef
     * @todo   Implement testSetParameterByRef().
     */
    public function testSetParameterByRef()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::setParameterArray
     * @todo   Implement testSetParameterArray().
     */
    public function testSetParameterArray()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::getError
     * @todo   Implement testGetError().
     */
    public function testGetError()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::getErrors
     */
    public function testGetErrors()
    {
        $obj = $this->object->getErrors();
        $this->assertInstanceOf('\Xmf\Xadr\Attributes', $obj);
        $this->assertSame($obj, $this->object->getErrors());
    }

    /**
     * @covers Xmf\Xadr\Request::getErrorsAsHtml
     * @todo   Implement testGetErrorsAsHtml().
     */
    public function testGetErrorsAsHtml()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::hasError
     * @todo   Implement testHasError().
     */
    public function testHasError()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::hasErrors
     * @todo   Implement testHasErrors().
     */
    public function testHasErrors()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::setError
     * @todo   Implement testSetError().
     */
    public function testSetError()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::setErrors
     * @todo   Implement testSetErrors().
     */
    public function testSetErrors()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
