<?php
namespace Xmf\Xadr\Validator;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class RegexTest extends \MY_UnitTestCase
{
    /**
     * @var Regex
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $context = \Xmf\Xadr\Controller::getNew();
        $this->object = new Regex($context);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Validator\Regex::execute
     * @covers Xmf\Xadr\Validator\Regex::initialize
     */
    public function testExecute()
    {
        $params = array(
            'pattern'       => "/\bxoops\b/i",
            'pattern_error' => 'Does not match',
            'match'         => true,
        );
        $this->object->initialize($params);

        $input = "Wow -- XOOPS Rocks!";
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());

        $input = "Drupal dominates!";
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());

        $params = array(
            'pattern'       => "/\bxoops\b/i",
            'pattern_error' => 'Does not match',
            'match'         => false,
        );
        $this->object->initialize($params);

        $input = "Wow -- XOOPS Rocks!";
        $valid = $this->object->execute($input);
        $this->assertTrue(!$valid, $this->object->getErrorMessage());

        $input = "Drupal dominates!";
        $valid = $this->object->execute($input);
        $this->assertFalse(!$valid, $this->object->getErrorMessage());
    }

    /**
     * @covers Xmf\Xadr\Validator\Regex::getDefaultParams
     */
    public function testGetDefaultParams()
    {
        $parms = $this->object->getDefaultParams();
        $this->assertTrue(is_array($parms));
    }
}
