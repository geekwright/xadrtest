<?php
namespace Xmf\Xadr\Validator;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class CleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Clean
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new Clean($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Validator\Clean::execute
     * @covers Xmf\Xadr\Validator\Clean::initialize
     */
    public function testExecute()
    {
        $params = array(
            'type' => 'int',
        );
        $this->object->initialize($params);

        $input = '6x-wp';
        $expected = 6;
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());
        $this->assertEquals($input, $expected);

        $params = array(
            'type' => 'word',
        );
        $this->object->initialize($params);

        $input = 'Lorem ipsum 88 59';
        $expected = 'Loremipsum';
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());
        $this->assertEquals($input, $expected);

        $params = array(
            'type' => 'default',
        );
        $this->object->initialize($params);

        $input = 'Lorem ipsum </i><script>alert();</script>';
        $expected = 'Lorem ipsum alert();';
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());
        $this->assertEquals($input, $expected);
    }

    /**
     * @covers Xmf\Xadr\Validator\Clean::getDefaultParams
     */
    public function testGetDefaultParams()
    {
        $parms = $this->object->getDefaultParams();
        $this->assertTrue(is_array($parms));
    }
}
