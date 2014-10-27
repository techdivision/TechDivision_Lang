<?php

/**
 * TechDivision\Lang\Reflection\ReflectionMethodTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Library
 * @package    TechDivision_Lang
 * @subpackage Reflection
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Lang
 */

namespace TechDivision\Lang\Reflection;

/**
 * This is the test for the ReflectionMethod class.
 *
 * @category Library
 * @package TechDivision_Lang
 * @subpackage Reflection
 * @author Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link https://github.com/techdivision/TechDivision_Lang
 */
class ReflectionMethodTest extends \PHPUnit_Framework_TestCase
{

    /**
     * A random name for a method.
     *
     * @var string
     */
    const METHOD_NAME = 'testGetAnnotation';

    /**
     * Initializes the instance before we run each test.
     *
     * @return void
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->reflectionMethod = new ReflectionMethod(__CLASS__, ReflectionMethodTest::METHOD_NAME);
    }

    /**
     * Checks the serialize/unserialize methods implemented
     * from the \Serializable interface.
     *
     * @return void
     */
    public function testSerializeAndUnserialize()
    {
        // initialize a ReflectionMethod instance and clone it
        $methodOne = new ReflectionMethod(__CLASS__, ReflectionMethodTest::METHOD_NAME);
        $clonedOne = clone $methodOne;
        // serialize/unserialize the ReflectionMethod
        $methodOne->unserialize($methodOne->serialize());
        // check that the two ReflectionMethod instances are equal
        $this->assertEquals($clonedOne, $methodOne);
    }

    /**
     * This test checks the resolved class name.
     *
     * @return void
     */
    public function testGetClass()
    {
        // check for the correct class name
        $this->assertEquals('TechDivision\Lang\Reflection\ReflectionMethod', ReflectionMethod::__getClass());
    }

    /**
     * This method is acutally not implemented, so we expected an exception.
     *
     * @return void
     * @expectedException TechDivision\Lang\Reflection\ReflectionException
     */
    public function testGetParameters()
    {
        $reflectionClass = new ReflectionClass(__CLASS__);
        $reflectionClass->getMethod('testGetParameters')->getParameters();
    }

    /**
     * Test if the class annotation is available and has the correct values set.
     *
     * @return void
     * @MockAnnotation(name=MockAnnotation, description="some description", value="a value")
     */
    public function testGetAnnotation()
    {
        $annotation = $this->reflectionMethod->getAnnotation('MockAnnotation');
        $this->assertSame($annotation->getValue('name'), 'MockAnnotation');
        $this->assertSame($annotation->getValue('description'), 'some description');
        $this->assertSame($annotation->getValue('value'), 'a value');
    }

    /**
     * Test if an execption is thrown if a requested annotation is not available.
     *
     * @return void
     * @expectedException TechDivision\Lang\Reflection\ReflectionException
     */
    public function testGetAnnotationWithException()
    {
        $this->reflectionMethod->getAnnotation('UnknownAnnotation');
    }

    /**
     * Test if the invoke() method passes the args correctly to the method.
     *
     * @return void
     */
    public function testInvokeWithArgs()
    {

        // initialize the array with the values
        $values = array($key = 'test' => $value = 'aValue');

        // create a new MockAnnotation instance
        $reflectionClass = new ReflectionClass('TechDivision\Lang\Reflection\MockAnnotation');
        $instance = $reflectionClass->newInstanceArgs(array($values));

        // create the reflection method and invoke it with arguments
        $reflectionMethod = $reflectionClass->getMethod('getValue');
        $this->assertSame($value, $reflectionMethod->invoke($instance, $key));
    }
}
