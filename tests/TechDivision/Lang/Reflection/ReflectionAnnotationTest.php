<?php

/**
 * TechDivision\Lang\Reflection\ReflectionAnnotationTest
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
 * This is the test for the ReflectionAnnotation class.
 *
 * @category   Library
 * @package    TechDivision_Lang
 * @subpackage Reflection
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Lang
 *
 * @Test(name=ReflectionAnnotationTest)
 */
class ReflectionAnnotationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * A random name of a reflection annotation.
     *
     * @var string
     */
    const ANNOTATION_NAME = 'annotationName';

    /**
     * Initializes the instance before we run each test.
     * @return void
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->annotationInstance = new ReflectionAnnotation(ReflectionAnnotationTest::ANNOTATION_NAME);
    }

    /**
     * Checks the serialize/unserialize methods implemented
     * from the \Serializable interface.
     *
     * @return void
     */
    public function testSerializeAndUnserialize()
    {
        // initialize a ReflectionAnnotation instance and clone it
        $clonedOne = clone $this->annotationInstance;
        // serialize/unserialize the ReflectionAnnotation
        $this->annotationInstance->unserialize($this->annotationInstance->serialize());
        // check that the two ReflectionAnnotation instances are equal
        $this->assertEquals($clonedOne, $this->annotationInstance);
    }

    /**
     * This test checks the resolved class name.
     *
     * @return void
     */
    public function testGetClass()
    {
        // check for the correct class name
        $this->assertEquals('TechDivision\Lang\Reflection\ReflectionAnnotation', ReflectionAnnotation::__getClass());
    }

    /**
     * This test checks if the correct annotation name will be returned.
     *
     * @return void
     */
    public function testGetAnnotationName()
    {
        $this->assertSame(ReflectionAnnotationTest::ANNOTATION_NAME, $this->annotationInstance->getAnnotationName());
    }

    /**
     * This test checks if the annotations passed from a PHP reflection class will
     * be initialized correctly.
     *
     * @return void
     */
    public function testFromReflectionClass()
    {

        // load the annotations of this class
        $annotations = ReflectionAnnotation::fromReflectionClass(new ReflectionClass($this));

        // check if we can find the default annotations
        $this->assertTrue(isset($annotations['category']));
        $this->assertTrue(isset($annotations['package']));
        $this->assertTrue(isset($annotations['subpackage']));
        $this->assertTrue(isset($annotations['author']));
        $this->assertTrue(isset($annotations['copyright']));
        $this->assertTrue(isset($annotations['link']));
        $this->assertTrue(isset($annotations['license']));

        // try to load the @Test annotation with the specified name
        $this->assertSame($annotations['Test']->getValue('name'), 'ReflectionAnnotationTest');
    }

    /**
     * This test checks if the annotations passed from this instance will
     * be initialized correctly.
     *
     * @return void
     * @FirstTest
     */
    public function testFromReflectionMethod()
    {

        // load the reflection method
        $reflectionClass = new ReflectionClass($this);
        $reflectionMethod = $reflectionClass->getMethod('testFromReflectionMethod');

        // check if we can find the default annotations
        $this->assertTrue($reflectionMethod->hasAnnotation('return'));
        $this->assertTrue($reflectionMethod->hasAnnotation('FirstTest'));
    }

    /**
     * This test checks if the annotations will be ignored correctly.
     *
     * @return void
     */
    public function testFromReflectionMethodIgnoreReturnAnnotation()
    {

        // initialize the annotations to ignore and the aliases
        $ignore = array('return');

        // load the reflection method
        $reflectionClass = new ReflectionClass($this, $ignore);
        $reflectionMethod = $reflectionClass->getMethod('testFromReflectionMethod');

        // check if we can find the default annotations
        $this->assertFalse($reflectionMethod->hasAnnotation('return'));
    }

    /**
     * This test checks if the annotations newInstance() method works as expected.
     *
     * @return void
     * @MockAnnotation(name=Test, description="Another Test", value={ "key" : "a value" })
     */
    public function testFromNewInstance()
    {

        // initialize the annotations to ignore and the aliases
        $ignore = array();
        $aliases = array('MockAnnotation' => 'TechDivision\Lang\Reflection\MockAnnotation');

        // load the reflection method
        $reflectionClass = new ReflectionClass($this, $ignore, $aliases);
        $reflectionMethod = $reflectionClass->getMethod('testFromNewInstance');

        // create a new instance of the found alias
        $mockAnnotation = $reflectionMethod->getAnnotation('MockAnnotation');
        $instance = $mockAnnotation->newInstance($mockAnnotation->getValues());

        // check the values passed to the alias instance
        $this->assertSame($instance->getValue('name'), 'Test');
        $this->assertSame($instance->getValue('description'), 'Another Test');
        $this->assertSame($instance->getValue('value'), array('key' => 'a value'));
    }
}
