<?php
namespace Xmf\Xadr\Validator;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class AbstractValidatorTest extends \MY_UnitTestCase
{
    /**
     * @var AbstractValidator
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = $this->getMockForAbstractClass('Xmf\Xadr\Validator\AbstractValidator', array($context));
        $this->object->expects($this->any())
            ->method('getDefaultParams')
            ->will($this->returnValue(array()));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Validator\AbstractValidator::setErrorMessage
     * @covers Xmf\Xadr\Validator\AbstractValidator::getErrorMessage
     */
    public function testSetGetErrorMessage()
    {
        $message = 'That didn\'t work!';
        $this->object->setErrorMessage($message);
        $this->assertSame($message, $this->object->getErrorMessage());
    }

    /**
     * @covers Xmf\Xadr\Validator\AbstractValidator::setParameter
     * @covers Xmf\Xadr\Validator\AbstractValidator::getParameter
     */
    public function testSetGetParameter()
    {
        $param_name = 'test';
        $param_value = 6;

        $this->object->setParameter($param_name, $param_value);
        $this->assertSame($param_value, $this->object->getParameter($param_name));
    }

    /**
     * @covers Xmf\Xadr\Validator\AbstractValidator::initialize
     * @covers Xmf\Xadr\Validator\AbstractValidator::setParameter
     * @covers Xmf\Xadr\Validator\AbstractValidator::getParameter
     */
    public function testInitialize()
    {
        $param1 = 'name1';
        $value1 = 'value1';
        $param2 = 'name2';
        $value2 = 'value2';
        $value2_new = 42;
        $this->object->setParameter($param1, $value1);
        $this->assertSame($value1, $this->object->getParameter($param1), 'Did not set');
        $this->object->setParameter($param2, $value2);
        $this->assertSame($value2, $this->object->getParameter($param2), 'Did not set');
        $init_array = array($param2 => $value2_new);
        $this->object->initialize($init_array);
        $this->assertNull($this->object->getParameter($param1), 'Should be gone');
        $this->assertSame($value2_new, $this->object->getParameter($param2), 'Should have new value');
    }

    /**
     * @covers Xmf\Xadr\Validator\AbstractValidator::setParameterByRef
     * @covers Xmf\Xadr\Validator\AbstractValidator::getParameter
     */
    public function testSetParameterByRef()
    {
        $param_name = 'reftest';
        $param_value = 6;

        $this->object->setParameterByRef($param_name, $param_value);
        $this->assertSame(6, $this->object->getParameter($param_name));

        $param_value = 16;
        $this->assertSame(16, $this->object->getParameter($param_name), 'Ref should show change');
    }
}
