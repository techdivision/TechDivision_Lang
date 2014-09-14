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
     * A random name for a class.
     *
     * @var string
     */
    const CLASS_NAME = 'TechDivision\Lang\MyClass';

    /**
     * A random name for a method.
     *
     * @var string
     */
    const METHOD_NAME = 'someMethod';

    /**
     * Checks the serialize/unserialize methods implemented
     * from the \Serializable interface.
     *
     * @return void
     */
    public function testSerializeAndUnserialize()
    {
        // initialize a ReflectionMethod instance and clone it
        $methodOne = new ReflectionMethod(ReflectionMethodTest::CLASS_NAME, ReflectionMethodTest::METHOD_NAME);
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
}
