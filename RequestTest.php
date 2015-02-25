<?php
namespace Xmf\Xadr;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class RequestTest extends \MY_UnitTestCase
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
     * @covers Xmf\Xadr\Request::getCookie
     * @todo   Implement testGetCookie().
     */
    public function testGetCookie()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::getCookieNames
     * @todo   Implement testGetCookieNames().
     */
    public function testGetCookieNames()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::getCookies
     * @todo   Implement testGetCookies().
     */
    public function testGetCookies()
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
     * @todo   Implement testGetErrors().
     */
    public function testGetErrors()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
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
     * @covers Xmf\Xadr\Request::getParameter
     * @todo   Implement testGetParameter().
     */
    public function testGetParameter()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::getParameterNames
     * @todo   Implement testGetParameterNames().
     */
    public function testGetParameterNames()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::getParameters
     * @todo   Implement testGetParameters().
     */
    public function testGetParameters()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::hasCookie
     * @todo   Implement testHasCookie().
     */
    public function testHasCookie()
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
     * @covers Xmf\Xadr\Request::hasParameter
     * @todo   Implement testHasParameter().
     */
    public function testHasParameter()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Xmf\Xadr\Request::removeParameter
     * @todo   Implement testRemoveParameter().
     */
    public function testRemoveParameter()
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
     * @covers Xmf\Xadr\Request::setParameter
     * @todo   Implement testSetParameter().
     */
    public function testSetParameter()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
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
}
