<?php

/**
 * TechDivision\Lang\Reflection\ReflectionClassTest
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
 * This is the test for the ReflectionClass class.
 *
 * @category Library
 * @package TechDivision_Lang
 * @subpackage Reflection
 * @author Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link https://github.com/techdivision/TechDivision_Lang
 */
class ReflectionClassTest extends \PHPUnit_Framework_TestCase
{

    /**
     * A random name for a class.
     *
     * @var string
     */
    const CLASS_NAME = 'TechDivision\Lang\MyClass';

    /**
     * Checks the serialize/unserialize methods implemented
     * from the \Serializable interface.
     *
     * @return void
     */
    public function testSerializeAndUnserialize()
    {
        // initialize a ReflectionClass instance and clone it
        $classOne = new ReflectionClass(ReflectionClassTest::CLASS_NAME);
        $clonedOne = clone $classOne;
        // serialize/unserialize the ReflectionClass
        $classOne->unserialize($classOne->serialize());
        // check that the two ReflectionClass instances are equal
        $this->assertEquals($clonedOne, $classOne);
    }

    /**
     * This test checks the resolved class name.
     *
     * @return void
     */
    public function testGetClass()
    {
        // check for the correct class name
        $this->assertEquals('TechDivision\Lang\Reflection\ReflectionClass', ReflectionClass::__getClass());
    }
}
