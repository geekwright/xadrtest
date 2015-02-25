<?php
namespace Xmf\Xadr\Validator;

require_once(dirname(__FILE__).'/../../../../init_mini.php');

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class ConfirmTest extends \MY_UnitTestCase
{
    /**
     * @var Confirm
     */
    protected $object;

    protected $controller;

    protected $request;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->controller = \Xmf\Xadr\Controller::getNew();

        $this->object = new Confirm($this->controller);

        // Confirm uses parameters from request, so we need to
        // set up a controller and request for context
        $this->request = $this->controller->getRequest();
        $this->request->setParameter('email', 'fred@example.com');
        $this->request->setParameter('emailOK', 'fred@example.com');
        $this->request->setParameter('emailBAD', 'fred@example.co');
        $this->request->setParameter('emailCASE', 'Fred@Example.com');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Validator\Confirm::execute
     * @covers Xmf\Xadr\Validator\Confirm::initialize
     */
    public function testExecute()
    {
        $params = array(
            'confirm'       => 'emailOK',
            'confirm_error' => 'Does not match',
            'sensitive'     => true,
        );
        $this->object->initialize($params);

        $input = $this->request->getParameter('email');
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());

        $input = strtoupper($input);
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());

        $params = array(
            'confirm'       => 'emailBAD',
            'sensitive'     => true,
        );
        $this->object->initialize($params);

        $input = $this->request->getParameter('email');
        $valid = $this->object->execute($input);
        $this->assertFalse($valid, $this->object->getErrorMessage());

        $params = array(
            'confirm'       => 'emailCASE',
            'sensitive'     => false,
        );
        $this->object->initialize($params);

        $input = $this->request->getParameter('email');
        $valid = $this->object->execute($input);
        $this->assertTrue($valid, $this->object->getErrorMessage());
    }

    /**
     * @covers Xmf\Xadr\Validator\Confirm::getDefaultParams
     */
    public function testGetDefaultParams()
    {
        $parms = $this->object->getDefaultParams();
        $this->assertTrue(is_array($parms));
    }
}
