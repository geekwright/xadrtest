<?php
namespace Xmf\Xadr\Validator;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class NumberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Number
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new Number($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Validator\Number::execute
     * @covers Xmf\Xadr\Validator\Number::initialize
     */
    public function testExecute()
    {
        $params = array(
            'max'          => 5000.0,
            'max_error'    => 'high',
            'min'          => 0,
            'min_error'    => 'low',
            'number_error' => 'nan',
            'strip'        => true,
        );
        $this->object->initialize($params);

        $input = '123.45';
        $expected = 123.45;
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());
        $this->assertEquals($input, $expected);

        $input = 'xyz';
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());
        $this->assertEquals($this->object->getErrorMessage(), 'nan');

        $input = '-123';
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());
        $this->assertEquals($this->object->getErrorMessage(), 'low');

        $input = '5000.1';
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());
        $this->assertEquals($this->object->getErrorMessage(), 'high');

        $input = '$2.98 USD';
        $expected = 2.98;
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());
        $this->assertEquals($input, $expected);

        $params = array(
            'max'          => false,
            'max_error'    => 'high',
            'min'          => false,
            'min_error'    => 'low',
            'number_error' => 'nan',
            'strip'        => true,
        );
        $this->object->initialize($params);

        $input = '-123456';
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());

        $input = '1233456';
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());

        $params = array(
            'max'          => -1,
            'max_error'    => 'high',
            'min'          => -1,
            'min_error'    => 'low',
            'number_error' => 'nan',
            'strip'        => true,
        );
        $this->object->initialize($params);

        $input = '-123';
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());
        $this->assertEquals($this->object->getErrorMessage(), 'low');

        $input = '0';
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());
        $this->assertEquals($this->object->getErrorMessage(), 'high');
    }

    /**
     * @covers Xmf\Xadr\Validator\Number::getDefaultParams
     */
    public function testGetDefaultParams()
    {
        $parms = $this->object->getDefaultParams();
        $this->assertTrue(is_array($parms));
    }
}
