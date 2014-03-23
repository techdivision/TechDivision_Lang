<?php

/**
 * \TechDivision\Lang\Boolean
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
 * Thrown when an application attempts to use <code>null</code> in a
 * case where an object is required.
 * These include:
 * <ul>
 * <li>Calling the instance method of a <code>null</code> object.
 * <li>Accessing or modifying the field of a <code>null</code> object.
 * <li>Taking the length of <code>null</code> as if it were an array.
 * <li>Accessing or modifying the slots of <code>null</code> as if it
 * were an array.
 * <li>Throwing <code>null</code> as if it were a <code>Throwable</code>
 * value.
 * </ul>
 * <p>
 * Applications should throw instances of this class to indicate
 * other illegal uses of the <code>null</code> object.
 *
 * @category  Library
 * @package   TechDivision_Lang
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Lang
 */
class NullPointerException extends Exception
{
}
