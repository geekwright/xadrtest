<?php
namespace Xmf\Xadr\Catalog;

require_once __DIR__ . '/../../../../init_mini.php';

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class FieldTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Field
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Field('fieldtest');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::enumValues
     */
    public function testEnumValues()
    {
        $enums = array(1,2,3);
        $this->object->enumValues($enums);
        $fieldVars = $this->object->getFieldProperties();
        $this->AssertEquals($enums, $fieldVars['enumValues']);

        $enums = array('x1' => 'one', 'x2' => 'two', 'x3' => 'three');
        $this->object->enumValues($enums);
        $fieldVars = $this->object->getFieldProperties();
        $this->AssertEquals($enums, $fieldVars['enumValues']);

        $enums = array('one', 'two', 'three');
        $this->object->enumValues($enums);
        $fieldVars = $this->object->getFieldProperties();
        $this->AssertEquals($enums, $fieldVars['enumValues']);

        $enums = array();
        $this->object->enumValues($enums);
        $fieldVars = $this->object->getFieldProperties();
        $this->AssertEquals($enums, $fieldVars['enumValues']);
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::enumValues
     */
    public function testEnumValuesException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->object->enumValues('garbage');
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::getFieldProperties
     */
    public function testGetFieldProperties()
    {
        $obj1 = $this->object->getFieldProperties();
        $obj2 = $this->object->getFieldProperties();
        $this->assertNotTrue($obj1, $obj2);
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::newValidator
     * @covers Xmf\Xadr\Catalog\Field::validate
     */
    public function testValidate()
    {
        if (!class_exists('\Respect\Validation\Validator')) {
            $this->markTestSkipped('Needs Respect/Validation library');
        }
        // establish a numeric validator
        $v = $this->object->newValidator();
        $v->numeric();
        // set in Field
        $this->object->validate($v);
        // get it back and try it out
        $field = $this->object->getFieldProperties();
        $validator = $field['validate'];
        $this->assertTrue($validator->validate(123));
        $this->assertFalse($validator->validate('garbage'));
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::validate
     */
    public function testValidateException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->object->validate('garbage');
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::displayTransform
     */
    public function testDisplayTransform()
    {
        $callable = 'ucfirst';
        $this->object->displayTransform($callable);
        $field = $this->object->getFieldProperties();
        $transform = $field['displayTransform'];
        $this->assertEquals('Fred', $transform('fred'));

        $callable = array($this, 'utilityCallable');
        $this->object->displayTransform($callable);
        $field = $this->object->getFieldProperties();
        $transform = $field['displayTransform'];
        $this->assertEquals('FRED', $transform('Fred'));

        $callable = function ($arg) {
            return '"'.$arg.'"';
        };
        $this->object->displayTransform($callable);
        $field = $this->object->getFieldProperties();
        $transform = $field['displayTransform'];
        $this->assertEquals('"Fred"', $transform('Fred'));
    }

    public function utilityCallable($arg)
    {
        return mb_strtoupper($arg);
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::displayTransform
     */
    public function testDisplayTransformException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->object->displayTransform('this is not a callable!');
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::inputTransform
     */
    public function testInputTransform()
    {
        $callable = 'ucfirst';
        $this->object->inputTransform($callable);
        $field = $this->object->getFieldProperties();
        $transform = $field['inputTransform'];
        $this->assertEquals('Fred', $transform('fred'));

        $callable = array($this, 'utilityCallable');
        $this->object->inputTransform($callable);
        $field = $this->object->getFieldProperties();
        $transform = $field['inputTransform'];
        $this->assertEquals('FRED', $transform('Fred'));

        $callable = function ($arg) {
            return '"'.$arg.'"';
        };
        $this->object->inputTransform($callable);
        $field = $this->object->getFieldProperties();
        $transform = $field['inputTransform'];
        $this->assertEquals('"Fred"', $transform('Fred'));
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::inputTransform
     */
    public function testInputTransformException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->object->inputTransform('this is not a callable!');
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::formAttributes
     */
    public function testFormAttributes()
    {
        $attributes = array('required' => null);
        $this->object->formAttributes($attributes);
        $field = $this->object->getFieldProperties();
        $formAttributes = $field['formAttributes'];
        $this->assertEquals($attributes, $formAttributes);
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::formAttributes
     */
    public function testFormAttributesException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->object->formAttributes('this is not a array!');
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::formClassname
     */
    public function testFormClassname()
    {
        $expected = 'Text';
        $this->object->formClassname($expected);
        $field = $this->object->getFieldProperties();
        $actual = $field['formClassname'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::formClassname
     */
    public function testFormClassnameException()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->object->formClassname('this is not a form element!');
    }


    /**
     * @covers Xmf\Xadr\Catalog\Field::__call
     *  -covers Xmf\Xadr\Catalog\Field::variableType
     *  -covers Xmf\Xadr\Catalog\Field::maxLength
     *  -covers Xmf\Xadr\Catalog\Field::defaultValue
     *  -covers Xmf\Xadr\Catalog\Field::enumValues
     *  -covers Xmf\Xadr\Catalog\Field::description
     *  -covers Xmf\Xadr\Catalog\Field::description
     *  -covers Xmf\Xadr\Catalog\Field::title
     *  -covers Xmf\Xadr\Catalog\Field::shortTitle
     *  -covers Xmf\Xadr\Catalog\Field::cleanerType
     *  -covers Xmf\Xadr\Catalog\Field::validateDescription
     *  -covers Xmf\Xadr\Catalog\Field::displayTransform
     *  -covers Xmf\Xadr\Catalog\Field::inputTransform
     *  -covers Xmf\Xadr\Catalog\Field::getFieldProperties
     */
    public function testFluent()
    {
        $vars = array(
            'variableType' => 'string',
            'maxLength' => 128,
            'defaultValue' => 'default',
            'enumValues' => ['default','first', 'last'],
            'description' => 'this is a string',
            'title' => 'Test String',
            'shortTitle' => 'String',
            'cleanerType' => 'string',
            'validateDescription' => "Must be one of 'default','first', 'last'",
            'displayTransform' => 'mb_strtolower',
            'inputTransform' => 'mb_strtoupper',
        );

        $field = new Field('fluenttest');
        $field->variableType($vars['variableType'])
            ->maxLength($vars['maxLength'])
            ->defaultValue($vars['defaultValue'])
            ->enumValues($vars['enumValues'])
            ->description($vars['description'])
            ->title($vars['title'])
            ->shortTitle($vars['shortTitle'])
            ->cleanerType($vars['cleanerType'])
            ->validateDescription($vars['validateDescription'])
            ->displayTransform($vars['displayTransform'])
            ->inputTransform($vars['inputTransform']);

        $fieldVars = $field->getFieldProperties();
        foreach ($vars as $key => $expected) {
            $this->assertSame($expected, $fieldVars[$key]);
        }

    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::__call
     */
    public function test__callException()
    {
        $this->setExpectedException('\BadMethodCallException');
        $this->object->foo('bar');
    }

    /**
     * @covers Xmf\Xadr\Catalog\Field::__construct
     */
    public function test__construct()
    {
        $expected = array(
            'variableType' => 'string',
            'maxLength' => null,
            'defaultValue' => null,
            'enumValues' => null,
            'description' => null,
            'title' => null,
            'shortTitle' => null,
            'cleanerType' => 'string',
            'validate' => null,
            'validateDescription' => null,
            'displayTransform' => null,
            'inputTransform' => null,
            'formClassname'  => null,
            'formAttributes'  => array(),
        );
        $field = new Field('constructtest');
        $actualValues = $field->getFieldProperties();
        foreach ($actualValues as $key => $actual) {
            $this->assertSame($expected[$key], $actual);
        }
    }

/*
variableType
maxLength
defaultValue
enumValues
description
title
shortTitle
cleanerType
validate
validateDescription
displayTransform
inputTransform
formAttributes
*/
}
