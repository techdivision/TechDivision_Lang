<?php

/**
 * \TechDivision\Lang\ObjectTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category  Library
 * @package   TechDivision_Lang
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Lang
 */

namespace TechDivision\Lang;

/**
 * This is the test for the Object class.
 *
 * @category  Library
 * @package   TechDivision_Lang
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Lang
 */
class ObjectTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * This test multiplies the Integer with an
	 * integer value.
	 *
	 * @return void
	 */
	public function testGetClass()
	{
		$this->assertEquals('TechDivision\Lang\Object',  Object::__getClass());
	}

	/**
	 * This method checks, that the equal method
	 * does return FALSE for not equal objects.
	 *
	 * @return void
	 */
	public function testEqualFails()
	{
		$object1 = $this->getMockForAbstractClass('\TechDivision\Lang\Object');
		$object2 = $this->getMockForAbstractClass('\TechDivision\Lang\Object');
		$this->assertFalse($object1->equals($object2));
	}

	/**
	 * This method checks that the equal method
	 * equals itself.
	 *
	 * @return void
	 */
	public function testEqualSuccess()
	{
		$object1 = $this->getMockForAbstractClass('\TechDivision\Lang\Object');
		$this->assertTrue($object1->equals($object1));
	}

	/**
	 * This method tests the __toString() and the toString()
	 * methods.
	 *
	 * @return void
	 */
	public function testToString()
	{
		$object = $this->getMockForAbstractClass('\TechDivision\Lang\Object');
		$this->assertEquals(get_class($object) . '@'. sha1(serialize($object)), $object->__toString());
	}
}
