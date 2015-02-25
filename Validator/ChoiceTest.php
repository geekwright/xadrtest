<?php
namespace Xmf\Xadr\Validator;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ChoiceTest extends \MY_UnitTestCase
{
    /**
     * @var Choice
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new Choice($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Validator\Choice::execute
     * @covers Xmf\Xadr\Validator\Choice::initialize
     */
    public function testExecute()
    {
        $params = array(
            'choices' => array('yes','no', 'maybe'),
            'sensitive' => false,
        );
        $this->object->initialize($params);

        $input = 'yes';
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());

        $input = 'Maybe';
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());

        $input = 'never';
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());

        $params = array(
            'choices' => array('yes','no', 'maybe'),
            'sensitive' => true,
        );
        $this->object->initialize($params);

        $input = 'Maybe';
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());

        $params = array(
            'choices' => array('россия','இலங்கை', '中国化工集团公司'),
            'sensitive' => false,
        );
        $this->object->initialize($params);

        $input = '中国化工集团公司';
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());

        $input = 'லங்கை';
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());
    }

    /**
     * @covers Xmf\Xadr\Validator\Choice::getDefaultParams
     */
    public function testGetDefaultParams()
    {
        $parms = $this->object->getDefaultParams();
        $this->assertTrue(is_array($parms));
    }
}
