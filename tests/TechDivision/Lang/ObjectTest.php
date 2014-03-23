<?php

/**
 * License: GNU General Public License
 *
 * Copyright (c) 2009 TechDivision GmbH.  All rights reserved.
 * Note: Original work copyright to respective authors
 *
 * This file is part of TechDivision GmbH - Connect.
 *
 * faett.net is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * faett.net is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307,
 * USA.
 *
 * @package TechDivision_Lang
 */

namespace TechDivision\Lang;

/**
 * This is the test for the Object class.
 *
 * @package TechDivision_Lang
 * @author Tim Wagner <t.wagner@techdivision.com>
 * @copyright TechDivision GmbH
 * @link http://www.techdivision.com
 * @license GPL
 */
class ObjectTest extends PHPUnit_Framework_TestCase
{

	/**
	 * This test multiplies the Integer with an
	 * integer value.
	 *
	 * @return void
	 */
	public function testGetClass()
	{
		$this->assertInstanceOf('\TechDivision\Lang\Object',  Object::__getClass());
	}

	/**
	 * This method checks, that the equal method
	 * does return FALSE for not equal objects.
	 *
	 * @return void
	 */
	public function testEqualFails()
	{
		$object1 = $this->getMock('\TechDivision\Lang\Object');
		$object2 = $this->getMock('\TechDivision\Lang\Object');
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
		$object1 = $this->getMock('\TechDivision\Lang\Object');
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
		$object = $this->getMock('\TechDivision\Lang\Object');
		$this->assertEquals(Object::__getClass() . '@'. sha1(serialize($object)), $object->__toString());
	}
}
